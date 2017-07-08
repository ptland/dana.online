<?php

namespace App\Model;

class Category{
    private $category_id;
    private $name;
    private $parent_id;
    
    function __construct($category_id=0, $name=null, $parent_id=0) {
        $this->category_id = $category_id;
        $this->name = $name;
        $this->parent_id = $parent_id;
    }
    function getCategory_id() {
        return $this->category_id;
    }

    function getName() {
        return $this->name;
    }

    function getParentId(){
        return $this->parent_id;
    }

    function setCategory_id($category_id) {
        $this->category_id = $category_id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setParentId($parent_id){
        $this->parent_id = $parent_id;
    }

}