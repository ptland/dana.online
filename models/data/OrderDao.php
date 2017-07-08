<?php
/**
 * Created by PhpStorm.
 * User: Dana.io
 * Date: 7/7/2017
 * Time: 4:05 PM
 */

namespace App\Model\Data;


class OrderDao
{
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function insert($order)
    {
        $sql = "INSERT INTO `mvcprojectdemo`.`orders`"
                . " (`user_id`, `total_price`, `created_at`)"
                . " VALUES (:user_id, :total_price, :created_at)";

        $command = $this->db->prepare($sql);

        $args = [
            'user_id' => $order->getUserId(),
            'total_price' => $order->getTotalPrice(),
            'created_at' => $order->getCreatedAt()
        ];

        $result = $command->execute($args);

        return $result;
    }

    function findAll()
    {
        $sql = "select * from orders";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }

    function delete($id) {
        $sql = "delete from orders where id =?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, $id);
        $result = $command->execute();
        return $result;
    }

    function getLastOrderId()
    {
        $sql = "select max(id) id from orders";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetch();
        $command->closeCursor();
        return (int)$result['id'];
    }
}