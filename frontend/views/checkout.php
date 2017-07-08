
<?php
include 'frontend/common/header.php';
//include 'common/slider.php'
?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-6">
                    <?php
                    if (isset($custRow)):
                        ?>

                        <h4>Shopper Information</h4>
                        <p>Name: <?= $custRow['name']; ?></p>
                        <p>Email: <?= $custRow['email']; ?></p>
                        <p>Phone: <?= $custRow['phone']; ?></p>
                        <p>Address: <?= $custRow['address']; ?></p>

                    <?php endif; ?>
                    <a href="index.php?action=cart_order">Order Now</a>
                </div>

               

            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php
                if ( $cart->total_items() >0 ):
                    $cartItems = $cart->contents();

                    foreach ( $cartItems as $item ):

                ?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="uploads/<?= $item['image'] ?>" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?= $item['name'] ?></a></h4>
                        <p><?= $item['id'] ?></p>
                    </td>
                    <td class="cart_price">
                        <p>$ <?= $item['price'] ?></p>
                    </td>
                    <td class="cart_quantity">
                        <p><?= $item['quantity'] ?></p>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">$ <?= $item['subtotal'] ?></p>
                    </td>
                </tr>
                <?php
                    endforeach;
                    endif;
                ?>

                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Cart Sub Total</td>
                                <td><?php echo $cart->total(); ?></td>
                            </tr>
                            <tr class="shipping-cost">
                                <td>Shipping Cost</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><span><?php echo $cart->total(); ?></span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</section> <!--/#cart_items-->
<?php include 'frontend/common/footer.php'?>

