#!/bin/bash
#
# Builds a clean copy of the plugin that can be easily uploaded to the WordPress directory's SVN repo, to streamline
# the release process


PHP=` whereis php |awk '{print $2;}' `

VERSION=` $PHP -r "echo json_decode(file_get_contents('package.json'), true)['version'];" `
TARGET="build-$VERSION"

mkdir -p "$TARGET/trunk"

cp -r css "$TARGET/trunk/"
cp -r inc "$TARGET/trunk/"
cp -r index.php "$TARGET/trunk/"
cp -r js "$TARGET/trunk/"
cp -r licence.txt "$TARGET/trunk/"
cp -r readme.txt "$TARGET/trunk/"
cp -r squelch-tabs-and-accordions.php "$TARGET/trunk/"

cp -r assets $TARGET
rm -rf "$TARGET/assets/src/"

cd "$TARGET/trunk"

zip -r "../squelch-tabs-and-accordions-shortcodes.zip" *

cd -

