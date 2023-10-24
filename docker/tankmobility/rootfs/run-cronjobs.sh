#!/bin/sh

while [ true ]; do
  sleep 60
  php $APP_DIR/cronjobs/starter2.php >/dev/null 2>&1
done
