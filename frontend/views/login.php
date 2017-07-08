
<?php
include 'frontend/common/header.php';
//include 'common/slider.php'
?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="" method="post">

                        <input type="hidden" name="action" value="login_check"/>
                        <input type="email" name="email" placeholder="Email Address" />
                        <input type="password" name="password" placeholder="******">
                        <span>
                            <input type="checkbox" class="checkbox">
								Keep me signed in
                        </span>
                        <input type="submit" class="btn btn-default" style="background-color: #FE980F; color: #FFF;" value="Login"/>
                    </form>
                    <?php if (!empty($msg)): ?>
                        <div class="panel">
                            <div class="panel-body">
                                <div class="alert alert-danger alert-transparent no-margin">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?= $msg ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <?php
                    if ( isset($insertUser) ):

                ?>
                  <div class="">
                      <h2>You signup succesfully! Please login for shopping!</h2>
                  </div>
                <?php else: ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="" method="post">
                        <input type="hidden" name="action" value="signup_check"/>
                        <input type="text" name="name" placeholder="Name"/>
                        <input type="email" name="email" placeholder="Email Address"/>
                        <input type="password" name="password" placeholder="Password"/>
                        <input type="text" name="phone" placeholder="Phone"/>
                        <input type="text" name="address" placeholder="Address"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><!--/form-->

<?php include 'frontend/common/footer.php'?>

