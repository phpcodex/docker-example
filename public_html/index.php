<?php

/**
 * Include our vendor.
 */
include_once 'vendor/autoload.php';

/**
 * Load our environment variables.
 */
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

/**
 * Show what is in our working directory.
 * We should have the vendor folder.
 */
echo '<pre>...', print_r(glob('*'));

/**
 * Obtain the envionment we are.
 */
$env = getenv('APP_ENV') ?: 'Not set.';
$url = getenv('APP_URL') ?: 'Not set.';

/**
 * Describe to the viewer our environment.
 */
echo 'Our environment is: ' . $env . '<br />';
echo 'Our config URL is: this was required. ' . $url . '<br />';
echo '<a href="phpinfo.php">php info</a><br />';
echo 'Host: ' . $_SERVER['HTTP_HOST'] . '<br />';
echo phpversion();