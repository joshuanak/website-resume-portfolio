<?php

/*
 * Nathan Waters
 * 5/10/2023
 * 328/application2/index.php
 * Controller for application2 project
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');
//require_once('model/data-layer.php');
require_once('model/validation.php');

// Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();
$con = new Controller($f3);


$dataLayer = new DataLayer();
//$newUser = new User("guest", "Tim", "Waters", "nathanwaters@gmail.com", "nathan");
//$userID = $dataLayer->saveUser($newUser);
//echo ("new user: $userID");
//$x = $dataLayer->getItems("pizza");
//var_dump($x);
// Define a default route
$f3->route('GET /', function() {
    $GLOBALS['con']->home();
});

// non default that routes to home page
$f3->route('GET|POST /home', function() {
    $GLOBALS['con']->home();
});

//about us
$f3->route('GET /about', function() {
    $GLOBALS['con']->aboutUs();
});

$f3->route('GET|POST /admin', function() {
    $GLOBALS['con']->admin();
});

$f3->route('GET|POST /guest', function() {
    $GLOBALS['con']->guest();
});

//order page
$f3->route('GET|POST /order', function() {
    $GLOBALS['con']->order();
});

$f3->route('GET|POST /menu', function() {
    $GLOBALS['con']->menu();
});

$f3->route('GET|POST /pizza', function() {
    $GLOBALS['con']->pizza();
});

$f3->route('GET|POST /sides', function() {
    $GLOBALS['con']->sides();
});

$f3->route('GET|POST /sodas', function() {
    $GLOBALS['con']->sodas();
});

$f3->route('GET|POST /login', function() {
    $GLOBALS['con']->login();
});

$f3->route('GET|POST /signUp', function() {
    $GLOBALS['con']->signUp();
});

$f3->route('GET|POST /cart', function() {
    $GLOBALS['con']->cart();
});

// Run Fat-Free
$f3->run();

?>