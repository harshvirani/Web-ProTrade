<main class="mdl-layout__content mdl-color--grey-100">
    <div class="com">
	<div class="com__content">
    <script>
        var symb = "gold";</script>


        <div  class="try demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col " style="width: 650px; height: 300px;">
            <div id="container" style="width: 650px; height: 300px;"></div>
            <script language="JavaScript">
//                window.onload = function () {
//                    myfun();
//                };
                function chart() {
                    $(function () {

                        Highcharts.setOptions({
                            global: {
                                useUTC: false
                            }
                        });

                        Highcharts.stockChart('container', {
                            chart: {
                                events: {
                                    load: function () {

                                        var temp;
                                        var gp = "gold";
                                        var series = this.series[0];
                                        setInterval(function () {
                                            $.getJSON("http://localhost/rethinkDB/trade_price_API.php?name=" + symb, function (data, status) {
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
                                text: 'Live Chart:'+symb
                            },

                            exporting: {
                                enabled: false
                            },

                            series: [{
                                    name: 'Random data',
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



//                                    $.getJSON("http://192.168.0.100/rethinkDB/all_API.php?req=trade_all", function (apidata, status) {
////            alert("Data: " + data["count"]);
//                                        var k = 0;
//                                        var cnt = apidata["count"];
//                                        var mi = cnt - (2 * cnt);
//                                        for (i = mi; i <= 0; i += 1) {
//                                            
//                                            data.push([
//                                                time + i * 1000,
//                                                apidata["data"][k]["price"];
//                                            ]);
//                                            k += 1;
//                                        }
//                                    });


                                        return data;
                                    }())
                                }]
                        });

                    });
                }

            </script>
            <script type="text/javascript">
    $('.scripts').click(function () {
        var btnid=this.id;
        alert(btnid);
    });
    </script>
<script>
function getPaging(str) {
  alert(str);
  symb=str;
  chart();
}


</script>
    

        </div>
        </div>
       
        	<nav class="com__nav pull-right">
                    <ul class="com__nav-list" id="bulk">
                        
                        
			<?php
                            foreach ($symbols->result_array() as $symbol) {
                                ?>
                        <li  class=" com__nav-item ">
                            
<!--                            <a style="text-align: center; text-decoration: none;"><?php echo $symbol['name']; ?></a>-->
                            <div onclick="getPaging(this.id)" id="<?php echo $symbol['code']; ?>" style="color: white; text-decoration: none" href="" class="com__nav-link">
					Name:<?php echo $symbol['name']; ?>
				</div>
			</li>
                         <?php
                            }
                            ?>

		</ul>
	</nav>
<!--        <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing" >
            <div class="mdl-card__actions mdl-card--border" >
                <div id="mdl-table">
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
                        tr:hover { cursor: pointer; cursor: hand; }
                    </style>

                    <table id='mdl-table' class=" mdl-js-data-table mdl-data-table mdl-shadow--2dp">
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

        </div> /.container -->


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
   <script src="<?php echo base_url().NAV_ASSETS;?>js/index_side.js"></script> 
</main>