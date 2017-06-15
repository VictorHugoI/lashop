#!/usr/bin/env bash

ENV="dev"
BASE_DIR="/vagrant"

echo "Hello, Provision is starting...."


apt-get update

apt-get -y install zip unzip


apt-get -y install apache2
a2enmod rewrite

export DEBIAN_FRONTEND="noninteractive"

debconf-set-selections <<< "mysql-server mysql-server/root_password password $1"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $1"
apt-get -y install mysql-server

mysql -u root < /vagrant/data/mysql/create-user.sql


apt-get -y install php7.0

apt-get -y install libapache2-mod-php7.0

yes | cp -rf /vagrant/data/php/php.ini /etc/php/7.0/apache2/php.ini
yes | cp -rf /vagrant/data/php/php-cli.ini /etc/php/7.0/cli/php.ini
 
apt-get -y install php7.0-mysql

#apt-get -y install php7.0-cli

apt-get -y install php7.0-intl

#apt-get -y install php7.0-pgsql
#apt-get -y install php7.0-sqlite

#apt-get -y install php7.0-apcu
#apt-get -y install php7.0-memcache
### apt-get -y install php7.0-memcached

apt-get -y install php7.0-gd
#apt-get -y install php7.0-imagick

apt-get -y install php7.0-mcrypt

apt-get -y install php7.0-mbstring

apt-get -y install php7.0-xml

#apt-get -y install php-apcu


# phpMyAdmin
cd /var/www/html
curl -o phpMyAdmin.tar.gz https://files.phpmyadmin.net/phpMyAdmin/4.7.0/phpMyAdmin-4.7.0-english.tar.gz
mkdir -p phpMyAdmin
tar -xzf phpMyAdmin.tar.gz -C phpMyAdmin --strip-components=1
rm -f phpMyAdmin.tar.gz
yes | cp -rf /vagrant/data/phpMyAdmin/config.inc.php /var/www/html/phpMyAdmin/config.inc.php
chown -R www-data:www-data phpMyAdmin


# lashop.dev
yes | cp -rf /vagrant/data/apache2/web.conf /etc/apache2/sites-available/web.conf
a2ensite web
# db.lashop.dev
yes | cp -rf /vagrant/data/apache2/pma.conf /etc/apache2/sites-available/pma.conf
a2ensite pma


#service apache2 reload


# Composer
cd /tmp/
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer


curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -
apt-get -y install nodejs

#npm install --global gulp-cli
npm install -g bower

