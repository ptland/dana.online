<?php

require 'models/data/DatabaseUtils.php';
require 'models/data/ProductDao.php';
require 'models/data/CategoryDao.php';
require 'models/data/UserDao.php';
require 'models/data/OrderDao.php';
require 'models/data/OrderItemDao.php';
require 'models/User.php';
require 'models/Product.php';
require 'models/Category.php';
require 'models/Cart.php';
require 'models/Order.php';
require 'models/OrderItem.php';
use App\Model\Data\DatabaseUtils as DatabaseUtils;
use App\Model\Data\ProductDao as ProductDao;
use App\Model\Data\UserDao as UserDao;
use App\Model\Data\CategoryDao;
use App\Model\User as User;
use App\Model\Data\OrderDao;

$action = "home";

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}


if (strpos($action, 'cart')!== false){
    $action = substr($action, 5);
    $type = 'cart';

    include 'frontend/controllers/CartController.php';
}else {
    include 'frontend/controllers/UserController.php';
    include 'frontend/controllers/PageController.php';
}


