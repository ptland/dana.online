<?php

use App\Model\Data\DatabaseUtils;
use App\Model\Product;
use App\Model\Data\ProductDao;
use App\Model\Data\CategoryDao;

try {
    $connection = DatabaseUtils::connect();
    $productDao = new ProductDao($connection);
    $categoryDao = new CategoryDao($connection);
    if ($action == 'detail') {
        $id = $_GET['id'];
        $row =  $productDao->findById($id);
        $crow = $categoryDao->findById($row['category_id']);
        
        include './views/products/detail.php';
    }elseif ($action == 'add') {
        $categories = $categoryDao->findSortedAll(' name asc ');
        include './views/products/add.php';
    } elseif ($action == 'add_save') {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $unit_price = $_POST['unit_price'];
        $vendor = $_POST['vendor'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $is_featured = 0;
        if (isset($_POST['is_featured']))
            $is_featured = $_POST['is_featured'];
        $status = 'New';


        $entered_at = new DateTime('',new DateTimeZone('Asia/Ho_Chi_Minh'));
        $entered_at = $entered_at->format('Y-m-d H:i:s');

//        die(var_dump($entered_at));

        $product = new Product();
        
        $product->setName($name);
        $product->setCategory_id($category_id);
        $product->setQuantity($quantity);
        $product->setUnit_price($unit_price);
        $product->setVendor($vendor);
        $product->setDescription($description);
        $product->setStatus($status);
        $product->setEntered_date($entered_at);
        $product->setIs_featured($is_featured);
        $image_url = NULL;
        if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]['error'] != UPLOAD_ERR_NO_FILE){
            $uploadFiles = UploadFileHelper::processUploadFile();
            $image_url = $uploadFiles['FileName'];
        }
        $product->setImage_url($image_url);

        $result = $productDao->insert($product);

        $msg = "$result product has been inserted";
        $categories = $categoryDao->findSortedAll(' name asc ');
        include './views/products/add.php';
    } elseif ($action == 'delete') {
        $id = $_GET['id'];
        $result = $productDao->delete($id);
        //$msg = "The product has been deleted!";
        $alert_message = "The product has been deleted!";
        //header("Location: index.php");
        $result = $productDao->findAll();
        include './views/products/list.php';
    } elseif ($action == 'edit') {
        $id = $_GET['id'];
        $row = $productDao->findById($id);
        $categories = $categoryDao->findSortedAll(' name asc ');
        include './views/products/edit.php';
    } elseif ($action == 'edit_save') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category_id= $_POST['category_id'];
        $quantity = $_POST['quantity'];
        $unit_price = $_POST['unit_price'];
        $vendor = $_POST['vendor'];
        $description = $_POST['description'];
        $old_image = null;
        if (isset($_POST['old_image']))
            $old_image = $_POST['old_image'];
        $status = $_POST['status'];

        $product = new Product();
        $product->setProduct_id($id);
        $product->setName($name);
        $product->setCategory_id($category_id);
        $product->setQuantity($quantity);
        $product->setUnit_price($unit_price);
        $product->setVendor($vendor);
        $product->setDescription($description);
        $image_url = NULL;
        if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]['error'] != UPLOAD_ERR_NO_FILE){
            $uploadFiles = UploadFileHelper::processUploadFile();
            $image_url = $uploadFiles['FileName'];
        }else{
            $image_url= $old_image;
        }
        $product->setStatus($status);
        $product->setImage_url($image_url);

        $productDao->update($product);

        header("Location: index.php?action=product_list");
    } elseif ($action == 'find') {
        $result = NULL;
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $result = $productDao->findByName($name);
            if (empty($result)) {
                $msg = "There aren't any products";
            }
        } else {
            $result = $productDao->findAll();
        }
        include './views/products/find.php';
    } else { //(action == 'list')
        $result = $productDao->findAll();
        include './views/products/list.php';
    }
} catch (Exception $exc) {
    $error = $exc->getMessage();
    include 'views/dashboard/error.php';
}