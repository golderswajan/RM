<?php
include_once 'layout/header.php';
include_once 'src/database.php';
if(isset($_POST['update']))
{

    $id=$_GET['id'];
    if ($_FILES['image']) {
        $target_dir = "./images/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "done";
        }

    }
    $image_up = $target_file;
    $name=$_POST['name'];
    $qualification=$_POST['qualification'];
    $sql="UPDATE chef SET name='$name',image='$image_up',qualification='$qualification' WHERE id='$id';";
    db_update($sql);
}


if (isset($_POST['add'])) {
    if ($_FILES['image']) {
        $target_dir = "./images/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "done";
        }

    }
    $image_up = $target_file;

    $query = "INSERT INTO chef VALUES ('','$_POST[name]','$image_up','$_POST[qualification]')";

    db_insert($query);
}
$sql = "SELECT * FROM chef ;";
$res = db_select($sql);

if(isset($_GET['delete-id']))
{
    $id=$_GET['delete-id'];
    $sql="Delete from chef WHERE id='$id'";
    db_delete($sql);
    $address = "Location: refresh.php?address=".$_SERVER['PHP_SELF'];
    header($address);
}

?>
    <script>
        function deleteRow(id) {

            if(confirm('Are you sure to delete ?'))window.open('./chef-show.php?delete-id=' + id ,'_self');
        }
    </script>

    <style>
        .table thead {
            background-color: #3341FF;
            color: #fff;
        }

        .table > thead > tr > th {
            padding: 15px 0;
            text-align: center;
        }

        .table > thead > tr > th:first-child {
            border-top-left-radius: 10px;
        }

        .table > thead > tr > th:last-child {
            border-top-right-radius: 10px;
        }
    </style>

    <div class="table-responsive container row" style="margin-left: -30px;">
        <br>
        <a href="addChef.php" class="btn btn-lg btn-success">New Chef</a>
        <br>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>name</th>
                <th>qualification</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($res as $item): ?>
                <tr>

                    <td style="text-align: center">
                        <a class="edit" href="chef-profile.php?id=<?=$item['id']?>">
                            <?= $item['name'] ?>
                        </a></td>
                    <td style="text-align:center; color: #2e6da4"><?= $item['qualification'] ?></td>

                    <td style="text-align: center">
                        <a class="edit" href="chef-edit.php?id=<?=$item['id']?>">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="#"  class="delete" onclick="deleteRow('<?= $item['id']?>')" >
                            Delete
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>

        </table>

    </div>

<?php include_once 'layout/footer.php' ?>