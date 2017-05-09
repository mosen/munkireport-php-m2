#!/usr/bin/env bash

SERVER_APP_APACHE_DIR="/Library/Server/Web/Config/apache2"
SERVER_APP_CONFIG_DEST="${SERVER_APP_APACHE_DIR}/webapps/com.github.mosen.munkireport3.webapp.plist"

if [ ! -d ${SERVER_APP_APACHE_DIR} ]; then
    echo "Server.app not installed or web directory does not exist! exiting..."
    exit 1
fi


if [ -f ${SERVER_APP_CONFIG_DEST} ]; then
    echo "webapp.plist already exists at target path: ${SERVER_APP_CONFIG_DEST}"
else
    echo "Linking webapp plist into Server.app folder..."
    ln -s ${PWD}/com.github.mosen.munkireport3.webapp.plist
fi

if [ -f ${SERVER_APP_APACHE_DIR}/httpd_munkireport3.conf ]; then
    echo "httpd_munkireport3.conf already exists in ${SERVER_APP_APACHE_DIR}, refusing to overwrite."
    exit 1
else
    ln -s ${PWD}/httpd_munkireport3.conf ${SERVER_APP_APACHE_DIR}/httpd_munkireport3.conf
fi

echo "All done. Enable web app from Server.app or by using webappctl."

