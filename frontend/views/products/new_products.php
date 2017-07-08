<div class="features_items"><!-- new_items-->
    <h2 class="title text-center">New Items</h2>
    <?php 
    if (isset($new_products)):
        foreach ($new_products as $row):    
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
                        <p><a href="?action=detail&id=<?= $row['id'] ?>"><?= $row['name'] ?></a></p>
                        <input type="hidden" name="action" value="cart_add">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </div>
                    <?php if ($row['status']=='New'): ?>
                        <img src="frontend/common/images/home/new.png" class="new" alt="">
                    <?php elseif ($row['status']=='Sale'): ?>
                        <img src="frontend/common/images/home/sale.png" class="new" alt="">
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <?php
        endforeach;
    endif;
    ?>
</div><!--new_items-->