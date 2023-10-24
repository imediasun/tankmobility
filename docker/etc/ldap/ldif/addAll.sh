#!/usr/bin/env bash
sleep 5
echo ' START IMPORT LDAP USERS'

ldapadd -h openldap -x -D "cn=admin,dc=example,dc=org" -w admin -f /container/service/slapd/assets/config/bootstrap/ldif/custom/people.ldif

echo ' FINISH IMPORT LDAP USERS'