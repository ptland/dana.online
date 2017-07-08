<?php
namespace App\Model;

class User {

    private $id;
    private $role_id;
    private $email;
    private $password;
    private $name;
    private $phone;
    private $address;
    private $created_at;

    function __construct($id = 0, $role_id = 0, $email = null, $password = null, $name = null, $phone = null, $address = null, $created_at = null) {
        $this->id = $id;
        $this->role_id = $role_id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->created_at = $created_at;
    }

    function getUser_id() {
        return $this->id;
    }

    function getRole_id(){
        return $this->role_id;
    }

    function getEmail() {
        return $this->email;
    }

    function getName() {
        return $this->name;
    }

    function getPassword() {
        return $this->password;
    }

    function getAddress() {
        return $this->address;
    }

    function getPhone() {
        return $this->phone;
    }

    function getCreated_at(){
        return $this->created_at;
    }

    function setUser_id($id) {
        $this->id = $id;
    }

    function setRole_id($role_id) {
        $this->role_id = $role_id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }
}
