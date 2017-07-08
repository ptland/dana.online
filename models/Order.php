<?php
/**
 * Created by PhpStorm.
 * User: Dana.io
 * Date: 7/7/2017
 * Time: 3:46 PM
 */

namespace App\Model;


class Order
{

    private $id, $user_id, $total_price, $address, $created_at, $modified;

    public function __construct($id=0,$user_id=0,$total_price=0, $address=null, $created_at=null,$modified=null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->total_price = $total_price;
        $this->address = $address;
        $this->created_at = $created_at;
        $this->modified = $modified;
    }

    public function getOrderId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function getTotalPrice(){
        return $this->total_price;
    }

    public function getShippingAddress(){
        return $this->address;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function getModified(){
        return $this->modified;
    }

    public function setOrderId($id)
    {
        $this->id = $id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    public function setShippingAddress($address)
    {
        $this->address = $address;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setModified($modified)
    {
        $this->modified = $modified;
    }
}