#!/bin/bash

if [ ! -f /etc/nginx/certs/localhost.crt ]; then
    openssl genrsa -out "/etc/nginx/certs/device.key" 2048
    openssl req -new -key "/etc/nginx/certs/device.key" -out "/etc/nginx/certs/localhost.crt" -subj "/CN=default/O=default/C=UK"
    openssl x509 -req -days 365 -in "/etc/nginx/certs/localhost.crt" -signkey "/etc/nginx/certs/device.key" -out "/etc/nginx/certs/localhost.crt"
    chmod 644 /etc/nginx/certs/device.key
fi

# Start crond in background
crond -l 2 -b

# Start nginx in foreground
nginx