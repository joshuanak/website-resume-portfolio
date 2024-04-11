<?php

class Items
{
    private $_id;
    private $_type;
    private $_name;
    private $_description;
    private $_price;
    private $_size;

    /**
     * @param $_id
     * @param $_type
     * @param $_name
     * @param $_description
     */
    public function __construct($id = "", $type= "", $name= "", $description= "", $price = 0.0, $size = "m")
    {
        $this->_id = $id;
        $this->_type = $type;
        $this->_name = $name;
        $this->_description = $description;
        $this->_price = $price;
        $this->_size = $size;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->_type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $desciption
     */
    public function setDesciption($description): void
    {
        $this->_description= $description;
    }

    /**
     * @return float|mixed
     */
    public function getPrice(): mixed
    {
        return $this->_price;
    }

    /**
     * @param float|mixed $price
     */
    public function setPrice(mixed $price): void
    {
        $this->_price = $price;
    }

    /**
     * @return mixed|string
     */
    public function getSize(): mixed
    {
        return $this->_size;
    }

    /**
     * @param mixed|string $size
     */
    public function setSize(mixed $size): void
    {
        $this->_size = $size;
    }

}