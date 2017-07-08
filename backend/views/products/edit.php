<?php
require_once 'common/header.php';
?>
<!-- Dashboard Wrapper starts -->
<div class="dashboard-wrapper"> 

    <!-- Top Bar starts -->
    <div class="top-bar">
        <div class="page-title"> Edit Product</div>
    </div>
    <!-- Top Bar ends --> 

    <!-- Main Container starts -->
    <div class="main-container"> 

        <!-- Container fluid Starts -->
        <div class="container-fluid"> 

            <!-- Spacer starts -->
            <div class="spacer"> 
                <?php include 'common/message_panel.php'; ?>
                <?php include 'common/error_panel.php'; ?>
                <!-- Row Starts -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog">
                            <div class="blog-body">
                                <form id="defaultForm" method="post" action="index.php" 
                                      class="form-horizontal"  enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="product_edit_save">
                                    
                                    <input type="hidden" name="id" value="<?= $row['id']?>">
                                    <fieldset>
                                        <legend>Product Information</legend>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" 
                                                       name="name" value="<?= $row['name']?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Vendor</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="vendor"
                                                        value="<?= $row['vendor']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Category</label>
                                            <div class="col-lg-9">
                                                <select name="category_id" class="form-control">
                                                    <?php 
                                                    foreach ($categories as $crow):                                                        
                                                    ?>
                                                    <option value="<?= $crow['id']?>"
                                                            <?= $row['category_id'] == $crow['id']?'selected':''?>>
                                                        <?= $crow['name']?>
                                                    </option>
                                                    <?php 
                                                    endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Quantity</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="quantity" 
                                                        value="<?= $row['quantity']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Unit Price</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="unit_price" 
                                                        value="<?= $row['unit_price']?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Image</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="fileToUpload"/>
                                            </div>

                                            <?php if (!empty($row['image_url'])): ?>
                                                <input type="hidden" name="old_image" value="<?= $row['image_url'] ?>"/>
                                                <div class="col-lg-12">
                                                    <img src="../uploads/<?= $row['image_url'] ?>" width="50" height="50">
                                                </div>
                                            <?php else: ?> 
                                                &nbsp;
                                            <?php endif ?>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Status</label>
                                            <div class="col-lg-9">
                                                <select name="status" class="form-control">
                                                    <option value="New" <?= $row['status'] == 'New'?'selected':''?>>New</option>
                                                    <option value="Out" <?= $row['status'] == 'Out'?'selected':''?>>Out of Stock</option>
                                                    <option value="OutOrder" <?= $row['status'] == 'OutOrder'?'selected':''?>>Out of Order</option>
                                                    <option value="Delete" <?= $row['status'] == 'Delete'?'selected':''?>>Deleted</option>
                                                    <option value="Sale" <?= $row['status'] == 'Sale'?'selected':''?>>Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description</label>
                                            <div class="col-lg-9">
                                                <textarea name="description" class="form-control" rows="5"> <?=empty($row['description']) ?$row['description']:''?></textarea>
                                            </div>
                                        </div>
                                    </fieldset>


                                    <div class="form-group">
                                        <div class="col-lg-6 col-lg-offset-6">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row Ends --> 

        </div>
        <!-- Spacer ends --> 

    </div>
    <!-- Container fluid ends -->

</div>
<!-- Main Container ends --> 


<!-- Footer starts -->
<footer> Copyright Everest Admin Panel 2014. </footer>
<!-- Footer ends --> 
<!-- Footer ends -->

</div>
<!-- Dashboard Wrapper ends --> 

<?php
require_once 'common/footer.php';
?>