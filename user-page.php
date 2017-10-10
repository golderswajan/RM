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
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="background-color:lavender";>
                <h3>Name: <span class="label label-info"><?= $name?></span></h3>
                <h3>Password: <span class="label label-info"><?= $pass?></span></h3>
                <h3>Address: <span class="label label-info"><?= $add?></span></h3>
                <h3>Contact: <span class="label label-info"><?= $contact?></span></h3>
                <br>
                <input type="button" style="margin-bottom: 10px" value="Edit-Info" class="btn btn-success">
            </div>

        </div>
    </div>


<?php include_once 'layout/footer.php'; ?>