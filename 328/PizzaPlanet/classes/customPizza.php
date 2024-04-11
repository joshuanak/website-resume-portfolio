<?php

//namespace classes;

class customPizza extends Items
{
    private $_crust;
    private $_sauce;
    private $_toppings;
    private $_size;

    function __construct($size= "", $crust= "", $sauce= "", $toppings= ""){
        parent:: __construct();
//        $this->_size = $size;
        $this->_crust = $crust;
        $this->_sauce = $sauce;
        $this->_toppings = $toppings;
    }

    /**
     * @return mixed
     */
    public function getCrust()
    {
        return $this->_crust;
    }

    /**
     * @param mixed $crust
     */
    public function setCrust($crust)
    {
        $this->_crust = $crust;
    }

    /**
     * @return mixed
     */
    public function getSauce()
    {
        return $this->_sauce;
    }

    /**
     * @param mixed $sauce
     */
    public function setSauce($sauce)
    {
        $this->_sauce = $sauce;
    }

    /**
     * @return mixed
     */
    public function getToppings()
    {
        return $this->_toppings;
    }

    /**
     * @param mixed $toppings
     */
    public function setToppings($toppings)
    {
        $this->_toppings = $toppings;
    }

    /**
     * @return mixed
     */
//    public function getSize()
//    {
//        return $this->_size;
//    }
//
//    /**
//     * @param mixed $size
//     */
//    public function setSize($size)
//    {
//        $this->_size = $size;
//    }

    public function margherita()
    {
        $this->_sauce = "red";
        $this->_toppings = "fresh mozzarella cheese, tomatoes, and basil leaves";
    }

    public function pepperoni()
    {
        $this->_sauce = "red";
        $this->_toppings = "melted cheese, pepperoni";
    }

    public function bbqChicken() {
        $this->_sauce = "red";
        $this->_toppings = "grilled chicken, barbecue sauce, red onions";
    }
    // cheese variable?
    // what kind of crust do we want for these pizzas?
    // toppings array or string?
}