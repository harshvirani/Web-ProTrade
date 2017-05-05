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
                $('#line').click(function () {
                    $(this).attr('disabled');
                });
                function line() {
                    document.getElementById('candlestick').disabled = false;
                    document.getElementById('line').disabled = true;
                    data["type"] = "line";
                    chart();
                }
                function candle() {
                    document.getElementById('candlestick').disabled = true;
                    document.getElementById('line').disabled = false;
                    data["type"] = "candlestick";
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
                    var data = {
                        type: 'line',
                        code: 'SILVERM 1'
                    }
                    function chart() {
                        if (data["type"] == 'line') {
                            lineChart();
                        } else if (data["type"] == 'candlestick') {
                            candlestickChart();
                        }
                    }
                    function candlestickChart() {
                        $.getJSON('http://localhost/rethinkDB/candleStickAllData_API.php?code=ALUMINI 1&cycle=10', function (data) {

                            // create the chart
                            Highcharts.stockChart('container', {

                                chart: {
                                    events: {
                                        load: function () {
                                            // set up the updating of the chart each second
                                            var temp;
                                            var series = this.series[0];
                                            setInterval(function () {

                                                $.getJSON("http://localhost/rethinkDB/candleStickCurrentData_API.php?code=ALUMINI 1&cycle=10", function (data, status) {
                                                    temp = data;
                                                });
                                                series.addPoint(temp, true, true);
                                            }, 10000);
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
                                    text: 'ALUMINI Stock Price'
                                },

                                series: [{
                                        type: 'candlestick',
                                        name: 'ALUMINI Stock Price',
                                        data: data
                                    }]
                            });
                        });
                    }

                    function lineChart() {
                        socket.emit("request", JSON.stringify(data));

                        $.getJSON('http://localhost/rethinkDB/lineAllData_API.php?code=' + data["code"], function (data) {

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
                                    text: 'AAPL Stock Price'
                                },

                                series: [{
                                        type: 'line',
                                        name: 'AAPL Stock Price',
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
                        </style>
                        <div  >
                             <table class="full-width mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                        <thead>
                            <tr>
                                <th class="full-width mdl-data-table__cell--non-numeric sort full-width" data-sort="material">Material</th>
                            </tr>
                        </thead>
                    </table>
                <div style="height:290px;overflow-x: hidden;overflow-y: scroll;" >
                    <table id='mdl-table' class="full-width mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                                <script>
                                    function myfun() {
                                        var table = document.getElementsByTagName("table")[0];
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
                                            data["code"] = data1[0];
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