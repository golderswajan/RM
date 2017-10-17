<?php
include "./layout/header.php";
require_once "./src/database.php";




if(isset($_POST['update']))
{

    $id=$_GET['id'];
    $name=$_POST['name'];
    $ing=$_POST['ing'];
    $price=$_POST['price'];

    $sql="UPDATE foodmenu SET name='$name',ingredients='$ing',price='$price' WHERE id='$id';";
    db_update($sql);
}

if (isset($_POST['add'])) {

    if ($_FILES['image']) {
        $target_dir = "./images/";
        $target_file = $target_dir.basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "done";
        }

    }
    $image_up = $target_file ;

    $name = $_POST['name'];
    $ingredients = $_POST['ing'];
    $price = $_POST['price'];
    $query = "INSERT INTO foodmenu (id,name,foodimage,ingredients,price) VALUES('','$name','$image_up','$ingredients','$price');";
    db_insert($query);
}
$query="select * from foodmenu";
$foods=db_select($query);

if(isset($_GET['delete-id']))
{
    $id=$_GET['delete-id'];
    $sql="Delete from foodmenu WHERE id='$id'";
    db_delete($sql);
    $address = "Location: refresh.php?address=".$_SERVER['PHP_SELF'];
    header($address);
}

?>

<script>
    function deleteRow(id) {

        if(confirm('Are you sure to delete ?'))window.open('./food-menu.php?delete-id=' + id ,'_self');
    }
</script>

<style media="screen">
    .img-responsive {
        width: auto;
        height: 200px;
    }

    .tile {
        height: 350px;
        min-width:250px;
        margin-top:20px;
    }

    .tile > a > div {
        box-shadow: 0 0 5px 1px gray;
        padding:2px;
    }
    .tile > a > div:hover {
        box-shadow: 0 0 5px 3px gray;
    }

    .tile > a:hover{
        text-decoration: none;
    }

    .tile img{
        display: block;
        margin: 0 auto;
    }
</style>



<div class="row">
    <h2>Food Menu </h2>
    <h3><a href="add-food.php" class="btn btn-lg btn-success">Add Food</a></h3>
    <hr>
    <?php foreach ($foods as $food): ?>
        <div class="col-lg-4 col-md-6 col-sm-6 clearfix tile">

            <!--Faculty Member Start-->
            <a href="./food-menu.php?id=<?php echo $food['id'] ?>">
                <div>
                    <div class="">
                        <img src="<?= $food['foodimage'] ?>" class="img-responsive" alt="" style="text-align: center; " />
                    </div>
                    <h2><?= $food['name'] ?> </h2>
                    <p><?= $food['price']?></p>
                    <a role="button" href="edit-food.php?id=<?=$food['id']?>"> Edit</a>
                    <a role="button" href="#" class="delete"
                       onclick="deleteRow('<?= $food['id']?>')">
                        Delete
                    </a>
                </div>
            </a>

        </div>
    <?php endforeach; ?>
</div>
<?php include_once 'layout/footer.php'?>

