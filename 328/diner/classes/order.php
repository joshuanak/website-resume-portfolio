<?php
/**
 * The Order class represents a customer
 * order from My Diner
 * @author Joshua Nakatani
 * @date May 23, 2023
 * @version 1.1
 */

class Order {
    private $_food;

    /**
     * Default constructor for Order
     */
    function __construct() {
        $this->_food = "";
    }

    /**
     * Set food for order
     * @param string $food
     */
    public function setFood($food) {
        $this->_food = $food;
    }

    /**
     * Get food for order
     * @return string
     */
    public function getFood() {
        return $this->_food;
    }
}

//Test code
$testOrder = new Order();
$testOrder->setFood("banh mi");
echo $testOrder->getFood();