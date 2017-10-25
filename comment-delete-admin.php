<?php
include_once 'layout/header.php';
include_once 'src/database.php';

?>
<style>
    .table thead {
        background-color: rgb(140, 0, 45);
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
        <br>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Creation</th>
                <th>Last Edition</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            </tbody>

        </table>

    </div>
<?php include_once 'layout/footer.php'?>