#!/usr/bin/env bash

echo "Configuration de SSMTP"
sleep 5

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

echo "Configuration de PHP"
sleep 5

echo "[mail function]
SMTP = localhost
smtp_port = 25
sendmail_path = /usr/sbin/ssmtp -t
mail.add_x_header = Off" >> /usr/local/etc/php/php.ini

echo "Le serveur va redémarrer dans 5 secondes..."
sleep 5

/etc/init.d/apache2 restart
