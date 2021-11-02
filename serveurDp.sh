#!/bin/bash
# Run composer and answer the command prompt
Y | composer i

# Run npm to install the node depencies
npm i

# Set the permissions for the Cakephp command prompt
chmod +x bin/cake

# Set the read/write permissions for the Cakephp dir
HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
setfacl -R -m u:${HTTPDUSER}:rwx tmp
setfacl -R -d -m u:${HTTPDUSER}:rwx tmp
setfacl -R -m u:${HTTPDUSER}:rwx logs
setfacl -R -d -m u:${HTTPDUSER}:rwx logs
