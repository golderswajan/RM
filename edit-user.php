<?php include_once 'layout/header.php';
require_once 'src/database.php';

?>

    <style>
        .box-input {
            background-color: #f1f1f1;
            padding: 0.01em 16px;
            margin: 20px 0;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }
    </style>
    <div class="container" style="background: #f1f1f1">
        <div class="panel-body">
            <div class="col-md-6">

                <form class="well-form-horizontal" action="Registration-page.php" method="POST">
                    <div id="legend">
                        <legend class="">Register</legend>
                    </div>
                    <div class="box-input">
                        <label class="control-label" for="username">Username</label>
                        <div class="form-group">
                            <input type="text" id="username" name="username" placeholder=""
                                   class="form-control input-lg" required>
                        </div>
                    </div>

                    <div class="box-input">
                        <label class="control-label" for="password">Password</label>
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder=""
                                   class="form-control input-lg" required>
                        </div>
                    </div>

                    <div class="box-input">
                        <label class="control-label" for="password_confirm">Password (Confirm)</label>
                        <div class="form-group">
                            <input type="password" id="password_confirm" name="password_confirm" placeholder=""
                                   class="form-control input-lg" required onchange="passwordCheck()"><span><p
                                    id="confirmText" style="color: red"></p></span>
                        </div>
                    </div>

                    <div class="box-input">
                        <label class="control-label" for="address">Address</label>
                        <div class=" form-group">
                            <input type="text" id="address" name="address" placeholder="" class="form-control input-lg"
                                   required>
                        </div>
                    </div>

                    <div class="box-input">
                        <label class="control-label" for="contact">Contact</label>
                        <div class=" form-group">
                            <input type="text" id="contact" name="contact" placeholder="" class="form-control input-lg"
                                   required>
                        </div>
                    </div>


                    <div>
                        <!-- Button -->
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="reg">Register</button>
                            <button class="btn btn-primary">Cancel</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php include_once 'layout/footer.php'; ?>