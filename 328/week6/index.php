<?php

/*
 * Joshua Nakatani
 * 5/9/2023
 * 328/week6/index.php
 * Controller for week6 project
 */

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create an F3 object
$f3 = Base::instance();
// Base $f3 = new Base();

// Define a default route
$f3->route('GET /', function($f3) {

    // Add data to f3 "hive"
    $f3->set('title', 'Welcome to week 6: Templating');
    $f3->set('color', 'green');
    $f3->set('favfood', 'ramen');
    $f3->set('temp', 67);

    // Add radius variable to controller
    $f3->set('radius', 5);

    // Add array of fruits to controller
    $fruits = array('banana', 'apple', 'kiwi');
    $f3->set('fruits', $fruits);

    $vegetables = array('carrots', 'broccoli', "lettuce");
    $f3->set('vegetables', $vegetables);

    // Define an associate array of cupcake flavors
    $cupcakes = array('choc-mocha'=>'Chocolate Mocha',
                      'straw-cheese'=>'Strawberry Cheesecake',
                      'blue-lemon'=>'Blueberry Lemon');
    $f3->set('cupcakes', $cupcakes);

    // Display a view page
    $view = new Template();
    echo $view->render('views/info.html');
});

// Add an .htaccess file to enable routing
$f3->route('GET /page2', function() {
    echo "Page 2";
});

// Run Fat-Free
$f3->run();