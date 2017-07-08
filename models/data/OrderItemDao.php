<?php
/**
 * Created by PhpStorm.
 * User: Dana.io
 * Date: 7/7/2017
 * Time: 4:05 PM
 */

namespace App\Model\Data;


class OrderItemDao
{
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function addProductToOrder($order_id,$product_id,$quantity)
    {
        //INSERT INTO `tbl_orderedproduct` (`id`, `productId`, `price`, `unit`, `orderId`) VALUES (NULL, '', '', '', '');
        try{
            $stmt=$this->db->prepare("INSERT INTO `order_items` (`order_id`,`product_id`, `quantity`) VALUES (:order_id, :product_id, :quantity);");
            $stmt->bindparam(':order_id',$order_id);
            $stmt->bindparam(':product_id',$product_id);
            $stmt->bindparam(':quantity',$quantity);

            $stmt->execute();


        }
        catch(Exception $e){
            echo $e->getMessage();
        }

    }

    function findAll()
    {
        $sql = "select * from order_items";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }

    function delete($id) {
        $sql = "delete from order_items where id =?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, $id);
        $result = $command->execute();
        return $result;
    }
}