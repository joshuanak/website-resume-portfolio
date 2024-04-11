<?php

/*
 * Joshua Nakatani
 * 5/4/2023
 * 328/application/index.php
 * Controller for application project
 */

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validation.php');

// Create an F3 object
$f3 = Base::instance();
$con = new Controller($f3);
// Base $f3 = new Base();

// Define a default route
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

// Define personal information route
$f3->route('GET|POST /personal-information', function() {
    $GLOBALS['con']->personalInfo();
});

// Define experience route
$f3->route('GET|POST /experience', function() {
    $GLOBALS['con']->experience();
});

// Define mailing list route
$f3->route('GET|POST /mailing-list', function() {
    $GLOBALS['con']->subscriptions();
});

// Define summary route
$f3->route('GET|POST /summary', function() {
    //var_dump($GLOBALS['con']);
    $GLOBALS['con']->summary();
});

// Run Fat-Free
$f3->run();