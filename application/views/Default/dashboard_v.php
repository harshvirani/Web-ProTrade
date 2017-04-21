<main class="mdl-layout__content mdl-color--grey-100">

    <div class="container">
        <div class="row">

            <script>
                var symb = "gold";
            </script>
            <style type="text/css">
                #cono {
                    height:360px;
                    width:750px;
                    position:relative;
                }
            </style>
            <script>//
//                function Line(id1) {
//                    var h1 = document.getElementsById(id1);   // Get the first <h1> element in the document
//                    var att = document.createAttribute("disabled");
//                }
//                function CandleStick(id1) {
//                    var h1 = document.getElementsById(id1);   // Get the first <h1> element in the document
//                    var att = document.createAttribute("disabled");
//                    
//                }
//            </script>
            <div class="col-md-8">
                <button id="line" onclick="Line(this.id)" class="mdl-button mdl-js-button mdl-button--raised">
                    Line
                </button>
                <button id="candlestick" onclick="CandleStick(this.id)" class="mdl-button mdl-js-button mdl-button--raised">
                    CandleStick
                </button>
                <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
                    <div id="cono" ></div>
                    <script language="JavaScript">
                        window.onload = function () {
                            chart();
                            myfun();
                        };
                        function chart() {
                            $.getJSON('http://localhost/rethinkDB/lineAllData_API.php?code=ALUMINI 1', function (data) {
                                // Create the chart
                                Highcharts.stockChart('cono', {

                                    chart: {
                                        events: {
                                            load: function () {
                                                var temp;
                                                var gp = "gold";
                                                var series = this.series[0];
                                                setInterval(function () {
                                                    $.getJSON("http://localhost/rethinkDB/lineCurrentData_API.php?code=ALUMINI 1", function (data, status) {
                                                        temp = data["data"]["current_price"];
                                                    });
                                                    var x = (new Date()).getTime(), // current time
                                                            y = parseInt(temp);
                                                    series.addPoint([x, y], true, true);
                                                }, 1000);
                                            }
                                        }
                                    },

                                    rangeSelector: {
                                        selected: 1
                                    },

                                    title: {
                                        text: 'AAPL Stock Price'
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
                                    yAxis: {
                                        showFirstLabel: false,
                                        showLastLabel: true
                                    },
                                    series: [{
                                            type: 'line',
                                            name: 'AAPL',
                                            data: data,
                                            tooltip: {
                                                valueDecimals: 2
                                            }
                                        }
//                                        ,
//                                        {
//                                            type:'column',
//                                            name: 'AAPL',
//                                            data: data,
//                                            tooltip: {
//                                                valueDecimals: 2
//                                            }
//                                        }
                                    ]
                                });
                            });
                        }

                    </script>

                    <script type="text/javascript">
                        $('.scripts').click(function () {
                            var btnid = this.id;
                            alert(btnid);
                        });
                    </script>
                    <script>
                        function getPaging(str) {
                            alert(str);
                            symb = str;
                            chart();
                        }


                    </script>



                </div>
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
    </div>



    <script src="<?php echo base_url() . NAV_ASSETS; ?>js/index_side.js"></script> 
</main>