#!/bin/bash

rm "/var/www/html/wp-content/themes/prep-env.sh"
sudo chown -R apache:apache "/var/www/html/wp-content/themes/$1"
