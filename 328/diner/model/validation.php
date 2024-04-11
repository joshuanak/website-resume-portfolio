<?php

/* diner/model/data-layer.php
    Contains functionality to validate data
    This is part of the MODEL
    Eventually, this will read/write the DB
*/

function validMeal($meal) {
    // if meal is not empty and is in the array of
    // valid meals, return true otherwise, return false.
    /*
    if (!empty($meal) && in_array($meal, getmeals())) {
        return true;
    } else {
        return false;
    }
    */

    return (!empty($meal) && in_array($meal, getMeals()));
}

/* Add a validFood() function */

function validFood($food) {
    $food = trim($food);
    return (!empty($food) && !ctype_digit($food) && strlen($food) >= 2);
}

function validCondiments($userCondiments) {
    $validCondiments = getCondiments();

    // Check each user condiment against array of valid condiments
    foreach ($userCondiments as $userCondiment){
        if (!in_array($userCondiment, $validCondiments)) {
            return false;
        } else {
            return true;
        }
    }
}