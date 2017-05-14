<main class="mdl-layout__content mdl-color--grey-100">

    <div class="container">
        <div class="row">
            <style type="text/css">
                #container {
                    height:360px;
                    width:750px;
                    position:relative;
                }
            </style>
            <script>
                
                function line() {
                    document.getElementById('candlestick').disabled = false;
                    document.getElementById('line').disabled = true;
                    chartData["type"] = "line";
                    chart();
                }
                function candle() {
                    document.getElementById('candlestick').disabled = true;
                    document.getElementById('line').disabled = false;
                    chartData["type"] = "candlestick";
                    chart();
                }
            </script>
            <div class="col-md-8">
                <button id="line" onclick="line()" class="mdl-button mdl-js-button mdl-button--raised" disabled="true">
                    Line
                </button>
                <button id="candlestick" onclick="candle()" class="mdl-button mdl-js-button mdl-button--raised" >
                    CandleStick
                </button>
                <div id="container" class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col"></div>
                <script language="JavaScript">
                    window.onload = function () {
                        chart();
                        myfun();
                    };
                    var chartData = {
                        type: 'line',
                        code: 'SILVERM 1',
                        cycle:'10'
                    }
                    function chart() {
                        if (chartData["type"] == 'line') {
                            lineChart();
                        } else if (chartData["type"] == 'candlestick') {
                            candlestickChart();
                        }
                    }
                    function candlestickChart() {
                        socket.emit("request", JSON.stringify(chartData));

                        $.getJSON('http://localhost/rethinkDB/candleStickAllData_API.php?code='+chartData["code"]+'&cycle='+chartData["cycle"], function (data) {

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
                                        data: data
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

                        $.getJSON('http://localhost/rethinkDB/lineAllData_API.php?code=' + chartData["code"], function (data) {

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

                                series: [{
                                        type: 'line',
                                        name: chartData["code"] + ' Price',
                                        data: data
                                    }]
                            });
                        });
                    }
                </script>
            </div>
            <div class="col-md-4" >
                <div class="mdl-card" style="width: 90%; background: transparent;">


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
                                        <th class="full-width mdl-data-table__cell--non-numeric sort full-width" data-sort="material">Material</th>
                                    </tr>
                                </thead>
                            </table>
                            <div style="height:290px;overflow-x: hidden;overflow-y: scroll;" id="style-4" class="scrollbar">
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
</main>