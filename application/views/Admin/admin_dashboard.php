<main class="mdl-layout__content mdl-color--grey-100">

    <div class="container">
        <div class="row">
            <div class="four_task" style="padding: 10px 15px 0 15px;">
            <div class="row">
                <div class=" col-lg-3 col-md-6">
                    <div class="panel panel-lightgreen">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-map-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">132</div>
                                    <div>Total Market</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-lightgrey">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">544</div>
                                    <div>Total Script</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-lightblue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Top 10</div>
                                    <div>Trending Script</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class=" col-lg-3 col-md-6">
                    <div class="panel panel-lightpink">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-level-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Top 10</div>
                                    <div>Trending Market</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
            <script>
                var symb = "gold";</script>
            <div class="col-md-8">

                <div  class="try demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col" style="width: 100%; height: 400px;">
                    <div id="container" ></div>
<script type="text/javascript">
$(function() {
  $(document).ready(function() {
    Highcharts.setOptions({
    global: {
        useUTC: false
    }
    });

// Create the chart
    Highcharts.stockChart('container', {
    chart: {
    type: 'candlestick',
        events: {
            load: function () {

                // set up the updating of the chart each second
            var series = this.series[0];
            setInterval(function() {
                $.getJSON("http://172.20.10.2/rethinkDB/candleStickCurrentData_API.php?code=CRUDEOIL 1&cycle=10", function (data, status) {
                                                        temp = data;
//                                                        alert(temp['high']);
                                                    });
//                                                    var x = (new Date()).getTime(), // current time
//                                                            y = parseInt(temp);
              var x = (new Date()).getTime();
              series.addPoint([
                x,
                parseInt(temp['open']),
                parseInt(temp['high']),
                parseInt(temp['low']),
                parseInt(temp['close'])
              ], true, true);
<<<<<<< HEAD
            }, 100)
=======
            },100)
>>>>>>> 270b4571b6f2d5195cd7e90f05dac35325d06bfb
            }
        }
    },

    rangeSelector: {
        buttons: [{
                count: 1,
                type: 'minute',
                text: '1M'
            }, {
                count: 5,
                type: 'minute',
                text: '5M'
            }, {
                type: 'all',
                text: 'All'
            }],
        inputEnabled: false
    },

    title: {
        text: 'Live random data'
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Random data',
        type: 'candlestick',
        data: (function() {
          // generate an array of random data
          var data = [],
            time = (new Date()).getTime(),
            i;

          for (i = -999; i <= 0; i++) {
            data.push([
              time + i * 10000,
              Math.round(Math.random() * 100),
              Math.round(Math.random() * 100),
              Math.round(Math.random() * 100),
              Math.round(Math.random() * 100)
            ]);
          }
          return data;
        })()
    }]
    });
});
});


</script>



                </div>
            </div>
            <div class="col-md-4" >
                <div class="mdl-card" style="width: 85%; background: transparent;">


                    <div id="mdl-table"  style="width: 100%; height: 100%;">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable is-upgraded is-focused" data-upgraded=",MaterialTextfield">

                            <div class="mdl-textfield__expandable-holder">
                                <input class="mdl-textfield__input search" type="text" id="sample6">
                                <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                            </div>
                            <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                                <i class="material-icons">search</i>
                            </label>
                        </div>
                        <style>
                            tr:hover { cursor: pointer;}
                        </style>
                        <div style="height:340px;overflow-x: hidden;overflow-y: scroll; border: 1px solid black;" >
                            <table id='mdl-table' class="mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                                <thead>
                                    <tr>
                                        <th class="mdl-data-table__cell--non-numeric sort full-width" data-sort="material">Material</th>
                                        <th class="mdl-data-table__cell--non-numeric sort full-width">Current</th>
                                    </tr>
                                </thead>
                                <script>
                                    function myfun() {
                                        var table = document.getElementsByTagName("table")[0];
                                        var tbody = table.getElementsByTagName("tbody")[0];
                                        tbody.onclick = function (e) {
                                            e = e || window.event;
                                            var data = [];
                                            var target = e.srcElement || e.target;
                                            while (target && target.nodeName !== "TR") {
                                                target = target.parentNode;
                                            }
                                            if (target) {
                                                var cells = target.getElementsByTagName("td");
                                                for (var i = 0; i < cells.length; i++) {
                                                    data.push(cells[i].innerHTML);
                                                }
                                            }
                                            symb = data[0];
                                            //                                    alert(symb);
                                            chart();
                                            //                                    $( "#container" ).load(window.location.href + " #container" );
                                        };
                                    }

                                </script>
                                <tbody class="list">
                                    <?php
                                    foreach ($symbols->result_array() as $symbol) {
                                        ?>
                                        <tr >
                                            <td class="mdl-data-table__cell--non-numeric material"><?php echo $symbol['code']; ?></td>
                                            <td class="mdl-data-table__cell--non-numeric material"><?php echo $symbol['price_quote']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--</div>-->

                </div> 
            </div>
        </div>
        <style type="text/css">
            .huge {
                font-size: 40px;
            }
            .panel-green {
                border-color: #5cb85c;
            }
            .panel-green > .panel-heading {
                border-color: #5cb85c;
                color: white;
                background-color: #5cb85c;
            }
            .panel-lightpink{
                border-color: #ebccd1;
            }
            .panel-lightpink>.panel-heading {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
            }
            .panel-lightgreen{
                border-color: #d6e9c6;
            }
            .panel-lightgreen>.panel-heading {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
            }
            .panel-lightgrey{
                border-color: #faebcc;
            }
            .panel-lightgrey>.panel-heading {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
            }
            .panel-lightblue{
                border-color: #bce8f1;
            }
            .panel-lightblue>.panel-heading {
                color: #31708f;
                background-color: #d9edf7;
                border-color: #bce8f1;
            }
            .panel-yellow {
                border-color: #f0ad4e;
            }
            .panel-yellow > .panel-heading {
                border-color: #f0ad4e;
                color: white;
                background-color: #f0ad4e;
            }
            .panel-red{
                border-color: #d9534f; 
            }
            .panel-red > .panel-heading {
                border-color: #d9534f;
                color: white;
                background-color: #d9534f;
            }
            .nter{
                width: 150px;
                margin: 40px auto;

            }
            .scrispac{
                width: 40%;
            }
            .nospec{
                width:8%;
            }
            .center{
                text-align: center;
            }
            .four_task{
                width: 95%;
            }
            .tab_wid{
                width: 95%;
            }
            .tab_had{
                font-weight: bolder;
                font-size: 15px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {

                $('.btn-minuse').on('click', function () {
                    $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) - 1)
                })

                $('.btn-pluss').on('click', function () {
                    $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) + 1)
                })

            });
        </script>

        <div class="four_task">
            <div class="row">
                <div class=" col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $sub_cnt;?></div>
                                    <div>Total Subscriber</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $active_cnt;?></div>
                                    <div>Active User</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-ban fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $blocked_cnt;?></div>
                                    <div>Blocked User</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class=" col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-id-badge fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $staff_cnt;?></div>
                                    <div>Total Staff</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<!--        <div class="row">
            <div class="tab_wid col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading tab_had">
                        Symbols Notifications Preferences
                    </div>
                    
                    <script>
                    function updateMinMax(id1){
                        var min=document.getElementById("min"+id1).value;
                        var max=document.getElementById("max"+id1).value
                        location.href="<?php echo base_url();?>/Admin/Dashboard/updateMinMax/"+id1+"/"+min+"/"+max;
                    }
                    </script>
                     /.panel-heading 
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="scrispac">Script</th>
                                        <th class="center">Min</th>
                                        <th class="center">Max</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($symbols->result_array() as $symbol) {
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $symbol['name'];?></td>
                                        <td><div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-white btn-minuse" type="button">-</button>
                                                </span>
                                                <input id="min<?php echo $symbol['id'];?>"  type="text" class="form-control no-padding add-color text-center height-25" maxlength="5" value="<?php echo $symbol['call_min']; ?>">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-red btn-pluss" type="button">+</button>
                                                </span>
                                            </div> /input-group </td>
                                        <td><div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-white btn-minuse" type="button">-</button>
                                                </span>
                                                <input id="max<?php echo $symbol['id'];?>" type="text" class="form-control no-padding add-color text-center height-25" maxlength="5" value="<?php echo $symbol['call_max']; ?>">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-red btn-pluss" type="button">+</button>
                                                </span>
                                            </div> /input-group </td>
                                        <td><button id="<?php echo $symbol['id'];?>" onclick="updateMinMax(this.id)" class="mdl-button mdl-js-button mdl-button--raised">Apply</button></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                         /.table-responsive 
                    </div>
                     /.panel-body 
                </div>
                 /.panel 
            </div>
        </div>-->

        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Candlestick Cycle (between 1 to 60)
                    </div>
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-white btn-minuse" type="button">-</button>
                            </span>
                            <input id=""  type="text" class="form-control no-padding add-color text-center height-25" min="1" max="60"  value="0" maxlength="2">
                            <span class="input-group-btn">
                                <button class="btn btn-red btn-pluss" type="button">+</button>
                            </span>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button id="" class="mdl-button mdl-js-button mdl-button--raised">Apply</button>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <div class="col-lg-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Broadcast Message
                    </div>
                    <form>
                    <div class="panel-body">
                        <div class="input-group">
                                                        <input id="text" name="mail"  type="text" class="form-control no-padding add-color text-center height-25" min="1" max="60"  value="0" maxlength="2">
                                                    </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" id="submit" name="submit" value="Submit" class="mdl-button mdl-js-button mdl-button--raised">Send</button>
                    </div>
                    </form>
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
        </div>
    </div>
    
    <!--<div class=" mdl-shadow--2dp  mdl-cell--12-col ">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
             Tab Bars 
            <div class="mdl-tabs__tab-bar">
                <a href="#asia-panel" class="mdl-tabs__tab is-active">Asia</a>
                <a href="#europe-panel" class="mdl-tabs__tab">Europe</a>
                <a href="#america-panel" class="mdl-tabs__tab">America</a>
                <a href="#america-panel" class="mdl-tabs__tab">America</a>
    
            </div>
        </div>
       <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    </div>-->
    <script src="<?php echo base_url() . NAV_ASSETS; ?>js/index_side.js"></script> 
</main>
