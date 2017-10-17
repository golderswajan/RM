<?php
include_once 'layout/header.php';
require_once 'src/database.php';

$id=$_GET['id'];
$query="select name,ingredients,price from foodmenu WHERE id='$id'";
$foods=db_select($query);

//$name=$foods['name'];

?>

<style>

    .btn {
        border-radius: 20px;
        border: 2px solid;
        padding: 5px;
        background-color: #80000f;
        width: 10%;
        height: 5%;
        color: #e7e7e7;
    }
</style>
<div class="container">

    <form action="food-menu.php?id=<?=$id ?>" id="form1" method="POST" enctype="multipart/form-data">

        <h1>Update Food Item</h1>
        <input type="hidden" name="category" value="update">

        <!--Name-->
        <div class="form-group col-md-9">
            <label for="inputsm">Name* </label>

            <input   class="post-input form-control" type="text"  name="name"  required
                     value="<?php echo ucfirst($foods[0]['name']); ?>"
            />
        </div>


        <!--Ingredients-->
        <div class="form-group col-md-9">
            <label for="idDet" >Detail*</label>
            <textarea class=" post-input-text form-control " name="ing" title="ingredients" required
            ><?= ucfirst($foods[0]['ingredients']) ?></textarea>
        </div>

        <!--Price-->
        <div class="form-group col-md-9">
            <label for="inputsm">Price* </label>

            <input   class="post-input form-control" type="text"  name="price"  required
                     value="<?php echo ucfirst($foods[0]['price']); ?>"
            />
        </div>

        <!--Image Upload-->

        <div class=" form-group col-md-9">
            <label>Image*</label><br>
            <input  type="file" class=" imgid" name="image" id="image">

        </div>


        <div class="col-md-9"> <h4>
                <input class="btn" type="submit" name="update" value="Update">
                <input type="reset" name="cancel" value="Cancel" class="btn">
            </h4></div>
</div>
</form>
<?php
include_once 'layout/footer.php';
?>
