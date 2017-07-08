<?php
$type = 'user';
$type = 'add';
include './common/header.php';

require "../models/User.php"
?>
<!-- Dashboard Wrapper starts -->
<div class="dashboard-wrapper"> 

    <!-- Top Bar starts -->
    <div class="top-bar">
        <div class="page-title"> Insert New User </div>
    </div>
    <!-- Top Bar ends --> 

    <!-- Main Container starts -->
    <div class="main-container"> 

        <!-- Container fluid Starts -->
        <div class="container-fluid"> 

            <!-- Spacer starts -->
            <div class="spacer"> 
                
                <!-- Row Starts -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog">
                            <div class="blog-body">
                                <form id="defaultForm" method="post" action="index.php" class="form-horizontal">
                                    <input type="hidden" name="action" value="user_add_save">
                                    <fieldset>
                                        <legend>Login Information</legend>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">User Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="username" />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="form-group">
                                        <div class="col-lg-6 col-lg-offset-6">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <?php 
                                
                                $user = new com\loabten\model\User();
                                $name = '$user->setName';
                                $name('hello world');
                                
                                echo  $user->getName();
                                
                                ?>
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
include './common/footer.php';
?>