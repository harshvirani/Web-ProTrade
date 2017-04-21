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
            <div class="col-md-8">
                <button><i class="material-icons">settings_input_component</i></button>
                <button><i class="material-icons">multiline_chart</i></button>
                <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">

                    <div id="cono" ></div>
                    <script language="JavaScript">
                        window.onload = function () {
                            chart();
                            myfun();
                        };
                        function chart() {
                            $(function () {

                                Highcharts.setOptions({
                                    global: {
                                        useUTC: false
                                    }
                                });

                                Highcharts.stockChart('cono', {

                                    chart: {
                                        events: {
                                            load: function () {

                                                var temp;
                                                var gp = "gold";
                                                var series = this.series[0];
                                                setInterval(function () {
                                                    $.getJSON("http://172.20.10.2/rethinkDB/lineCurrentData_API.php?code=" + symb, function (data, status) {
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
                                        inputEnabled: false,
                                        selected: 0
                                    },

                                    title: {
                                        text: 'Live Chart:' + symb
                                    },

                                    exporting: {
                                        enabled: false
                                    },

                                    series: [{
                                            name: 'Live Data',
                                            data: (function () {
                                                // generate an array of random data
                                                var data = [],
                                                        time = (new Date()).getTime(),
                                                        i;

                                                for (i = -999; i <= 0; i += 1) {
                                                    data.push([
                                                        time + i * 1000,
                                                        Math.round(Math.random() * 100)
                                                    ]);
                                                }



//                                                $.getJSON("http://localhost/rethinkDB/all_API.php?req=trade_all", function (apidata, status) {
//                                                                alert("Data: " + data["count"]);
//                                                    var cnt = apidata["count"];
//                                                    for (i = cnt; i >= 0; i -= 1) {
//
//                                                        data.push([
//                                                            apidata["data"][i]["time_stamp"],
//                                                            apidata["data"][i]["price"]
//                                                        ]);
//                                                    }
//                                                });


                                                return data;
                                            }())
                                        }]
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