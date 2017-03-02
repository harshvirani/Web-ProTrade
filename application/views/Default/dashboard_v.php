<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">

        <div  class="try demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div id="container" style="width: 650px; height: 300px;"></div>
            <script language="JavaScript">
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

                                    var series = this.series[0];
                                    setInterval(function () {
                                        $.getJSON("http://172.20.10.3/rethinkDB/trade_price_API.php?name=gold", function (data, status) {
                                            temp = data["data"]["price"];
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
                            text: 'Live random data'
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
            </script>

        </div>
        <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                    <!--   -->
                </div>
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    Non dolore elit adipisicing ea reprehenderit consectetur culpa.
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    
                    <!-- <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a> -->
                </div>
            </div>

        </div>
    </div>
    <div class=" mdl-shadow--2dp  mdl-cell--12-col ">
        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <!-- Tab Bars -->
  <div class="mdl-tabs__tab-bar">
      <a href="#asia-panel" class="mdl-tabs__tab is-active">Asia</a>
      <a href="#europe-panel" class="mdl-tabs__tab">Europe</a>
      <a href="#america-panel" class="mdl-tabs__tab">America</a>
      <a href="#america-panel" class="mdl-tabs__tab">America</a>
        
  </div>
    </div>
</main>