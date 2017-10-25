<?php
include_once 'layout/header.php';
require_once 'src/database.php';
$name=$_SESSION['username'];
$query="SELECT id from customer WHERE name='$name';";
$result=db_select($query);
$customer_id=$result[0]['id'];

if(isset($_POST['post']))
{
    $comment=$_POST['comment'];
    $query="INSERT INTO `feedback` (`id`, `comment`, `customerid`) VALUES ('', '$comment', '$customer_id');";

    db_insert($query);
    $address = "Location: refresh.php?address=".$_SERVER['PHP_SELF'];
    header($address.'?food-id='."2");

}
$id=$_GET['food-id'];
$query="select name,ingredients,price,foodimage from foodmenu WHERE id='$id'";
$foods=db_select($query);
$query="SELECT name,comment from customer,feedback WHERE feedback.customerid=customer.id;";
$output=db_select($query);


if(session_status()==PHP_SESSION_NONE){
    session_start();
}



?>

<style>


    img {
        display: block;
        margin: auto;
        width: 40%;
    }
    body
    {
        text-align:center;
        font-family:helvetica;
        background-color:#A9D0F5;
    }
    h1
    {
        color:blue;
        text-align:center;
        margin-top:10px;
    }
    textarea
    {
        width:500px;
        height:100px;
        border:1px solid silver;
        border-radius:5px;
        font-size:17px;
        padding:10px;
        font-family:helvetica;
    }
    .comment_div
    {
        width:500px;
        background-color:white;
        margin-top:10px;
        text-align:left;
    }
    .comment_div .name
    {
        font-style:italic;
        padding:10px;
        background-color:grey;
        color:white;
        text-align:left;
    }
    .comment_div .comment
    {
        padding:10px;

    }
    .comment_div .time
    {
        font-style:italic;
        padding:10px;
        background-color:grey;
        color:white;
        text-align:left;
    }

</style>
<div class="">

    <form action="food-review.php?food-id=2" id="form1" method="POST"   enctype="multipart/form-data">

        <input type="hidden" name="category" value="update">
       <div class="col-md-offset-1">
           <img src="<?=$foods[0]['foodimage']?>" class="img-responsive" >
           <h1>Ingredients: <?= $foods[0]['ingredients']?></h1>
           <h1>Price: <?= $foods[0]['price']?> Tk</h1>

           <?php foreach ($output as $item):?>
               <div class="col-md-offset-3">
                   <div class="comment_div">
                       <p class="name">Posted By: <?php echo $item['name'];?></p>
                       <p class="comment"><?php echo $item['comment'];?></p>
                       <p class="time"><?php echo  date("Y.m.d")?></p>
                   </div>
               </div>
           <?php endforeach; ?>
       </div>


            <div class="col-md-offset-1">
                <textarea id="comment" name="comment" placeholder="Write Your Comment Here....." required></textarea>
                <br>
                <input type="submit" name="post" value="Post Comment" class="btn btn-success">
            </div>

    </form>
</div>

<?php
include_once 'layout/footer.php';
?>
