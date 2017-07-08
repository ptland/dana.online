
<?php
include 'frontend/common/header.php';
//include 'common/slider.php'
?>

<section id="advertisement">
    <div class="container">
        <img src="frontend/common/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <?php include 'frontend/common/sidebar.php'?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    <?php
                        if (isset($products)):
                            foreach ($products as $row):
                    ?>

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <form class="form-item" action="index.php">
                                    <div class="productinfo text-center">
                                        <?php if (empty($row['image_url'])): ?>
                                            <img src="uploads/<?= $row['image_url'] ?>" alt="" />
                                        <?php else: ?>
                                            <img src="uploads/<?= $row['image_url'] ?>" alt="" />
                                        <?php endif; ?>
                                        <h2>$<?= $row['unit_price'] ?></h2>
                                        <p><a href="?action=detail&id=<?= $row['id'] ?>"><?= $row['name'] ?></a> </p>
                                        <input type="hidden" name="action" value="cart_add">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>

                                </form>

                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php
                            endforeach;
                        endif;
                    ?>

                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<?php include 'frontend/common/footer.php'?>

