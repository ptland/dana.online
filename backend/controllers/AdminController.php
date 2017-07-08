<?php

use App\Model\Data\DatabaseUtils;
use App\Model\User;
use App\Model\Data\UserDao as UserDao;


try {
    $adminDao = new UserDao(DatabaseUtils::connect());

    switch ($action)
    {

        case 'detail':
            include './views/users/detail.php';
            break;
        case 'add':
            include './views/users/add.php';
            break;
        case 'add_save':
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $role_id = htmlspecialchars($_POST['role']);

            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);


            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);

            $user->setRole_id($role_id);

            $user->setName($name);
            $user->setPhone($phone);
            $user->setAddress($address);

            $result = $adminDao->insert($user);

            $msg = "$result user has been inserted";
            include './views/users/add.php';

            break;
        case 'delete':
            $id = $_GET['id'];

            $result = $adminDao->delete($id);
            $alert_message = 'The user has been deleted!!';
            header("Location: index.php?action=user_list");
            break;
        case 'edit':
            $user_id = $_GET['user_id'];
            $row = $adminDao->findById($id);

            $msg = "";
            include './views/users/edit.php';

            break;
        case 'edit_save':
            $id = htmlspecialchars($_POST['id']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $role_id = htmlspecialchars($_POST['role']);

            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);

            $user = new User();
            $user->setUser_id($id);

            $user->setEmail($email);
            $user->setPassword($password);

            $user->setRole_id('role_id');

            $user->setName($name);
            $user->setPhone($phone);
            $user->setAddress($address);

            $adminDao->update($user);

            header("Location: index.php?action=user_list");
            break;
        case 'find':
            $result = NULL;
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $result = $adminDao->findByName($name);
                if (empty($result)) {
                    $msg = "There aren't any users";
                }
            } else {
                $result = $adminDao->findAll();
            }
            include './views/users/find.php';
            break;
        default:
            $result = $adminDao->findAll();
            include './views/users/list.php';

    }

} catch (Exception $exc) {
    $error = $exc->getMessage();
}