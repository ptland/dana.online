<?php
require '../models/data/DatabaseUtils.php';
require '../models/data/ProductDao.php';
require '../models/data/UserDao.php';
require '../models/User.php';
require '../models/Product.php';
require '../models/Category.php';
require '../models/data/CategoryDao.php';

require '../Utilities/UploadFileHelper.php';

use App\Model\Data\DatabaseUtils as DatabaseUtils;
use App\Model\Data\UserDao as UserDao;
use App\Model\User as User;

$action = "list";

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action == 'login'){
    include './views/security/login.php';
}elseif ($action == 'login_check') {
    $userDao = new UserDao(DatabaseUtils::connect());
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $role_id = (int)$userDao->findRoleId($email);
        if ($userDao->checkLogin($email, $password)) {
            $id = (int)$userDao->findUserId($email);
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
            $_SESSION['role_id'] = $role_id;
            header('Location: index.php');

        } else {
            $msg = "Invalid username or password";
            include './views/security/login.php';
        }
    }
}elseif ($action == 'logout'){

    session_start();
    session_destroy();
    include './views/security/login.php';

}else{

    include '../Utilities/Security.php';

    if (strpos($action, 'user')!== false){
        $action = substr($action, 5);
        $type = 'user';

        include './controllers/AdminController.php';
    }elseif (strpos($action, 'category') !== false) {
        $action = substr($action, 9);
        $type = 'category';

        include './controllers/CategoryController.php';
    }elseif (strpos($action, 'product') !== false) {
        $action = substr($action, 8);
        $type = 'product';

        include './controllers/ProductController.php';
    }else{
        $type='dashboard';
        include './views/dashboard/home.php';
    }
}