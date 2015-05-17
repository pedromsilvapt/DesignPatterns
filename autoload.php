<?php
use ClassLoader\ClassLoader;

require 'ClassLoader\ClassLoader.php';

$classLoader = ClassLoader::instance();

$classLoader->register();
$classLoader->addPrefix( '', __DIR__ );