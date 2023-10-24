#!/bin/sh
set -x
# add current user to /etc/passwd
if ! whoami &> /dev/null; then
  if [ -w /etc/passwd ]; then
    echo "${USER_NAME:-default}:x:$(id -u):0:${USER_NAME:-default} user:${HOME}:/sbin/nologin" >> /etc/passwd
  fi
fi

runInit() {
  # if userdata directory already contains files. skip overrride
  if [ -z "$(ls -A userdata_init)" ]; then
    echo setting up new userdata,storage,backup directories
    mv userdata/* userdata_init
    mv storage/* storage_init
    mv backup/* backup_init
  fi

  # always update www
  rm -rf www_init/*
  mv www/* www_init

  # remove empty or not relevant dirs
  rm -rf userdata storage backup www

  # make dir's accessable for init process
  ln -s www_init www
  ln -s userdata_init userdata
  ln -s storage_init storage
  ln -s backup_init backup

}

runCronjobs() {
  PID_PATH_NAME=/tmp/cronjob-pid

  nohup /run-cronjobs.sh >/dev/null 2>&1 &
  echo $! > $PID_PATH_NAME
}

installOrUpdateXentral() {
  if [ -n "${CREATE_XENTRAL+x}" ]; then
    echo setting up chat
    INSTALLATION_EXISTS_FILE=userdata/installation_exists
    if [ -f "${INSTALLATION_EXISTS_FILE}" ]; then
      echo "File $INSTALLATION_EXISTS_FILE exists, updating magellan."
      php refreshFileCache.php
      php artisan chat:update
    else
      if [ -n "${CUSTOMER_EMAIL}" ] && [ -n "${SEEDER}" ]; then
        echo "setting up magellan data for ${CUSTOMER_EMAIL} using seeder ${SEEDER}Seeder"
        php artisan chat:install --force --seeder=${SEEDER} ${CUSTOMER_EMAIL} --notify-tenant-manager
        touch ${INSTALLATION_EXISTS_FILE}
      else
        echo "couldn't install xentral, CUSTOMER_EMAIL and/or SEEDER env vars missing"
      fi
    fi
  fi
}

# setup user.inc.php
setupUserConf

# check if we run as init container or runtime
if [ -n "${RUN_INIT+x}" ]; then
  runInit
  installOrUpdateXentral
elif [ -n "${RUN_QUEUE+x}" ]; then
  php refreshFileCache.php
  echo starting "$@"
  exec "$@"
else
  php refreshFileCache.php
  runCronjobs
  echo starting "$@"
  exec "$@"
fi


