#!/usr/bin/env bash

cat <<- SSMTP_CONF > /etc/ssmtp/ssmtp.conf
root=personal.jacquemin@gmail.com
mailhub=smtp.gmail.com:25
hostname=camagru
FromLineOverride=YES
useSTARTTLS=YES
AuthUser=personal.jacquemin@gmail.com
AuthPass=aqwzsx08
debug=yes
SSMTP_CONF

cat <<- REVALIASES > /etc/ssmtp/revaliases
root:personal.jacquemin@gmail.com:smtp.gmail.com:25
REVALIASES

echo "[mail function]
SMTP = localhost
smtp_port = 25
sendmail_path = /usr/sbin/ssmtp -t
mail.add_x_header = Off" >> /usr/local/etc/php/php.ini
