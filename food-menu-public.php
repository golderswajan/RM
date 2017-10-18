<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/18/2017
 * Time: 1:05 AM
 */
include_once 'layout/header.php';
require_once 'src/database.php';
$breakfast = db_select("select * from foodmenu where type='breakfast'");
$lunch = db_select("select * from foodmenu where type='lunch'");
$snack = db_select("select * from foodmenu where type='snacks'");
$dinner = db_select("select * from foodmenu where type='dinner'");
?>

<style>
    a>h2{
        margin-top: 0px;
        margin-bottom: 0px;
        color:#673AB7;
    }
    a>h4{
        color:#009486;
    }
    a>h5{
        color:#00CC00;
    }
    input[type='checkbox']:hover{
        cursor: pointer;
    }
</style>


<!--            Tab system starts-->
<div class="col-md-12 col-lg-12 col-xs-12">
    <br>
    <ul class="nav nav-tabs nav-justified" style="background-color: #E3E3E3">
        <li class="active">
            <a data-toggle="tab" href="#breakfast">Breakfast</a>
        </li>
        <li>
            <a data-toggle="tab" href="#lunch">Lunch</a>
        </li>
        <li>
            <a data-toggle="tab" href="#snacks">Snacks</a>
        </li>

        <li>
            <a data-toggle="tab" href="#dinner">Dinner</a>
        </li>
    </ul>

    <div class="tab-content">
        <!--Breakfast Start-->
        <div id="breakfast" class="tab-pane fade in active">
            <ul class="list-group">
                <?php foreach ($breakfast as $item){?>
                <li class="list-group-item row">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3"><img src="<?=$item['foodimage']?>" alt="" style="width: 100%;height: 120px" class="img img-responsive col-xs-3 img-thumbnail"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <a href="#" class="col-xs-9" style="text-decoration: none;text-justify: auto">
                                <h2><?= $item['name']?></h2>
                                <h4>Price : <?= $item['price']?> tk</h4>
                                <h5><?= substr($item['ingredients'],0,100)?></h5>
                            </a>
                        </div>
                    </div>
                </li>
                <?php }?>
            </ul>

        </div>
        <!--Breakfast End-->

        <!--Launch Start-->
        <div id="lunch" class="tab-pane fade">
            <ul class="list-group">
                <?php foreach ($breakfast as $item){?>
                    <li class="list-group-item row">
                        <div class="row">
                            <div class="col-lg-3"><img src="<?=$item['foodimage']?>" alt="" style="width: 100%;height: 120px" class="img img-responsive col-xs-3 img-thumbnail"></div>
                            <div class="col-lg-8">
                                <a href="#" class="col-xs-9" style="text-decoration: none">
                                    <h2><?= $item['name']?></h2>
                                    <h4>Price : <?= $item['price']?> tk</h4>
                                    <h5><?= substr($item['ingredients'],0,100)?></h5>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php }?>
            </ul>

        </div>
        <!--Launch End-->

        <!--Snacks Start-->
        <div id="snacks" class="tab-pane fade">
            <ul class="list-group">
                <?php foreach ($breakfast as $item){?>
                    <li class="list-group-item row">
                        <div class="row">
                            <div class="col-lg-3"><img src="<?=$item['foodimage']?>" alt="" style="width: 100%;height: 120px" class="img img-responsive col-xs-3 img-thumbnail"></div>
                            <div class="col-lg-8">
                                <a href="#" class="col-xs-9" style="text-decoration: none">
                                    <h2><?= $item['name']?></h2>
                                    <h4>Price : <?= $item['price']?> tk</h4>
                                    <h5><?= substr($item['ingredients'],0,100)?></h5>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php }?>
            </ul>

        </div>
        <!--Snack End-->

        <!--Dinner Start-->
        <div id="dinner" class="tab-pane fade">
            <ul class="list-group">
                <?php foreach ($breakfast as $item){?>
                    <li class="list-group-item row">
                        <div class="row">
                            <div class="col-lg-3"><img src="<?=$item['foodimage']?>" alt="" style="width: 100%;height: 120px" class="img img-responsive col-xs-3 img-thumbnail"></div>
                            <div class="col-lg-8">
                                <a href="#" class="col-xs-9" style="text-decoration: none">
                                    <h2><?= $item['name']?></h2>
                                    <h4>Price : <?= $item['price']?> tk</h4>
                                    <h5><?= substr($item['ingredients'],0,100)?></h5>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php }?>
            </ul>

        </div>
        <!--Dinner End-->

    </div>
</div>
<!--            Tab system ends-->
<!--<input type="button" class="btn btn-primary" style="margin-left: 40%" value="Enter Into Ordering Process">-->
<?php include_once 'layout/footer.php';?>