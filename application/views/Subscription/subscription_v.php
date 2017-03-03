<script type="text/javascript">
    var x, y;
    var selectable = new Array();
    $(document).ready(function () {
        $(".sc1").click(function () {
            var favorite = [];
            $.each($("input[name='plan']:checked"), function () {
                favorite.push($(this).val());
            });
            x = favorite.join(", ");

            var favorite = [];
            $.each($("input[name='checker']:checked"), function () {
                favorite.push($(this).val());
            });
            y = favorite.join(", ");

            if (y == 1) {
                document.getElementById('temp1').style.display = "block";
                document.getElementById('temp2').style.display = "none";
            } else if (y == 2) {
                document.getElementById('temp2').style.display = "block";
                document.getElementById('temp1').style.display = "none";
            } else {
                window.location.href = "#";
                alert("Please 'GO BACK' and Select  'Subscription Plan' ");

                document.getElementById('temp1').style.display = "none";
                document.getElementById('temp2').style.display = "none";
            }
        });
    });

    $(document).ready(function () {

        $(document).on("click", ".mdl-checkbox__ripple-container.mdl-js-ripple-effect.mdl-ripple--center", function () {
            var getscriptID = $(this).parents().eq(2/*child number*/).children().eq(2).text();
            var parentID = $(this).parents().eq(2).attr('id');
            
            //DESELECT CHECKBOX
            function contains(a, b) {
                var i = a.length;
                while (i--) {
                    if (a[i] === b) {
                        selectable.splice(i,1);
                        return false;
                    }
                }
                return true;
            }
            if (contains(selectable, getscriptID)) {
                selectable.push(getscriptID.toString());
            }
            // alert('Select Script:' + selectable);
        });

    });
</script>

<style type="text/css">
    #log
    {
        margin: 1% 1% 1% 1%;
    }
</style>
<!-- DELETE POPOVER -->
<div class="container">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">
                    <p>Are You Sure You want to Delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">YES</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DELETE POPOVER -->


<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">

        <div class="container">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#home">Plans</a></li>
                <li><a  href="#menu1">Subscription Type</a></li>
                <li><a  href="#menu2">Selection</a></li>
                <li><a  href="#menu3">Payment</a></li>
            </ul>

            <!--<div id="progressbar1" class="mdl-progress mdl-js-progress"></div>-->

            <div class="tab-content" >

                <!--Home Tab-->
                <div id="home" class=" tab-pane fade in active">

                    <div class="row">&nbsp;</div>
                    <div class="row" >
                        <button data-toggle="tab" onclick="menu1()" class="pull-right mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">arrow_forward</i> 
                        </button>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row fade in active">
                        <?php
                        foreach ($plans->result_array() as $plan) {
                            ?>
                            <!--Start Plan Card-->
                            <div class="col-sm-4">
                                <label for="chkbox<?php echo $plan['id']; ?>" class="mdl-card__supporting-text mdl-checkbox__label">
                                    <div class="demo-card-square mdl-card mdl-shadow--2dp ">
                                        <div class="mdl-card__title mdl-card--expand">
                                            <h2 class="mdl-card__title-text"><?php echo $plan['name']; ?></h2>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            <?php echo $plan['description']; ?>
                                        </div>
                                        <div class="mdl-card__actions mdl-card--border">

                                            <input type="radio" id="chkbox<?php echo $plan['id']; ?>" name="plan" value="<?php echo $plan['id']; ?>" class=" mdl-checkbox__input">
                                            <span class="mdl-card__supporting-text mdl-checkbox__label"><?php echo $plan['name']; ?></span>

                                        </div>
                                    </div>      
                                </label>
                            </div>

                            <!--End Plan Card-->
                            <?php
                        }
                        ?>

                    </div>
                </div>

                <!--Menu 1 Tab-->
                <div id="menu1" class="tab-pane fade">
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <button data-toggle="tab" onclick="home()" class="pull-left mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">arrow_back</i> <!-- class="material-icons"-->
                        </button>

                        <button type="button" id="te1" onclick="menu2()" data-toggle="tab" class="sc1 pull-right mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">arrow_forward</i> <!-- class="material-icons"-->
                        </button>
                    </div>

                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="marketspec" class="mdl-card__supporting-text mdl-checkbox__label">
                                <div class="demo-card-square mdl-card mdl-shadow--2dp ">
                                    <div class="mdl-card__title mdl-card--expand">
                                        <h2 class="mdl-card__title-text">Market Specific</h2>
                                    </div>
                                    <div class="mdl-card__supporting-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Aenan convallis.
                                    </div>
                                    <div class="mdl-card__actions mdl-card--border">

                                        <input type="radio" id="marketspec" name="checker" value="1" class="mdl-checkbox__input">
                                        <span class="mdl-card__supporting-text mdl-checkbox__label">Market</span>

                                    </div>
                                </div>      
                            </label>
                        </div>

                        <div class="col-sm-4">
                            <label for="scriptspec" class="mdl-card__supporting-text mdl-checkbox__label">
                                <div class="demo-card-square mdl-card mdl-shadow--2dp ">
                                    <div class="mdl-card__title mdl-card--expand">
                                        <h2 class="mdl-card__title-text">Script Specific</h2>
                                    </div>
                                    <div class="mdl-card__supporting-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Aenan convallis.
                                    </div>
                                    <div class="mdl-card__actions mdl-card--border">

                                        <input type="radio" id="scriptspec" name="checker" value="2" class="mdl-checkbox__input chkbx">
                                        <span class="mdl-card__supporting-text mdl-checkbox__label">Script</span>

                                    </div>
                                </div>      
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Menu2-->


                <div id="menu2" class="tab-pane fade">
                    <div class="row">&nbsp;</div>
                    <div class="row">

                        <button data-toggle="tab" onclick="menu1()" class="pull-left mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">arrow_back</i> <!-- class="material-icons"-->
                        </button>
                        <button id="nxtbtn" data-toggle="tab" onclick="menu3()" class="pull-right mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                            <i class="material-icons">arrow_forward</i> <!-- class="material-icons"-->
                        </button>
                    </div>

<!--                    <style type="text/css">
.ScrollStyle
{
max-height: 250px;
height: 350px;
overflow-y: scroll;
}
#element::-webkit-scrollbar { 
display: none; 
}
/*.ScrollStyle::-webkit-scrollbar { 
display: none; 
}*/
/* Let's get this party started */
.ScrollStyle::-webkit-scrollbar {
width: 3px;

}

/* Track */
/*.ScrollStyle::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
-webkit-border-radius: 7px;
border-radius: 7px;
}*/

/* Handle */
.ScrollStyle::-webkit-scrollbar-thumb {
-webkit-border-radius: 10px;
border-radius: 10px;
background: #2e9089; 
-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
.ScrollStyle::-webkit-scrollbar-thumb:window-inactive {
background: rgba(255,0,0,0.4); 
}
</style>
<div class="row">&nbsp;</div>
<div id="temp1">
    <div class="row">
                    <?php
                    foreach ($markets->result_array() as $mar) {
                        ?>
        

             <table id='mdl-table' class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" >
                 <thead>
                    <tr class="mdl-color" id="head" style="background-color: #46b6ac;">
                        <th class="full-width mdl-data-table__cell--non-numeric sort" data-sort="material" ><?php echo $mar['name']; ?></th>

                        <th class="full-width sort" data-sort="price">Unit price</th>

                    </tr>
                </thead>
                <tbody class="list">
                    
                        <?php
                        foreach ($symbols->result_array() as $symbol) {
                            if ($symbol['market_id'] == $mar['id']) {
                                ?>
                        
                                    <tr>
                                        <td class="mdl-data-table__cell--non-numeric material"><?php echo $symbol['name']; ?></td>

                                        <td class="price"><?php echo $symbol['price_quote']; ?></td>
                                    </tr>
                                    
                        
                                <?php
                            }
                        }
                        ?>
                </tbody>
            </table>
            <br/>
        
                        <?php
                    }
                    ?>
</div>
</div>-->

                    <div id="temp2">
                        <div class="row">
                            <div class="mdl-card__actions">
                                <div id="mdl-table">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable is-upgraded is-focused pull-right">
                                        <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                                            <i class="material-icons">search</i>
                                        </label>
                                        <div class="mdl-textfield__expandable-holder">
                                            <input class="mdl-textfield__input search" type="text" id="sample6">
                                            <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                                        </div>
                                    </div>

                                    <table id='mdl-table' class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp full-width">
                                        <thead>
                                            <tr class="mdl-color" id="head" style="background-color: #46b6ac;">
                                                <th class="mdl-data-table__cell--non-numeric sort" data-sort="material">Name</th>
                                                <th class="mdl-data-table__cell--non-numeric material sort" data-sort="quantity">Code</th>
                                                <th class="mdl-data-table__cell--non-numeric material sort" data-sort="price">Price Quote</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            <?php
                                            foreach ($symbols->result_array() as $symbol) {
                                                ?>
                                                <tr>

                                                    <td class="mdl-data-table__cell--non-numeric material"><?php echo $symbol['name']; ?></td>
                                                    <td class="mdl-data-table__cell--non-numeric material quantity"><?php echo $symbol['code']; ?></td>
                                                    <td class="mdl-data-table__cell--non-numeric material price"><?php echo $symbol['price_quote']; ?></td>

                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="log"></div>   


                    <style type="text/css">
                        #temp2 .panel-default>.panel-heading {
                            color: #e7eaec;
                            background-color: #2b9c92/*#9de1fe*/;
                            border-color: #ddd;
                        }

                        #temp2 .material-icons {
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            vertical-align: middle;
                        }
                        #temp2 table {
                            border-collapse: collapse;
                            width: 100%;
                        }
                        #temp2 th{
                            color: #ccffff;
                        }
                        #temp2 th, td {
                            padding: 8px;
                            text-align: left;
                            /* border-bottom: 1px solid #ddd;*/
                        }
                        #temp2 th{
                            background-color: #b3d9ff;
                            color: #006666;

                        }
                        #temp2 tr:hover {
                            background-color: #f5f5f5;
                            color: #006666;
                        }
                        #temp2 form{
                            text-align: center;
                        }
                        #temp2 #text, #temp2 #ico {
                            line-height: 50px;
                        }
                        #temp2 #text{
                            padding-left: 120px;
                            font-weight: bolder;
                        }

                        #temp2 #ico {
                            vertical-align: middle;
                        }
                        hr.head{
                            margin: 1px 0 1px 0;
                        }
                    </style>
                    <div id="temp1">
                        <div class="mdl-layout__content">
                            <div class="row"><h1>Market Specific</h1></div>
                        </div>
                    </div>


                </div>
                <!--Menu 3 Tab-->
                <div id="menu3" class="tab-pane fade">
                    
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <table id="finaltable" class="tb1 mdl-data-table mdl-js-data-table mdl-data-table__cell--non-numeric mdl-shadow--2dp">
                            <thead>

                                <tr class="mdl-color" id="head" style="background-color: #46b6ac;">
                                    <th class="full-width mdl-data-table__cell--non-numeric">
                                        Material
                                    </th>
                                    <th class="full-width mdl-data-table__cell--non-numeric">Quantity</th>
                                    <th class="full-width mdl-data-table__cell--non-numeric">Unit price</th>
                                    <th class="full-width mdl-data-table__cell--non-numeric"></th>
                                </tr>
                            </thead>
                            <tbody>
   <script type="text/javascript">
//  $('#nxtbtn').click(function () {      
function abc(){
    var j=selectable.length;
    for (var i = selectable.length-1; i >= 0; i--) {
            var table = document.getElementById("finaltable");
            var row = table.insertRow(1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.className = "full-width mdl-data-table__cell--non-numeric";
            cell2.className = "full-width mdl-data-table__cell--non-numeric";
            cell3.className = "full-width mdl-data-table__cell--non-numeric";
            cell1.innerHTML = "NEW CELL1";
            cell2.innerHTML = selectable[i];
            cell3.innerHTML = i;
        }
//alert(j);
selectable=[];
}
//});       
    </script>
                                <tr>
                                    <th class="full-width mdl-data-table__cell--non-numeric"></th>
                                    <th class="full-width  mdl-data-table__cell--non-numeric">Amount Payable</th>
                                    <th class="full-width mdl-data-table__cell--non-numeric">0/- Rs</th>
                                    <th class="full-width  mdl-data-table__cell--non-numeric"></th>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                    </div>
                    <div class="row">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pull-right">
                            Pay Now
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
 
</main>