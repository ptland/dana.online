
<?php
include 'frontend/common/header.php';
//include 'common/slider.php'
?>

<section>
    <div class="container">
        <div class="row">
            <?php include 'frontend/common/sidebar.php'?>
            <div class="col-sm-9 padding-right">
                <?php
                    if ( isset($product) ):
                ?>
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="uploads/<?= $product['image_url'] ?>" alt="" />
                            <h3><?= $product['name'] ?></h3>
                        </div>


                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <form action="index.php" method="post">
                                <?php if ($product['status']=='New'): ?>
                                    <img src="frontend/common/images/home/new.png" class="new" alt="">
                                <?php elseif ($product['status']=='Sale'): ?>
                                    <img src="frontend/common/images/home/sale.png" class="new" alt="">
                                <?php endif; ?>
                                <h2><?= $product['name'] ?></h2>
                                <p>Product ID: <?= $product['id'] ?></p>
                                <img src="frontend/common/images/product-details/rating.png" alt="" />
                                <span>
                                        <span>US $ <?= $product['unit_price'] ?></span>
                                        <label>Quantity:</label>
                                        <input type="text" name="quantity" value="3" />
                                        <input type="hidden" name="action" value="cart_add">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </span>
                                <p><b>Availability:</b> <?= $product['status'] ?></p>
                                <p><b>Condition:</b> <?= $product['status'] ?></p>
                                <p><b>Brand:</b> <?= $product['vendor'] ?></p>

                            </form>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                <?php endif; ?>

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >

                        </div>

                    </div>
                </div><!--/category-tab-->



            </div>
        </div>
    </div>
</section>
<?php include 'frontend/common/footer.php'?>

