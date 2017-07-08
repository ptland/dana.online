<?php

use App\Model\Data\DatabaseUtils;
use App\Model\Data\ProductDao;
use App\Model\Data\UserDao;
use App\Model\Data\OrderDao;
use App\Model\Data\OrderItemDao;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Cart;

$db = new PDO("mysql:host=localhost;dbname=mvcprojectdemo", 'root', '');
try
{
    $connection = DatabaseUtils::connect();
    $productDao = new ProductDao($connection);
    $cart = new Cart;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    switch ($action){
        case 'add':
            $row = $productDao->findById($id);

            if(isset($_POST['quantity']))
            {
                $quantity = $_POST['quantity'];
            }else{
                $quantity = 1;
            }

            $itemData = [
                'id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image_url'],
                'price' => $row['unit_price'],
                'quantity' => $quantity
            ];

            $insertItem = $cart->insert($itemData);

            header("Location: index.php");

            break;
        case 'list':

            include 'frontend/views/cart.php';
            break;
        case 'update':

            if (!empty($id))
            {
                $itemData = array(
                    'rowid' => $_POST['id'],
                    'quantity' => $_POST['quantity']
                );

                $updateItem = $cart->update($itemData);

                include 'frontend/views/cart.php';
            }


            break;
        case 'delete':
            if (!empty($id))
            {
                $deleteItem = $cart->remove($id);
                include 'frontend/views/cart.php';
            }
            break;

        case 'checkout':
            if ( isset($_SESSION['user_id'])  &&  !empty($_SESSION['user_id']))
            {
                $id = $_SESSION['user_id'];

                $userDao = new UserDao(DatabaseUtils::connect());

                $custRow = $userDao->findById($id);

                include 'frontend/views/checkout.php';
            }
            else
            {
                header('Location: index.php?action=login');
            }
            break;
        case 'order':
            if ( $cart->total_items() > 0 && !empty($_SESSION['user_id']) )
            {
                $id = $_SESSION['user_id'];

                $userDao = new UserDao(DatabaseUtils::connect());

                $orderDao = new OrderDao(DatabaseUtils::connect());
                $user_id = $_SESSION['user_id'];
                $total_price = $cart->total();

                $created_at = new DateTime('',new DateTimeZone('Asia/Ho_Chi_Minh'));
                $created_at = $created_at->format('Y-m-d H:i:s');

                $order = new Order();

                $order->setUserId($user_id);
                $order->setTotalPrice($total_price);
                $order->setCreatedAt($created_at);

                $insertOrder = $orderDao->insert($order);


                if ($insertOrder == true)
                {

                    $orderItemDao = new OrderItemDao(DatabaseUtils::connect());
                    $order_id = $orderDao->getLastOrderId();

                    $cartItems = $cart->contents();

                    foreach ( $cartItems as $item )
                    {
                        $product_id = $item['id'];
                        $quantity = $item['quantity'];
                        $insertOrderItem = $orderItemDao->addProductToOrder($order_id, $product_id, $quantity);
                    }


                    $cart->destroy();
                    include 'frontend/views/success.php';



                }else{


                    $custRow = $userDao->findById($id);
                    include 'frontend/views/checkout.php';
                }
            }else
            {

                $custRow = $userDao->findById($id);
                include 'frontend/views/checkout.php';
            }

            break;
    }
}
catch (PDOException $e)
{
    die( $e->getMessage() );
}