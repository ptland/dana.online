<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php


                if (isset($categories)):
                    foreach ($categories as $row):
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="?action=shop&category_id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h4>
                </div>
            </div>
            <?php
                endforeach;
            endif;

            ?>
        </div><!--/category-products-->




        <div class="shipping text-center"><!--shipping-->
            <img src="frontend/common/images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>