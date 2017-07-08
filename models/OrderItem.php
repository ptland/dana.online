<?php
/**
 * Created by PhpStorm.
 * User: Dana.io
 * Date: 7/7/2017
 * Time: 3:59 PM
 */

namespace App\Model;


class OrderItem
{

    private $id, $order_id, $product_id, $quantity;

    public function __construct($id=0, $order_id=0, $product_id=0, $quantity=0)
    {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function getOrderItemId(){
        return $this->id;
    }

    public function getOrderId(){
        return $this->order_id;
    }

    public function getProductId(){
        return $this->product_id;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setOrderItemId($id){
        $this->id = $id;
    }

    public function setOrderId($order_id){
        $this->order_id = $order_id;
    }

    public function setProductId($product_id){
        $this->product_id = $product_id;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

}