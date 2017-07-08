<?php

namespace App\Model\Data;

class CategoryDao{
    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function insert($category) {
        $sql = "INSERT INTO `mvcprojectdemo`.`category` (`id`, `name`, `parent_id`)"
                . " VALUES (:id, :name, :parent_id)";
        $command = $this->db->prepare($sql);

        $args = array(
            'id'=>$category->getCategory_id(),
            'name' => $category->getName(),
            'parent_id' => $category->getParentId()
        );

        $result = $command->execute($args);
        return $result;
    }
    function update($category) {
        $sql = "UPDATE `mvcprojectdemo`.`category` SET `name` = :name, `parent_id` = :parent_id WHERE `id` = :id";
        $command = $this->db->prepare($sql);

        $args = array(
            'id'=>$category->getCategory_id(),
            'name' => $category->getName(),
            'parent_id' => $category->getParentId()
        );

        $result = $command->execute($args);
        return $result;
    }
    function findById($id) {
        $sql = "select * from category where id=?";
        $command = $command = $this->db->prepare($sql);
        $command->bindValue(1, $id);
        $command->execute();
        $result = $command->fetch();
        $command->closeCursor();
        return $result;
    }

    function findByName($name) {
        $sql = "select * from category where name like ?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, '%' . $name . '%');
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }

    function delete($id) {
        $sql = "delete from category where id =?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, id);
        $result = $command->execute();
        return $result;
    }
    function findAll() {
        $sql = "select * from category";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }
    function findSortedAll($sorted_fields) {
        $sql = "select * from category order by $sorted_fields";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }
}