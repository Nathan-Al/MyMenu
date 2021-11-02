#!/bin/bash

# Run the cake php server in local
echo -n "Do you want to run the Cakephp server in local y/n ? : "
read -r answerServ

# Start the cakePhp manually
# if [ $answerServ = 'y' ]
# then
# echo "Run Cakephp server"
# ./bin/cake server
# fi

# Run the node JS compiler for VueJS
echo "Run VueJS node compiler"
npm run watch
