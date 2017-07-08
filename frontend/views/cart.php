
<?php
include 'frontend/common/header.php';
//include 'common/slider.php'
?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
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
                        <a href=""><img width="40" src="uploads/<?= $item['image'] ?>" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?= $item['name'] ?></a></h4>
                        <p>Product ID: <?= $item['id'] ?></p>
                    </td>
                    <td class="cart_price">
                        <p>$ <?= $item['price'] ?></p>
                    </td>
                    <td class="cart_quantity">
                        <form action="" method="post">
                            <input class="cart_quantity_input" type="number" name="quantity" value="<?= $item['quantity'] ?>">
                            <input type="hidden" name="action" value="cart_update">
                            <input type="hidden" name="id" value="<?= $item['rowid'] ?>" >
                            <button type="submit">Update</button>
                        </form>

                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">$ <?= $item['subtotal'] ?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="index.php?action=cart_delete&id=<?= $item['rowid'] ?>"
                           onclick="return confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php

                        endforeach;
                    else:
                ?>
                        <tr><td colspan="5"><p>Your cart is empty.....</p></td></tr>
                <?php
                    endif;
                ?>
                </tbody>

            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <?php $totals = $cart->total(); ?>
                        <li>Total <span><?= $totals ?></span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="index.php?action=cart_checkout">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
<?php include 'frontend/common/footer.php'?>

