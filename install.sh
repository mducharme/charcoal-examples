#!/bin/sh

# Create the database and table
mysql -uroot -e 'create database if not exists charcoal_examples;use charcoal_examples;source examples/data/tests.sql;'
# Download and install composer
wget http://getcomposer.org/composer.phar
php composer.phar install