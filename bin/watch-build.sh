#!/bin/bash

# Yes, this is a little crude, but it works. I've tried entr in the past and found it caused complete CPU lock-ups on
# a regular basis, so I'm happy sticking with this simplistic solution. On a bigger project there are undoubtedly
# better solutions. This ain't no Vite, but it'll do!


##
# Read in all CSS files and find their MD5 sum
##
function getCssSum {
    files=` find css -iname '*.css' -not -iname '*.min.*' `
    cat $files |md5
}


##
# Read in all JS files and find their MD5 sum
##
function getJsSum {
    files=` find js -iname '*.js' -not -iname '*.min.*' `
    cat $files |md5
}


csslastsum=` getCssSum `
jslastsum=` getJsSum `
dev=""

[[ "$1" == "--dev" ]] && dev="1"

while [ 1 ];
do
    sum=` getCssSum `

    if [[ "$sum" != "$csslastsum" ]];
    then
        yarn run build:css
        git status |grep "\.css"
        echo -ne "\a"
    fi

    csslastsum=$sum


    sum=` getJsSum `

    if [[ "$sum" != "$jslastsum" ]];
    then
        if [[ "$dev" == "1" ]];
        then
            yarn run build:js:dev
            echo "WARNING: Development version with source maps built, be sure to build for production before deploying!"
        else
            yarn run build:js
        fi
        git status |grep "\.js"
        echo -ne "\a"
    fi

    jslastsum=$sum

    sleep 1

done

