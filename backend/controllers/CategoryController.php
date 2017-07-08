<?php
use App\Model\Data\DatabaseUtils;
use App\Model\Category as Category;
use App\Model\Data\CategoryDao as CategoryDao;

try {
    $categoryDao = new CategoryDao(DatabaseUtils::connect());
    if ($action == 'add') {
        include './views/categories/add.php';
    } elseif ($action == 'add_save') {
        $name = $_POST['name'];
        $category = new Category();
        $category->setName($name);
        
        $result = $categoryDao->insert($category);

        $msg = "$result category has been inserted";
        include './views/categories/add.php';
    } elseif ($action == 'delete') {
        $category_id = $_GET['category_id'];
        $result = $categoryDao->delete($category_id);

        header("Location: index.php");
    } elseif ($action == 'edit') {
        $id = $_GET['id'];
        $row = $categoryDao->findById($id);

        include './views/categories/edit.php';
    } elseif ($action == 'edit_save') {
        $id = $_POST['id'];
        $name = $_POST['name'];

        $category = new Category();
        $category->setCategory_id($id);
        $category->setName($name);

        $categoryDao->update($category);
        $msg = 'The category has been updated!';
        $result = $categoryDao->findAll();
        include './views/categories/list.php';
        //header("Location: index.php");
    } elseif ($action == 'find') {
        $result = NULL;
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $result = $categoryDao->findByName($name);
            if (empty($result)) {
                $msg = "There aren't any categories";
            }
        } else {
            $result = $categoryDao->findAll();
        }
        include './views/categories/find.php';
    } else { //(action == 'list')
        $result = $categoryDao->findAll();
        include './views/categories/list.php';
    }
} catch (Exception $exc) {
    $error = $exc->getMessage();
}