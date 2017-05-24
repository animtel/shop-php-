<?php

class Product {
    public $name;
    public $type;
    public $value;
    function __construct($name, $type, $value) {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }
}