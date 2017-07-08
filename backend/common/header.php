<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from jesus.gallery/everest/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:45:12 GMT -->
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Everest Admin Panel" />
        <meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap" />
        <meta name="author" content="Bootstrap Gallery" />
        <link rel="shortcut icon" href="common/img/favicon.ico">
        <title>Everest Admin Panel</title>

        <!-- Bootstrap CSS -->
        <link href="common/css/bootstrap.css" rel="stylesheet" media="screen">

        <!-- Animate CSS -->
        <link href="common/css/animate.css" rel="stylesheet" media="screen">

        <!-- Alertify CSS -->
        <link href="common/css/alertify/alertify.core.css" rel="stylesheet">
        <link href="common/css/alertify/alertify.default.css" rel="stylesheet">

        <!-- Main CSS -->
        <link href="common/css/main.css" rel="stylesheet" media="screen">

        <!-- Font Awesome -->
        <link href="common/fonts/font-awesome.min.css" rel="stylesheet">

        <link href="common/css/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
        <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                                <script src="common/js/html5shiv.js"></script>
                                <script src="common/js/respond.min.js"></script>
                        <![endif]-->

    </head>

    <body>
        
        
        <!-- Header Start -->
        <header> 

            <!-- Logo starts -->
            <div class="logo"> <a href="#"> <img src="common/img/logo.png" alt="logo"> <span class="menu-toggle hidden-xs"> <i class="fa fa-bars"></i> </span> </a> </div>
            <!-- Logo ends --> 

            <!-- Custom Search Starts -->
            <div class="custom-search pull-left hidden-xs hidden-sm">
                <input type="text" class="search-query" placeholder="Search here">
                <i class="fa fa-search"></i> </div>
            <!-- Custom Search Ends --> 

            <!-- Mini right nav starts -->
            <div class="pull-right">
                <ul id="mini-nav" class="clearfix">

                   <li class="list-box user-profile hidden-xs"> <a href="?action=logout" class="user-avtar animated rubberBand"> <img src="common/img/user4.jpg" alt="user avatar"> </a> </li>
                </ul>
            </div>
            <!-- Mini right nav ends --> 

        </header>
        <!-- Header ends --> 

        <!-- Left sidebar starts -->
        <aside id="sidebar"> 

            <!-- Current User Starts -->
            <div class="current-user">
                <div class="user-avatar animated rubberBand"> <img src="common/img/user4.jpg" alt="Current User"> <span class="busy"></span> </div>
                <div class="user-name">Welcome Mr. James</div>
                <ul class="user-links">
                    <li> <a href="profile.html"> <i class="fa fa-user text-success"></i> </a> </li>
                    <li> <a href="invoice.html"> <i class="fa fa-file-pdf-o text-warning"></i> </a> </li>
                    <li> <a href="components.html"> <i class="fa fa-sliders text-info"></i> </a> </li>
                    <li> <a href="login.html"> <i class="fa fa-sign-out text-danger"></i> </a> </li>
                </ul>
            </div>
            <!-- Current User Ends --> 

            <!-- main menu-->
            <?php include 'common/main_menu.php'; ?>


        </aside>
        <!-- Left sidebar ends --> 