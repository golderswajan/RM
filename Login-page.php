<?php

include_once 'layout/header.php';
include_once 'src/database.php';


if (isset($_POST['log'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username.$password;
    $query = "SELECT name,password from customer WHERE name='$username' and password='$password';";

    $result = db_select($query);
    if ($result != null) {

     if (session_status() == PHP_SESSION_NONE) {
         session_start();
        }
       $_SESSION['username'] = $username;
      header('location: index.php');
//        $address = "Location: refresh.php?address=".$_SERVER['PHP_SELF'];
//        header($address);
        //echo "yes";
    } else {
        echo "Error";
    }


}
?>
    <style>
        .box-input {
            background-color: #f1f1f1;
            padding: 0.01em 16px;
            margin: 20px 0;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }
    </style>
    <div class="container" style="background: #f1f1f1;min-height: 55vh">
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
<?php include_once 'layout/footer.php' ?>