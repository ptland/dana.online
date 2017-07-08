<?php



use App\Model\Data\DatabaseUtils as DatabaseUtils;
use App\Model\Data\ProductDao as ProductDao;
use App\Model\Data\UserDao as UserDao;
use App\Model\Data\CategoryDao;
use App\Model\User as User;

try
{
    $productDao = new ProductDao(DatabaseUtils::connect());
    $categoryDao = new CategoryDao(DatabaseUtils::connect());
    $categories = $categoryDao->findAll();

    switch ($action){


        case 'shop':

            if(isset($_POST['category_id']))
            {
                $category_id = $_POST['category_id'];
            }elseif (isset($_GET['category_id']))
            {
                $category_id = $_GET['category_id'];
            }


            if(isset($category_id))
            {
                $products = $productDao->findByCategoryId($category_id);
                include 'frontend/views/shop.php';
            }else{
                $products = $productDao->findAll();
                include 'frontend/views/shop.php';
            }
            break;
        case 'detail':
            if(isset($_POST['id']))
            {
                $id = $_POST['id'];
            }elseif (isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
            $product = $productDao->findById($id);

            include 'frontend/views/products/product_detail.php';
            break;

        default:

            $featured_products = $productDao->findFeaturedProducts(6);
            $new_products = $productDao->findNewProducts(6);
            include 'frontend/views/home.php';
            break;
    }

}
catch (PDOException $e)
{
    die ( $e->getMessage() );
}
