#!/bin/bash

# install all application requirements

# install composer
if [ ! -d 'vendor/' ]
then
    composer install
fi

# install node modules
if [ ! -d 'node_modules/' ]
then
    npm install --loglevel=error
fi

# build assets
if [ ! -d 'public/build/' ]
then
    npm run build
fi

# fix storage permissions
sudo chmod -R 777 var/
