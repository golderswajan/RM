<?php

include_once 'layout/header.php';
include_once 'src/database.php';


if(isset($_POST['log']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT name,password FROM customer WHERE name='$username' and password='$password';";
    $result = db_select($query);
    if($result!=null)
    {
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION['username']=$username;
        header('location: index.php');
//        $address = "Location: refresh.php?address=".$_SERVER['PHP_SELF'];
//        header($address);
        //echo "yes";
    }
    else
    {
        echo "Error";
    }



}
?>
<div class="container" style="background: #D3D3D3">
    <div class="panel-body">
        <div class="col-md-6">

            <form class="well-form-horizontal" action="Login-page.php" method="POST">
                <div id="legend">
                    <legend class="">Login</legend>
                </div>
                <div class="box-input">
                    <label class="control-label" for="username">Username</label>
                    <div class="form-group">
                        <input type="text" id="username" name="username" placeholder=""
                               class="form-control input-lg">
                    </div>
                </div>

                <div class="box-input">
                    <label class="control-label" for="password">Password</label>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder=""
                               class="form-control input-lg">
                    </div>
                </div>



                <div>
                    <!-- Button -->
                    <div class="form-group">
                        <button class="btn btn-primary" name="log">Login</button>
                        <button class="btn btn-primary">Cancel</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<?php include_once 'layout/footer.php'?>