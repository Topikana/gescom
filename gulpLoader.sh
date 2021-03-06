#!/bin/bash

echo '******************************************************'
echo '*                                                    *'
echo '*               Welcome to GulpLoader                *'
echo '*                                                    *'
echo '******************************************************'
echo '                Type CTRL+C for exit                  '
echo

while [ -z $reponse ] || [ $reponse != 'y' ]
do
    read -p '- Entrez (y) pour continuer... : ' reponse
done

npm init
npm install gulp --save-dev
npm install gulp-sass --save-dev
npm install browser-sync --save-dev
echo $PWD

echo '******************************************************'
echo '*                                                    *'
echo '*   Gulp est initialiser avec sass et browser-sync   *'
echo '*                                                    *'
echo '******************************************************'