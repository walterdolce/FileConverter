#!/usr/local/bin/env php
<?php
/**
 * @author Walter Dolce <walterdolce@gmail.com>
 */
require 'vendor/autoload.php';

$args = getopt('f:d::');

if (php_sapi_name() != 'cli') {
    echo sprintf('Can only run this script on the command line (cli). Not on "%s".', php_sapi_name());
    exit(1);
}

if (empty($args) || !array_key_exists('f', $args)) {
    echo "No file specified. Skipping." . PHP_EOL;
    exit(0);
}

$file = $args['f'];
if (!file_exists($file) || !is_readable($file)) {
    echo "File does not exists or cannot be read." . PHP_EOL;
    exit(1);
}

if (!array_key_exists('d', $args) || empty($args['d'])) {
    $destination = './';
} else {
    $destination = $args['d'];
}

$fileLines = [];
$fileLines = App_Parser_Txt::load($file);
$fileLines = array_map(function($item) {
    $item = explode("\t", $item);
    array_shift($item);
    return $item;
}, $fileLines);


try {

    App_Parser_Yaml::dump($fileLines, $destination);

} catch(\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(1);
}

echo "Done" . PHP_EOL;
exit(0);