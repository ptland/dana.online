
<?php
include 'frontend/common/header.php';
//include 'common/slider.php'
?>

<section>
    <div class="container">
        <div class="row">
            <?php include 'frontend/common/sidebar.php'?>
            <div class="col-sm-9 padding-right">
                <!-- Featured Item -->
                <?php include 'frontend/views/products/featured_products.php'; ?>
                <?php include 'frontend/views/products/new_products.php'; ?>

            </div>
        </div>
    </div>
</section>
<?php include 'frontend/common/footer.php'?>

