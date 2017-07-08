<?php
require_once 'common/header.php';
?>
<!-- Dashboard Wrapper starts -->
<div class="dashboard-wrapper"> 

    <!-- Top Bar starts -->
    <div class="top-bar">
        <div class="page-title"> Insert New Product</div>
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
                                    <input type="hidden" name="action" value="product_add_save">
                                    <input type="hidden" name="controller" value="UserController">
                                    <input type="hidden" name="type" value="BackEnd">
                                    <fieldset>
                                        <legend>Product Information</legend>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="name" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Vendor</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="vendor" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Category</label>
                                            <div class="col-lg-9">
                                                <select name="category_id" class="form-control">
                                                    <?php 
                                                    foreach ($categories as $crow):                                                        
                                                    ?>
                                                    <option value="<?= $crow['id']?>">
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
                                                <input type="text" class="form-control" name="quantity" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Unit Price</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="unit_price" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Is Featured</label>
                                            <div class="col-lg-9">
                                                <input type="checkbox" class="checkbox-inline" name="is_featured" value="1"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Image</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control" name="fileToUpload"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Description</label>
                                            <div class="col-lg-9">
                                                <textarea name="description" class="form-control" rows="5"></textarea>
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