<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title><?php echo $title; ?></title>

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() . NAV_ASSETS; ?>images/ios-desktop.png">
        <style>
            .mdl-textfield__label:after {
                bottom: 15px;
            }
        </style>
        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="<?php echo base_url() . NAV_ASSETS; ?>images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--Charts Script from HighChart-->
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">-->
        <!-- <script src="<?php echo base_url() . NAV_ASSETS; ?>js/high.js"></script>   -->
        <link rel="shortcut icon" href="<?php echo base_url() . NAV_ASSETS; ?>images/favicon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
        <!--
        <link rel="canonical" href="http://www.example.com/">
        -->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-light_blue.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() . NAV_ASSETS; ?>styles.css">
        <!--New Sidebar-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">



        <link rel="stylesheet" href="<?php echo base_url() . NAV_ASSETS; ?>css/style.css">          

        <!--Popup Dialogue Box-->
        <link rel="stylesheet" href="<?php echo base_url() . NAV_ASSETS; ?>css/mdl-jquery-modal-dialog.css">
        <script src="<?php echo base_url() . NAV_ASSETS; ?>js/mdl-jquery-modal-dialog.js"></script>
        <!--Notification of Call-->
        <script src="https://cdn-orig.socket.io/socket.io-1.2.0.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() . NAV_ASSETS; ?>css/toastr.min.css">
        <script src="<?php echo base_url() . NAV_ASSETS; ?>js/toastr.min.js"></script>
        <script src="<?php echo base_url() . NAV_ASSETS; ?>js/toastr.js"></script>

        <!--End of Notification of Call-->
        <script src="<?php echo base_url() . NAV_ASSETS; ?>js/list.min.js"></script>
        <style type="text/css">
            .mainbody{
                position: fixed; 
                overflow-y: hidden;
                top: 0; right: 0; bottom: 0; left: 0;
            }          
            .client-row{
                padding-top: 10px;
            }

            .dashboard{
                margin-left: 37% ;
                padding: 10px;
                /*border: 1px solid black;*/
            }

            .text-left{
                float: left;

            }
            .mdl-layout__drawer .mdl-navigation .mdl-navigation__link:hover {
                background-color: #00BCD4 ;
                color: #37474F;
                text-decoration: none;
                font-weight: 500;
            }           
            .mdl-layout__drawer .mdl-navigation .mdl-navigation__link{
                color: rgba(255, 255, 255, 0.56);
                font-weight: 500;
            }
            .modal-dialog{
                width: 300px !important;

            }
            .material-icons {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                vertical-align: middle;
                cursor: pointer;
            }
            .panel-default>.panel-heading {
                color: #e7eaec;
                background-color: #2b9c92/*#9de1fe*/;
                border-color: #ddd;
            }
            hr.head{
                margin: 1px 0 1px 0;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 8px;
                text-align: left;
                border: 1px black red;
                /* border-bottom: 1px solid #ddd;*/
            }

            tr:hover {
                background-color: #f5f5f5;
                color: #006666;
            }
            form{
                text-align: center;
            }
            #text, #ico {
                line-height: 50px;
            }
            #text{
                padding-left: 120px;
                font-weight: bolder;
            }

            #ico {
                vertical-align: middle;
            }

        </style>
        <script type="text/javascript">
            function toggle() {
                if (document.getElementById("hidethis").style.display == 'none') {
                    document.getElementById("hidethis").style.display = '';
                } else {
                    document.getElementById("hidethis").style.display = 'none';
                }
            }
        </script>

        <!--Dropdown in add symbol Form-->

        <style>
/*            .mdl-select {
                position: relative;
                font-size: 16px;
                display: inline-block;
                box-sizing: border-box;
                width: 300px;
                max-width: 100%;
                margin: 0;
                padding: 20px 0;
            }

            .mdl-select__input {
                border: none;
                border-bottom: 1px solid rgba(0,0,0, 0.12);
                display: inline-block;
                font-size: 16px;
                margin: 0;
                padding: 4px 0;
                width: 100%;
                background: 16px;
                text-align: left;
                color: inherit;
            }

            .mdl-select.is-focused .mdl-select__input {	outline: none; }
            .mdl-select.is-invalid .mdl-select__input { 
                border-color: rgb(222, 50, 38);
                box-shadow: none;
            }

            .mdl-select.is-disabled .mdl-select__input {
                background-color: transparent;
                border-bottom: 1px dotted rgba(0,0,0, 0.12);
            }

            .mdl-select__label {
                bottom: 0;
                color: rgba(0,0,0, 0.26);
                font-size: 16px;
                left: 0;
                right: 0;
                pointer-events: none;
                position: absolute;
                top: 24px;
                width: 100%;
                overflow: hidden;
                white-space: nowrap;
                text-align: left; 
            }

            .mdl-select.is-dirty .mdl-select__label { visibility: hidden; }

            .mdl-select--floating-label .mdl-textfield__label {
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            }

            .mdl-select--floating-label.is-focused .mdl-select__label,
            .mdl-select--floating-label.is-dirty .mdl-select__label {
                color: rgb(63,81,181);
                font-size: 12px;
                top: 4px;
                visibility: visible;
            }

            .mdl-select--floating-label.is-focused .mdl-select__expandable-holder .mdl-select__label,
            .mdl-select--floating-label.is-dirty .mdl-select__expandable-holder .mdl-select__label {
                top: -16px;
            }

            .mdl-select--floating-label.is-invalid .mdl-select__label {
                color: rgb(222, 50, 38);
                font-size: 12px;
            }

            .mdl-select__label:after {
                background-color: rgb(63,81,181);
                bottom: 20px;
                content: '';
                height: 2px;
                left: 45%;
                position: absolute;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                visibility: hidden;
                width: 10px;
            }

            .mdl-select.is-focused .mdl-select__label:after {
                left: 0;
                visibility: visible;
                width: 100%; 
            }

            .mdl-select.is-invalid .mdl-select__label:after {
                background-color: rgb(222, 50, 38); 
            }

            .mdl-select__error {
                color: rgb(222, 50, 38);
                position: absolute;
                font-size: 12px;
                margin-top: 3px;
                visibility: hidden;
            }

            .mdl-select.is-invalid .mdl-select__error {
                visibility: visible;
            }

            .mdl-select__expandable-holder {
                display: inline-block;
                position: relative;
                margin-left: 32px;
                -webkit-transition-duration: 0.2s;
                transition-duration: 0.2s;
                -webkit-transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                display: inline-block;
                max-width: 0.1px; 
            }

            .mdl-select.is-focused .mdl-select__expandable-holder, .mdl-select.is-dirty .mdl-select__expandable-holder {
                max-width: 600px; 
            }

            .mdl-select__expandable-holder .mdl-select__label:after {
                bottom: 0;
            }*/
        </style>


  <!-- <script type="text/javascript">
  $(document).ready(function () {
      //Disable full page
      $("body").on("contextmenu",function(e){
          return false;
      });
      
      //Disable part of page
      $("#id").on("contextmenu",function(e){
          return false;
      });
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function () {
      //Disable full page
      $('body').bind('cut copy paste', function (e) {
          e.preventDefault();
      });
      
      //Disable part of page
      $('#id').bind('cut copy paste', function (e) {
          e.preventDefault();
      });
  });
  </script> -->
        <script type="text/javascript">
            var options = {
                valueNames: ['material', 'price']
            };
            var documenstTable = new List('mdl-table', options);


            $($('th.sort')[0]).trigger('click', function () {
                console.log('clicked');
            });

            $('input.search').on('keyup', function (e) {
                if (e.keyCode === 27) {
                    $(e.currentTarget).val('');
                    documentTable.search('');
                }
            });

        </script>
    </head>
    <body>

<style>
            .mdl-textfield__label:after {
                bottom: 15px;
            }
        </style>

        <div class=" mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header mdl-layout--fixed-tabs">
            <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600 ">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer"></div>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                        <i class="material-icons">more_vert</i>
                    </button>
                    <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                        <li class="mdl-menu__item">About</li>
                        <li class="mdl-menu__item">Contact</li>
                        <li class="mdl-menu__item">Legal information</li>
                    </ul>
                </div>
                <!-- <div class="mdl-tabs mdl-js-tabs "> -->

            </header>

            <script type="text/javascript">
                var socket = io.connect('http://localhost:8088');

                socket.on('message', function (data1) {

                    var badge = $("#menudemo").attr("data-badge");
                    $("#menudemo").attr("data-badge", ++badge);
                    $("#noti_ul").prepend("<li class='mymenuitem mdl-menu__item'>" + data1.code + "   " + data1.type + "</li>");
                    playSound();
                    if (data1.type === "Sell") {
                        toastr.warning('Code : ' + data1.code, data1.type, {timeOut: 5000});
                    } else {
                        toastr.success('Code : ' + data1.code, data1.type, {timeOut: 5000});

                    }
                });



            </script>


