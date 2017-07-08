<?php

namespace App\Model\Data;
class ProductDao {

    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function insert($product) {
        $sql = "INSERT INTO `mvcprojectdemo`.`product` (`name`,`quantity`,`unit_price`,`vendor`,"
                . " `description`,`status`, `image_url`,`entered_date`,`is_featured`,`category_id`)"
                . " VALUES(:name,:quantity,:unit_price,:vendor,:description,"
                . ":status, :image_url, :entered_date, :is_featured,:category_id);";
        $command = $this->db->prepare($sql);

        $args = array(
            'name' => $product->getName(),
            'quantity' => $product->getQuantity(),
            'unit_price' => $product->getUnit_price(),
            'vendor' => $product->getVendor(),
            'description' => $product->getDescription(),
            'status' => $product->getStatus(),
            'image_url'=>$product->getImage_url(),
            'entered_date'=>$product->getEntered_date(),
            'is_featured'=>$product->getIs_featured(),
            'category_id'=>$product->getCategory_id()
        );

        $result = $command->execute($args);
        return $result;
    }
    
    function update($product) {
        $sql = "UPDATE `mvcprojectdemo`.`product` "
                . " SET `id` = :id,`name` = :name,`quantity` = :quantity,"
                . " `unit_price` = :unit_price, `vendor` = :vendor,"
                . " `description` = :description,`status` = :status, image_url = :image_url, "
                . " is_featured=:is_featured, category_id=:category_id "
                . " WHERE `id` = :id";
        $command = $this->db->prepare($sql);

        $args = array(
            'name' => $product->getName(),
            'quantity' => $product->getQuantity(),
            'unit_price' => $product->getUnit_price(),
            'vendor' => $product->getVendor(),
            'description' => $product->getDescription(),
            'status' => $product->getStatus(),
            'image_url'=>$product->getImage_url(),
            'id'=>$product->getProduct_id(),
            'is_featured'=>$product->getIs_featured(),
            'category_id'=>$product->getCategory_id()
        );

        $result = $command->execute($args);
        return $result;
    }
    function findById($id) {
        $sql = "select * from product where id=?";
        $command = $command = $this->db->prepare($sql);
        $command->bindValue(1, $id);
        $command->execute();
        $result = $command->fetch();
        $command->closeCursor();
        return $result;
    }

    function findByCategoryId($category_id) {
        $sql = "select * from product where category_id=?";
        $command = $command = $this->db->prepare($sql);
        $command->bindValue(1, $category_id);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }

    function findByName($name) {
        $sql = "select * from product where name like ?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, '%' . $name . '%');
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }

    function delete($id) {
        $sql = "delete from product where id =?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, $id);
        $result = $command->execute();
        return $result;
    }
    function findAll() {
        $sql = "select * from product";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }
    
    /**
     * Find the list of featured products. It is used to display in the front-end home page.
     * @param type $count
     * @return type
     */
    function findFeaturedProducts($count) {
        $sql = "select * from product where is_featured=1 order by entered_date limit $count";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }
    function findNewProducts($count) {
        $sql = "select * from product where status = 'New' order by entered_date limit $count";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }
    
}
