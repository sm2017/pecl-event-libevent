#!/usr/bin/env php
# autogenerated file; do not edit
sudo: false
language: c

addons:
 apt:
  packages:
   - php5-cli
   - php-pear

env:
 matrix:
<?php

$gen = include __DIR__ . "/../travis/pecl/gen-matrix.php";
$env = $gen([
	"PHP" => ["master"],
	"enable_debug",
	"enable_maintainer_zts",
]);
foreach ($env as $e) {
	printf("  - %s\n", $e);
}

?>

before_script:
 - make -f travis/pecl/Makefile php
 - make -f travis/pecl/Makefile ext PECL=libevent

script:
 - make -f travis/pecl/Makefile test
