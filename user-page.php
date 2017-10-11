<?php include_once 'layout/header.php';
require_once 'src/database.php';
$name=$_SESSION['username'];
$query="select id,password,address,contact from customer WHERE  name='$name'";
$result=db_select($query);
$id=$result[0]['id'];
$add=$result[0]['address'];
$pass=$result[0]['password'];
$add=$result[0]['address'];
$contact=$result[0]['contact'];
?>
    <style>
        .box-input {
            background-color: #f1f1f1;
            padding: 0.01em 16px;
            margin: 20px 0;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }
    </style>
<br>
<div>
    <ul class="nav nav-tabs nav-justified">
        <li class="active">
            <a data-toggle="tab" href="#info">My Info</a>
        </li>
        <li>
            <a data-toggle="tab" href="#edit">Edit Info</a>
        </li>
    </ul>
    <div class="tab-content">
        <br>
        <br>
        <div class="tab-pane fade in active" id="info" >
            <ul class="list-group">
                <div class="container">
                    <div class="col-md-12" style="background-color:lavender";>
                        <h3>Name: <span class="label label-info"><?= $name?></span></h3>
                        <h3>Password: <span class="label label-info"><?= $pass?></span></h3>
                        <h3>Address: <span class="label label-info"><?= $add?></span></h3>
                        <h3>Contact: <span class="label label-info"><?= $contact?></span></h3>
                    </div>
                </div>
            </ul>

        </div>

            <div class="tab-pane fade" id="edit">
                <ul class="list-group">
                    <div class="container" style="background: #f1f1f1">
                        <div class="panel-body">
                            <div class="col-md-8">

                                <form class="well-form-horizontal" action="user-page.php" method="POST">
                                    <div id="legend">
                                        <legend class="">Edit Info</legend>
                                    </div>
                                    <div class="box-input">
                                        <label class="control-label" for="username">Name</label>
                                        <div class="form-group">
                                            <input type="text" id="username" name="username"
                                                   class="form-control input-lg" value="<?=$name?>" >
                                        </div>
                                    </div>

                                    <div class="box-input">
                                        <label class="control-label" for="password">Password</label>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" placeholder=""
                                                   class="form-control input-lg" value="<?=$pass?>">
                                        </div>
                                    </div>

                                    <div class="box-input">
                                        <label class="control-label" >Address</label>
                                        <div class="form-group">
                                            <input type="text" id="address" name="address"
                                                   class="form-control input-lg" value="<?=$add?>">
                                        </div>
                                    </div>
                                    <div class="box-input">
                                        <label class="control-label">Contact</label>
                                        <div class="form-group">
                                            <input type="text" id="contact" name="contact"
                                                   class="form-control input-lg" value="<?=$contact?>">
                                        </div>
                                    </div>

                                    <div>
                                        <!-- Button -->
                                        <div class="form-group">
                                            <button class="btn btn-primary" name="log">Update</button>
                                            <button class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </ul>

            </div>

    </div>
</div>



<?php include_once 'layout/footer.php'; ?>