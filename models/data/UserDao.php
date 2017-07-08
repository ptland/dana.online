<?php

namespace App\Model\Data;

class UserDao {
    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function insert($user) {
        $sql = "INSERT INTO `mvcprojectdemo`.`user` "
                . " (`role_id`,`email`,`password`,`name`,`phone`,`address`,`created_at`)"
                . " VALUES(?,?,?,?,?,?,?)";
        $command = $this->db->prepare($sql);

        $command->bindValue(1, $user->getRole_id());
        $command->bindValue(2, $user->getEmail());
        $command->bindValue(3, $user->getPassword());
        $command->bindValue(4, $user->getName());
        $command->bindValue(5, $user->getPhone());
        $command->bindValue(6, $user->getAddress());
        $command->bindValue(7, $user->getCreated_at());
        $result = $command->execute();
        return $result;
    }

    function update($user) {
        $sql = "UPDATE `mvcprojectdemo`.`user` SET `role_id` = ?,`email` = ?,`password` = ?,`name` = ?,"
                . " `phone` = ?, `address` = ? WHERE `id` = ?;";
        $command = $this->db->prepare($sql);

        $command->bindValue(1, $user->getRole_id());
        $command->bindValue(2, $user->getEmail());
        $command->bindValue(3, $user->getPassword());
        $command->bindValue(4, $user->getName());
        $command->bindValue(5, $user->getPhone());
        $command->bindValue(6, $user->getAddress());
        $command->bindValue(7, $user->getUser_id());
        $result = $command->execute();
        return $result;
    }

    function checkLogin($email, $password) {
        $sql = "select * from user where email=? and password = ?";
        $command = $command = $this->db->prepare($sql);
        $command->bindValue(1, $email);
        $command->bindValue(2, $password);
        $command->execute();
        $result = $command->fetch();
        $command->closeCursor();
        return !empty($result);
    }

    function findRoleId($email){
        $sql = "select role_id from user where email=?";
        $command = $command = $this->db->prepare($sql);
        $command->bindValue(1, $email);
        $command->execute();
        $result = $command->fetch();
        $command->closeCursor();
        return $result['role_id'];
    }

    function findUserId($email){
        $sql = "select id from user where email=?";
        $command = $command = $this->db->prepare($sql);
        $command->bindValue(1, $email);
        $command->execute();
        $result = $command->fetch();
        $command->closeCursor();
        return $result['id'];
    }

    function findById($id) {
        $sql = "select * from user where id=?";
        $command = $command = $this->db->prepare($sql);
        $command->bindValue(1, $id);
        $command->execute();
        $result = $command->fetch();
        $command->closeCursor();
        return $result;
    }

    function findByName($name) {
        $sql = "select * from user where name like ?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, '%' . $name . '%');
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }

    function delete($id) {
        $sql = "delete from user where id =?";
        $command = $this->db->prepare($sql);
        $command->bindValue(1, $id);
        $result = $command->execute();
        return $result;
    }

    function findAll() {
        $sql = "select * from user";
        $command = $this->db->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
        $command->closeCursor();
        return $result;
    }

}
