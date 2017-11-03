
<!--   Created by PhpStorm.-->
<!--   User: DreamLess-->
<!--   Date: 10/7/2017-->
<!--   Time: 2:07 AM-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .contact-item{
            color: #F4F4F4;
        }

    </style>
</head>
<body>
<!--navbar-fixed-top on-->
<nav class="navbar navbar-inverse ">
    <div class="container-fluid" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: #00CC00;font-size: 30px;font-family: 'Harlow Solid Italic'">WE HUNGRY</a>
        </div>
        <?php
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        ?>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="food-menu-public.php">Food Menu</a></li>
                <li><a href="#">Chefs</a></li>

                <?php
                    if(isset($_SESSION['type'])&&!strcmp($_SESSION['type'],'admin')){
                    ?>

                    <li><a href="food-menu-admin.php">Food Manage</a></li>
                        <li><a href="order-admin.php">Order Manage</a></li>
                        <li><a href="#">Chef Manage</a></li>

                <?php
                    }else {
                        ?>

                    <li><a href="food-menu-order.php">Order</a></li>
                        <?php if(isset($_SESSION['type'])&&!strcmp($_SESSION['type'],'customer')){?>
                            <li><a href="order-customer.php">Order List</a></li>
                            <?php }?>
                <?php }?>

                <li><a href="#">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if(!isset($_SESSION['username'])){?>
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php }else{?>
                <li><a href="user-page.php"><span class="glyphicon glyphicon-user"></span><span style="color: #00CC00;"><?= $_SESSION['username']?></span></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-bottom: 100px;min-height: 58vh">


