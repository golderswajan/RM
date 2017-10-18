<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/18/2017
 * Time: 2:48 AM
 */
require_once 'security/redirectToLogin-notLogin.php';
include_once 'layout/header.php';
require_once 'src/database.php';
$breakfast = db_select("select * from foodmenu where type='breakfast'");
$lunch = db_select("select * from foodmenu where type='lunch'");
$snack = db_select("select * from foodmenu where type='snacks'");
$dinner = db_select("select * from foodmenu where type='dinner'");
$counter = 1;
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
        .box-input {
            background-color: #f1f1f1;
            padding: 0.01em 16px;
            margin: 20px 0;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }

        .box-input h2 {
            color: green;
        }
        .order h3,h4{
            margin-top: 0px;
            color:#673AB7;
        }
        .order p{
            color:#9C27B0;
            font-weight: bold;
        }
        .order>div>a:hover{
            cursor: pointer;
        }
    </style>
<script>
    var counter = 1;
    function checkToadd(cBox,divId){
        var orderDiv = $('#order');
        var divHtml = "";
        if(cBox.checked){
            var primaryKey = $('#primaryKey'+divId).val();
            //console.log(orderDiv.text());
            if(counter==1) orderDiv.html(getHeaderHtml());
            $.post('jquery-process.php',{foodMenuPrimaryKey:primaryKey},function(data){
                    var hiddenRowNumberDiv = $('#rowNumber');
                    var totalCostDiv = $('#totalCostDiv');
                    hiddenRowNumberDiv.remove();
                    totalCostDiv.remove();

                    var item = JSON.parse(data);
                    item = item[0];
                    orderDiv.append(getRowHtml(counter,primaryKey,divId,item.name,item.price));
                    counter++;
                    orderDiv.append(getHiddenRowNumberHtml(counter));
                    orderDiv.append(getTotalCostHtml());
                    calCulateTotalCost();

            });
        }else{
            deleteAccordingToField(divId);
        }

        //console.log(orderDiv);
    }
    function deleteField(divId){
        var orderDiv = $('#order');
        var div = $('#div'+divId);
        var parentRowNo = $('#parentRowNo'+divId).val();
        //console.log(parentRowNo);
        var parentCheckBox = $('#checkBox'+parentRowNo);
        parentCheckBox.prop('checked',false);
        //console.log(divId+" "+counter);
        var hiddenRowNumber = $('#rowNumber');
        var totalCostDiv = $('#totalCostDiv');
        if(divId==counter-1){
            //console.log(divId+" "+counter);
            hiddenRowNumber.remove();
            totalCostDiv.remove();
            div.remove();
            counter--;
            orderDiv.append(getHiddenRowNumberHtml(counter));
            orderDiv.append(getTotalCostHtml());
            calCulateTotalCost();
        }else{

            var tempCounter = 1;
            var orderHtml = getHeaderHtml();
            var name = "";
            var price = "";
            var quantity = "";
            var primaryKey = "";
            var parentRowNo = "";
            //console.log(book+author+publisher);
            for(var i=1;i<counter;i++){
                if(divId!=i){
                    name = $('#name'+i).val();
                    price = $('#price'+i).val();
                    quantity = $('#amount'+i).val();
                    primaryKey =  $('#orderFoodPrimaryKey'+i).val();
                    parentRowNo = $('#parentRowNo'+i).val();
                    orderHtml += getRowHtml(tempCounter,primaryKey,parentRowNo,name,price,quantity);
                    tempCounter++;
                }
            }
            counter = tempCounter;
            orderDiv.html(orderHtml);
            orderDiv.append(getHiddenRowNumberHtml(counter));
            orderDiv.append(getTotalCostHtml());
            calCulateTotalCost();
        }
        if(counter==1){
//            var referenceBtn = $('#referenceBtn');
//            var referenceDiv = $('#reference');
//            referenceBtn.text("Add Reference Books");
            orderDiv.html("");
        }
    }
    function deleteAccordingToField(divId){
        var parentDivId = "";
        for(var i=1;i<counter;i++){
            parentDivId = $('#parentRowNo'+i).val();
            if(parentDivId==divId){
                //console.log(i);
                deleteField(i);
                break;
            }
        }
    }

    function getHeaderHtml(){
        var headerHtml = " <div class=\"row\">\n" +
            "                    <div class=\"col-lg-1 col-md-1 col-sm-1 form-group\"><h2>No.</h2></div>\n" +
            "                    <div class=\"col-lg-4 col-md-4 col-sm-4 form-group\"><h2>Food Name</h2></div>\n" +
            "                    <div class=\"col-lg-3 col-md-3 col-sm-3 form-group\"><h2>Price/Unit</h2></div>\n" +
            "                    <div class=\"col-lg-2 col-md-2 col-sm-2 form-group\"><h2>Quantity</h2></div>\n" +
            "                    <div class=\"col-lg-1 col-md-1 col-sm-1 form-group\"><h2>Cost</h2></div>\n" +
            "                    <div class=\"col-lg-1 col-md-1 col-sm-1 form-group\"></div>\n" +
            "                </div>";
        return headerHtml;

    }
    function getRowHtml(index,primaryKeyValue,parentRowNo,foodName,price,quantity=1){
        var rowHtml ="<div class=\"row order\" id=\"div"+index+"\">\n" +
            "                    <div class=\"col-lg-1 col-md-1 col-sm-1 form-group\"><p>"+index+"</p><input type=\"text\" id=\"orderFoodPrimaryKey"+index+"\" value=\""+primaryKeyValue+"\" placeholder='primary key' hidden><input type=\"text\" id=\"parentRowNo"+index+"\" value=\""+parentRowNo+"\" placeholder='parent row number' hidden></div>\n" +
            "                    <div class=\"col-lg-4 col-md-4 col-sm-4 form-group\"><h3 >"+foodName+"</h3><input id=\"name"+index+"\" value=\""+foodName+"\" hidden></div>\n" +
            "                    <div class=\"col-lg-3 col-md-3 col-sm-3 form-group\"><h4>"+price+" tk</h4><input id=\"price"+index+"\" value=\""+price+"\" hidden></div>\n" +
            "                    <div class=\"col-lg-2 col-md-2 col-sm-2 form-group\"><input type=\"number\" class=\"form-control\" style=\"font-size: small;width:70%\" min=\"1\" id=\"amount"+index+"\" value=\""+quantity+"\" onkeyup=\"measureCost('"+index+"')\" required></div>\n" +
            "                    <div class=\"col-lg-1 col-md-1 col-sm-1 form-group\"><h4 id=\"costId"+index+"\">"+price*quantity+" tk</h4><input id=\"cost"+index+"\" value=\""+price*quantity+"tk\"  hidden></div>\n" +
            "                    <div class=\"col-lg-1 col-md-1 col-sm-1 form-group\"><a onclick=\"deleteField('"+index+"')\"><span class=\"glyphicon glyphicon-remove\"></span></a></div>\n" +
            "                </div>";
        return rowHtml;
    }
    function getHiddenRowNumberHtml(index){
        var hiddenRowNumberHtml = "<input type=\"text\" id=\"rowNumber\" name=\"rowNumber\" value=\""+index+"\" hidden>";
        return hiddenRowNumberHtml;
    }
    function getTotalCostHtml(){
        var totalCostHtml = "<div class=\"row\" id=\"totalCostDiv\">\n" +
            "            <div class=\"col-md-8 col-lg-8 col-sm-8\"></div>\n" +
            "            <div class=\"col-md-2 col-lg-2 col-sm-2\"><h4>Total Cost : </h4></div>\n" +
            "            <div class=\"col-md-2 col-lg-2 col-sm-2\"><h4 id=\"totalCost\">800 tk </h4></div>\n" +
            "        </div>";
        return totalCostHtml;
    }

    function calCulateTotalCost(){
        var cost = 0;
        var amount = "";
        var price = "";
        for(var i=1;i<counter;i++){
            price = $('#price'+i).val();
            amount = $('#amount'+i).val();
            cost += price*amount;

        }
        $('#totalCost').html(cost+" tk");
    }
    function measureCost(divId){
        //console.log("abnbv");
        var costId = $('#costId'+divId);
        var price = $('#price'+divId).val();
        var amount = $('#amount'+divId).val();
        costId.html(price*amount+" tk");
        calCulateTotalCost();
    }

</script>


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
                                    <input type="text" id="primaryKey<?= $counter?>" value="<?= $item['id']?>" placeholder="primary key" hidden>
                                    <a href="#" class="col-xs-9" style="text-decoration: none;text-justify: auto">
                                        <h2><?= $item['name']?></h2>
                                        <h4>Price : <?= $item['price']?> tk</h4>
                                        <h5><?= substr($item['ingredients'],0,100)?></h5>
                                    </a>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                    <input type="checkbox" style="" id="checkBox<?= $counter?>" onchange="checkToadd(this,'<?= $counter?>')">
                                </div>
                            </div>
                        </li>
                    <?php
                    $counter++;
                    }?>
                </ul>

            </div>
            <!--Breakfast End-->

            <!--Launch Start-->
            <div id="lunch" class="tab-pane fade">
                <ul class="list-group">
                    <?php foreach ($lunch as $item){?>
                        <li class="list-group-item row">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3"><img src="<?=$item['foodimage']?>" alt="" style="width: 100%;height: 120px" class="img img-responsive col-xs-3 img-thumbnail"></div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <input type="text" id="primaryKey<?= $counter?>" value="<?= $item['id']?>" placeholder="primary key" hidden>
                                    <a href="#" class="col-xs-9" style="text-decoration: none;text-justify: auto">
                                        <h2><?= $item['name']?></h2>
                                        <h4>Price : <?= $item['price']?> tk</h4>
                                        <h5><?= substr($item['ingredients'],0,100)?></h5>
                                    </a>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                    <input type="checkbox" style="" id="checkBox<?= $counter?>" onchange="checkToadd(this,'<?= $counter?>')">
                                </div>
                            </div>
                        </li>
                        <?php
                        $counter++;
                    }?>
                </ul>

            </div>
            <!--Launch End-->

            <!--Snacks Start-->
            <div id="snacks" class="tab-pane fade">
                <ul class="list-group">
                    <?php foreach ($snack as $item){?>
                        <li class="list-group-item row">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3"><img src="<?=$item['foodimage']?>" alt="" style="width: 100%;height: 120px" class="img img-responsive col-xs-3 img-thumbnail"></div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <input type="text" id="primaryKey<?= $counter?>" value="<?= $item['id']?>" placeholder="primary key" hidden>
                                    <a href="#" class="col-xs-9" style="text-decoration: none;text-justify: auto">
                                        <h2><?= $item['name']?></h2>
                                        <h4>Price : <?= $item['price']?> tk</h4>
                                        <h5><?= substr($item['ingredients'],0,100)?></h5>
                                    </a>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                    <input type="checkbox" style="" id="checkBox<?= $counter?>" onchange="checkToadd(this,'<?= $counter?>')">
                                </div>
                            </div>
                        </li>
                        <?php
                        $counter++;
                    }?>
                </ul>

            </div>
            <!--Snack End-->

            <!--Dinner Start-->
            <div id="dinner" class="tab-pane fade">
                <ul class="list-group">
                    <?php foreach ($dinner as $item){?>
                        <li class="list-group-item row">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3"><img src="<?=$item['foodimage']?>" alt="" style="width: 100%;height: 120px" class="img img-responsive col-xs-3 img-thumbnail"></div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <input type="text" id="primaryKey<?= $counter?>" value="<?= $item['id']?>" placeholder="primary key" hidden>
                                    <a href="#" class="col-xs-9" style="text-decoration: none;text-justify: auto">
                                        <h2><?= $item['name']?></h2>
                                        <h4>Price : <?= $item['price']?> tk</h4>
                                        <h5><?= substr($item['ingredients'],0,100)?></h5>
                                    </a>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                    <input type="checkbox" style="" id="checkBox<?= $counter?>" onchange="checkToadd(this,'<?= $counter?>')">
                                </div>
                            </div>
                        </li>
                        <?php
                        $counter++;
                    }?>
                </ul>

            </div>
            <!--Dinner End-->

        </div>
    </div>
    <!--            Tab system ends-->
    <br>
    <br>

<input type="button" class="btn" >

    <div class="box-input" id="order">
        <!--        Demo starts-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><h2>No.</h2></div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 form-group"><h2>Food Name</h2></div>-->
<!--                    <div class="col-lg-2 col-md-2 col-sm-2 form-group"><h2>Price/Unit</h2></div>-->
<!--                    <div class="col-lg-3 col-md-3 col-sm-3 form-group"><h2>Quantity</h2></div>-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><h2>Cost</h2></div>-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"></div>-->
<!--                </div>-->
<!--                <div class="row order" id="div1">-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><p>1</p><input type="text" id="orderFoodPrimaryKey1" value="1"><input type="text" id="parentRowNo1" value="1"></div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 form-group"><h3>Hello</h3><input id="name1" value="Hello"></div>-->
<!--                    <div class="col-lg-2 col-md-2 col-sm-2 form-group"><h4>32 tk</h4><input id="price1" value="32"></div>-->
<!--                    <div class="col-lg-3 col-md-3 col-sm-3 form-group"><input type="number" class="form-control" style="font-size: small" min="1" required></div>-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><h4 id="costId1">32 tk</h4><input id="cost1" value="32" onkeyup="measureCost('1')"></div>-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><a onclick="deleteField('1')"><span class="glyphicon glyphicon-remove"></span></a></div>-->
<!--                </div>-->
<!--                <div class="row order" id="div2">-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><p>2</p><input type="text" id="orderFoodPrimaryKey1" value="2"><input type="text" id="parentRowNo2" value="2"></div>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 form-group"><h3>Hello</h3><input id="name1" value="Hello"></div>-->
<!--                    <div class="col-lg-2 col-md-2 col-sm-2 form-group"><h4>32 tk</h4><input id="price1" value="32"></div>-->
<!--                    <div class="col-lg-3 col-md-3 col-sm-3 form-group"><input type="number" class="form-control" style="font-size: small" min="1" required></div>-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><h4>32 tk</h4><input id="cost2" value="32"></div>-->
<!--                    <div class="col-lg-1 col-md-1 col-sm-1 form-group"><a onclick="deleteField('1')"><span class="glyphicon glyphicon-remove"></span></a></div>-->
<!--                </div>-->
<!--        <input type="text" id="rowNumber" name="rowNumber" value="5">-->
<!--        <div class="row">-->
<!--            <div class="col-md-9"></div>-->
<!--            <div class="col-md-1"><h4>Total Cost : </h4></div>-->
<!--            <div class="col-md-2"><h4 id="totalCost">800 tk </h4></div>-->
<!--        </div>-->

        <!--        Demo Ends-->

    </div>
    <input type="button" class="btn btn-primary" onclick="confirm('Are you sure to request for the order')" style="margin-left: 40%" value="Confirm The Order">
<?php include_once 'layout/footer.php';?>