<?php

//validate crust
function validSelectedCrust($selectedCrust){
        if ($selectedCrust == "Traditional Hand Tossed" || $selectedCrust == "Thin Crust" || $selectedCrust == "Stuffed Crust"){
            return true;
        }
    return false;
}

//validate sauce
function validSelectedSauce($selectedSauce){
        if ($selectedSauce == "Classic Marinara" || $selectedSauce == "Alfredo" || $selectedSauce == "Buffalo" || $selectedSauce == "Barbecue"){
            return true;
        }
    return false;
}

//validate toppings
function validSelectedToppings($selectedToppings){
    $validToppings = DataLayer::getToppings();

    //Check each user toppings against array of valid toppings
    if ($selectedToppings == null){
        return false;
    }
    else{

    foreach ($selectedToppings as $selectedTopping){
        if (!in_array($selectedTopping, $validToppings)){
            return false;
        }
    }
    }
    return true;
}

//validate Size
function validSelectedSize($selectedSize){
        if ($selectedSize == "9 Inch" || $selectedSize == "12 Inch" || $selectedSize == "14 Inch" ){
            return true;
        }
    return false;
}

//validate Email
function validEmail($email){

    return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
        ? FALSE : TRUE;

}

//validate Names
function validName($name){
    $name = trim($name);
    return (strlen($name) >= 1 && !is_numeric($name));
}

//validate Password
function validPassword($password){

}