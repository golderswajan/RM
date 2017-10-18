<?php
include_once 'layout/header.php';
include_once 'src/database.php';

?>


    <style>
        .round_btn:hover {
            color: #F2A13E;
        }

        .box-input {
            background-color: #f1f1f1;
            padding: 0.01em 16px;
            margin: 20px 0;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }

        .box-input h3 {
            color: green;
        }



    </style>
    <script>

    </script>

    <form action="food-menu.php" id="form1" method="POST" enctype="multipart/form-data">

        <h1>New Food Entry Form</h1>


        <div class="box-input">
            <!--User Name-->
            <h3>Name*</h3>
            <div class="form-group">
                <textarea class="form-control" style="font-size: large" rows="1" cols="" name="name" id="name"
                          required></textarea>
                <p id="userPara"></p>
            </div>
            <!--Add Image-->
            <h3>Add Image</h3>
            <input type="file" name="image" >

            <!--Ingredients-->
            <h3>Ingredients*</h3>
            <div class="form-group">
                <textarea class="form-control" style="font-size: large" rows="1" cols="" name="ing" id="ing"
                          required></textarea>
                <p id="userPara"></p>
            </div>

            <!--Price-->
            <h3>Price*</h3>
            <div class="form-group">
                <textarea class="form-control" style="font-size: large" rows="1" cols="" name="price" id="price"
                          required></textarea>
                <p id="userPara"></p>
            </div>

        </div>
        <h4>
            <input class="btn btn-success btn-lg" type="submit" id="addFood" name="add" value="Add">
            <input type="button" name="cancel" value="Cancel" class="btn btn-default btn-lg">
        </h4>

    </form>

<?php include_once 'layout/footer.php' ?>