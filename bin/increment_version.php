#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use Ergebnis\Json\Printer;

$new_version = ( $argv[1] ?? '' );
if ( ! $new_version ) {
    echo "Usage: ./bin/increment_version.php [NEW VERSION]\n";
}

$readme_txt         = file_get_contents( "readme.txt" );
$plugin_php         = file_get_contents( "squelch-tabs-and-accordions.php" );
$package_json       = file_get_contents( "package.json" );

$package_json_obj   = json_decode($package_json, false);
$old_version        = $package_json_obj->version ?? 'UNKNOWN';

if ( $old_version != 'UNKNOWN' ) {

    echo "Current version: {$old_version}" . PHP_EOL;
    echo "New version:     {$new_version}" . PHP_EOL . PHP_EOL;

    if ( ! $new_version ) exit;

    try {

        $printer = new Printer\Printer();

        $readme_txt                 = preg_replace( "/Stable tag:\s+{$old_version}/",                   "Stable tag: {$new_version}",               $readme_txt );
        $plugin_php                 = preg_replace( "/ \* Version:\s+{$old_version}/",                  " * Version: {$new_version}",               $plugin_php );
        $plugin_php                 = preg_replace( "/\\\$taas_plugin_ver\s*=\s*'{$old_version}';/",    "\$taas_plugin_ver    = '{$new_version}';", $plugin_php );
        $package_json_obj->version  = $new_version;
        $package_json               = json_encode( $package_json_obj, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR );
        $package_json               = $printer->print( $package_json, '  ' );
        $package_json               = $package_json . PHP_EOL;

    } catch ( Exception $ex ) {
        echo $ex->getMessage() . PHP_EOL;
        die("Refusing to write changes due to error\n");
    }

    file_put_contents( "readme.txt",                        $readme_txt     );
    file_put_contents( "squelch-tabs-and-accordions.php",   $plugin_php     );
    file_put_contents( "package.json",                      $package_json   );

    echo "Checklist:" . PHP_EOL;
    echo "  * Ensure changelog and upgrade notices have been written in readme.txt" . PHP_EOL;
    echo "  * Merge changes into main and develop" . PHP_EOL;
    echo "  * Create a build with ./bin/build.sh" . PHP_EOL;
    echo "  * Tag version {$new_version}" . PHP_EOL;
    echo "  * Push to GitHub" . PHP_EOL;
    echo "  * Create release on GitHub" . PHP_EOL;
    echo "  * Deploy to WP svn" . PHP_EOL;

} else {
    echo "Unable to determine version from package.json" . PHP_EOL;
}

