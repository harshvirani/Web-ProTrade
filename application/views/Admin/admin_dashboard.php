<main class="mdl-layout__content mdl-color--grey-100">

    <div class="container">
        <div class="row">
            <div class="four_task" style="padding: 10px 15px 0 15px;">
                <div class="row">
                    <a>
                    <div class=" col-lg-3 col-md-6">
                        <div class="panel panel-lightgreen">
                            <div class="panel-heading" style="cursor: pointer; cursor: hand">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-map-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $market_cnt; ?></div>
                                        <div>Total Market</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                    <a>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-lightgrey">
                            <div class="panel-heading" style="cursor: pointer; cursor: hand">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-credit-card fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $script_cnt; ?></div>
                                        <div>Total Script</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                    <a>
                    <div  class="col-lg-3 col-md-6" >
                        <div class="panel panel-lightblue">
                            <div onclick="trendChart()" class="panel-heading" style="cursor: pointer; cursor: hand">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-line-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $trending_script[0]["code"]; ?></div>
                                        <div>Trending Script</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </a>
                        <a href="<?php echo base_url() . "marketview/" . $trending_market[0]["id"]; ?>">
                        <div  class=" col-lg-3 col-md-6">
                            <div class="panel panel-lightpink">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-level-up fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $trending_market[0]["name"]; ?></div>
                                            <div>Trending Market</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <script>
                function line() {
                    document.getElementById('candlestick').disabled = false;
                    document.getElementById('line').disabled = true;
                    document.getElementById('sample1').disabled = true;
                    chartData["type"] = "line";
                    chart();
                }
                function candle() {
                    document.getElementById('candlestick').disabled = true;
                    document.getElementById('line').disabled = false;
                    document.getElementById('sample1').disabled = false;
                    chartData["type"] = "candlestick";
                    chart();
                }
                function candleVal(cycle) {
                    chartData["cycle"] =(cycle);
                    document.getElementById("sample1").value=cycle;
                    chart();
                }
            </script>
            <div class="col-md-8">
                <button id="line" onclick="line()" class="mdl-button mdl-js-button mdl-button--raised" disabled="true">
                    Line
                </button>
                <button id="candlestick" onclick="candle()" class="mdl-button mdl-js-button mdl-button--raised" >
                    CandleStick
                </button>&nbsp;&nbsp;&nbsp;

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                    <input class="mdl-textfield__input" type="text" id="sample1" style="width: 100px" value="10" readonly tabIndex="-1" disabled="true">
                    <label for="sample1" class="mdl-textfield__label">Cycle</label>
                    <ul for="sample1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <?php
                        $response = file_get_contents('http://'.SERVER_IP.'/rethinkDB/cycleArray.php');
                        $cycle = json_decode($response);
                        for ($i = 0; $i < sizeof($cycle); $i++) {
                            ?>
                        <li onclick="candleVal(<?php echo $cycle[$i];?>)" class="mdl-menu__item"><?php echo $cycle[$i]; ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div  class="try demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col" style="width: 100%; height: 400px;">
                    <div id="container" ></div>
                    <script>

                        var chartData = {
                            type: 'line',
                            code: '<?php echo $trending_script[0]["code"]; ?>',
                            cycle: '10'
                        }
                        function trendChart() {
                            chartData["code"] = "<?php echo $trending_script[0]["code"]; ?>";
                            chart();
                        }
                        window.onload = function () {
//                            chart();
                            myfun();
                        };

                        function chart() {
                            if (chartData["type"] == 'line') {
                                lineChart();
                            } else if (chartData["type"] == 'candlestick') {
                                candlestickChart();
                            }
                        }
                        function candlestickChart() {
                            socket.emit("request", JSON.stringify(chartData));

                            $.getJSON('http://<?php echo SERVER_IP; ?>/rethinkDB/candleStickAllData_API.php?code=' + chartData["code"] + '&cycle=' + chartData["cycle"], function (data) {

                                // create the chart
                                var chartView = Highcharts.stockChart('container', {

                                    chart: {
                                        events: {
                                            load: function () {
                                                var series = this.series[0];
                                                socket.on('newPoint', function (data) {
                                                    var d = (new Date(data['time_stamp'])).getTime();
                                                    series.addPoint([d, parseFloat(data['open']), parseFloat(data['high']), parseFloat(data['low']), parseFloat(data['close'])], true, true);
                                                });
                                            }
                                        }
                                    },

                                    rangeSelector: {
                                        selected: 1
                                    },
                                    scrollbar: {
                                        height: 10,
                                        barBackgroundColor: '#7cb5ec',
                                        barBorderRadius: 7,
                                        barBorderWidth: 0,
                                        buttonBackgroundColor: '#7cb5ec',
                                        buttonBorderWidth: 0,
                                        buttonBorderRadius: 7,
                                        trackBackgroundColor: 'none',
                                        trackBorderWidth: 1,
                                        trackBorderRadius: 0,
                                        trackBorderColor: '#CCC'
                                    },

                                    title: {
                                        text: chartData["code"]
                                    },

                                    series: [{
                                            type: 'candlestick',
                                            name: chartData["code"] + ' Candle',
                                            data: data,
                                            fillColor: {
                                                linearGradient: {
                                                    x1: 0,
                                                    y1: 0,
                                                    x2: 0,
                                                    y2: 1
                                                },
                                                stops: [
                                                    [0, Highcharts.getOptions().colors[0]],
                                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                                ]
                                            },
                                            marker: {
                                                enabled: true,
                                                radius: 3
                                            },
                                            shadow: true
                                        }]
                                });

                                socket.on('updatePoint', function (data1) {
                                    var d = (new Date(data1['time_stamp'])).getTime();
                                    var updateData = [d, parseFloat(data1['open']), parseFloat(data1['high']), parseFloat(data1['low']), parseFloat(data1['close'])];
                                    var length = chartView.series[0].data.length;
                                    chartView.series[0].data[length - 1].update(updateData);
                                });
                            });
                        }

                        function lineChart() {
                            socket.emit("request", JSON.stringify(chartData));

                            $.getJSON('http://<?php echo SERVER_IP; ?>/rethinkDB/lineAllData_API.php?code=' + chartData["code"], function (data) {

                                // create the chart
                                Highcharts.stockChart('container', {

                                    chart: {
                                        events: {
                                            load: function () {
                                                // set up the updating of the chart each second
                                                var series = this.series[0];
                                                socket.on('upDateData', function (data) {

                                                    var d = (new Date(data['time_stamp'])).getTime();
                                                    //alert(d);
                                                    series.addPoint([d, parseFloat(data['current_price'])], true, true);
                                                });
                                            }
                                        }
                                    },

                                    rangeSelector: {
                                        selected: 1
                                    },

                                    title: {
                                        text: chartData["code"]
                                    },

                                    scrollbar: {
                                        height: 10,
                                        barBackgroundColor: '#7cb5ec',
                                        barBorderRadius: 7,
                                        barBorderWidth: 0,
                                        buttonBackgroundColor: '#7cb5ec',
                                        buttonBorderWidth: 0,
                                        buttonBorderRadius: 7,
                                        trackBackgroundColor: 'none',
                                        trackBorderWidth: 1,
                                        trackBorderRadius: 0,
                                        trackBorderColor: '#CCC'
                                    },

                                    series: [{
                                            type: 'line',
                                            name: chartData["code"] + ' Price',
                                            data: data,
                                            fillColor: {
                                                linearGradient: {
                                                    x1: 0,
                                                    y1: 0,
                                                    x2: 0,
                                                    y2: 1
                                                },
                                                stops: [
                                                    [0, Highcharts.getOptions().colors[0]],
                                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                                ]
                                            },
                                            marker: {
                                                enabled: true,
                                                radius: 3
                                            },
                                            shadow: true
                                        }]
                                });
                            });
                        }


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
                            #style-4::-webkit-scrollbar-track
                            {
                                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                                background-color: #F5F5F5;
                            }

                            #style-4::-webkit-scrollbar
                            {
                                width: 5px;
                                background-color: #F5F5F5;
                            }

                            #style-4::-webkit-scrollbar-thumb
                            {
                                background-color: #7cb5ec;

                            }
                            .scrollbar
                            {
                                overflow-y: scroll;
                            }
                        </style>
                        <div  >
                            <table class="full-width mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                                <thead>
                                    <tr>
                                        <th class="full-width mdl-data-table__cell--non-numeric sort full-width" data-sort="material">Symbol</th>
                                    </tr>
                                </thead>
                            </table>
                            <div style="height:326px;overflow-x: hidden;overflow-y: scroll;" id="style-4" class="scrollbar">
                                <table id='mdl-table' class="full-width mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                                    <script>
                                        function myfun() {
                                            var table = document.getElementById("mdl-table");
                                            var tbody = table.getElementsByTagName("tbody")[0];
                                            tbody.onclick = function (e) {
                                                e = e || window.event;
                                                var data1 = [];
                                                var target = e.srcElement || e.target;
                                                while (target && target.nodeName !== "TR") {
                                                    target = target.parentNode;
                                                }
                                                if (target) {
                                                    var cells = target.getElementsByTagName("td");
                                                    for (var i = 0; i < cells.length; i++) {
                                                        data1.push(cells[i].innerHTML);
                                                    }
                                                }
                                                chartData["code"] = data1[0];
                                                //                                    alert(symb);
                                                chart();
                                                //                                    $( "#container" ).load(window.location.href + " #container" );
                                            };
                                        }

                                    </script>
                                    <tbody class="list" style="height:340px;overflow-x: hidden;overflow-y: scroll;">
                                        <?php
                                        foreach ($symbols->result_array() as $symbol) {
                                            ?>
                                            <tr>
                                                <td class="mdl-data-table__cell--non-numeric material full-width"><?php echo $symbol['code']; ?></td>
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
        </div>
        <style type="text/css">
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none; 
                margin: 0; 
            }
            #style-4::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
            }

            #style-4::-webkit-scrollbar
            {
                width: 5px;
                background-color: #F5F5F5;
            }

            #style-4::-webkit-scrollbar-thumb
            {
                background-color: #7cb5ec;

            }
            .scrollbar
            {
                overflow-y: scroll;
            }
            .huge {
                font-size: 20px;
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
                    if (parseInt($(this).parent().siblings('input').val()) > 1) {
                        $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) - 1)
                    } else {
                        $(this).parent().siblings('input').val(0)
                    }

                    if (parseInt($(this).parent().siblings('input').val()) > 60) {
                        $(this).parent().siblings('input').val(60)
                    }
                })

                $('.btn-pluss').on('click', function () {
                    if (parseInt($(this).parent().siblings('input').val()) < 60) {
                        $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) + 1)
                    } else {
                        $(this).parent().siblings('input').val(60)
                    }
                    if (parseInt($(this).parent().siblings('input').val()) < 0) {
                        $(this).parent().siblings('input').val(0)
                    }
                })

            });
        </script>

        <div class="four_task">
            <div class="row">
                <a href="<?php echo base_url() . NAV_USERS; ?>SUBSCRIBER">
                    <div href="" class=" col-lg-3 col-md-6">

                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $sub_cnt; ?></div>
                                        <div>Total Subscriber</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <a>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-ban fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $active_cnt - 1; ?></div>
                                    <div>Active User</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </a>
                <a>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-ban fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $blocked_cnt; ?></div>
                                    <div>Blocked User</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </a>
                <a href="<?php echo base_url() . NAV_USERS; ?>STAFF">
                    <div class=" col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-id-badge fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $staff_cnt; ?></div>
                                        <div>Total Staff</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        </div>


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
                            <input id="cycle" name="cycle" type="number" class="form-control no-padding add-color text-center height-25" min="1" max="60"  value="10" maxlength="2">
                            <span class="input-group-btn">
                                <button class="btn btn-red btn-pluss" type="button">+</button>
                            </span>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button onclick="sendData()" id="" class="mdl-button mdl-js-button mdl-button--raised">Apply</button>
                    </div>

                    <script>
                        function sendData() {

                            var cycle = document.getElementById("cycle").value;
//                            alert(cycle);
                            $.ajax({
                                type: 'POST',
//                                    http://localhost/rethinkDB/trade_Algo_API.php
                                url: 'http://localhost/rethinkDB/trade_Algo_API.php',
                                data: {cycle: cycle},
                                cache: false,
                                success: AjaxSucceeded,
                                error: AjaxFailed
                            });
                        }
                        function AjaxSucceeded(result) {
//                            alert("Success");
                            alert(result);
                        }
                        function AjaxFailed(result) {
                            alert("Failed");
                            alert(result.status + ': ' + result.statusText);
                        }
                    </script>
                </div>
                <!-- /.col-lg-4 -->
            </div>

        </div>
    </div>

</main>
