<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ProTrade</title>

        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">

        <link rel="canonical" href="">

        <link href='//fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


        <link rel="stylesheet" href="<?php echo base_url() . NAV_ASSETS; ?>css/material.min.css">
        <link rel="stylesheet" href="<?php echo base_url() . NAV_ASSETS; ?>css/helpers.css">
        <link rel="stylesheet" href="<?php echo base_url() . NAV_ASSETS; ?>css/login.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .mdl-textfield__label:after {
                bottom: 15px;
            }
        </style>
    </head>
    <body>

        <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
            <div class="demo-ribbon " style=" background-image: url(<?php echo base_url() . NAV_ASSETS; ?>images/12.jpg); background-size: 100%; background-repeat:no-repeat;"></div>

            <main class="demo-main mdl-layout__content">
                <h2 class="t-center mdl-color-text--white text-shadow">Pro-Trade</h2>
                <!--<h4><?php if (isset($error)) echo $error; ?></h4>-->
                <a id="top"></a>

                <div class="demo-container mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
                    <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet">

                        <div class="mdl-card__title ">
                            <h2 class="mdl-card__title-text">
                                <i class="material-icons mdl-color-text--grey  m-r-5 lh-13">account_circle</i>
                                Register
                            </h2>
                        </div>
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <?php echo $error; ?>
                            </div>


                        <?php } ?>
                        <div class="p-l-20 p-r-20 p-b-20">
                            <form action="<?php echo base_url(); ?>User/Register" method="post">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                    <input class="mdl-textfield__input" name="uname" type="text" id="sample3" autocomplete="off"/>
                                    <label class="mdl-textfield__label" for="sample3">Username</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                    <input class="mdl-textfield__input" name="password" type="password" id="sample3" autocomplete="off"/>
                                    <label class="mdl-textfield__label" for="sample3">Password</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                    <input class="mdl-textfield__input" name="email" type="email" id="sample3" autocomplete="off"/>
                                    <label class="mdl-textfield__label" for="sample3">Email</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                    <input class="mdl-textfield__input" name="mobileno" type="tel" id="sample3" autocomplete="off"/>
                                    <label class="mdl-textfield__label" for="sample3">Contact No.</label>
                                </div>
                                <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                    <a href="<?php echo base_url(); ?>User/forgetPassword">Forget Password</a>
                                </div> -->
                                <div class="m-t-20">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect mdl-color--black">
                                        Register
                                    </button>
                                    <button type="button" onclick="location.href = '<?php echo base_url(); ?>'" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                        Login
                                    </button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </main>
        </div>

        <script src="<?php echo base_url() . NAV_ASSETS; ?>js/material.min.js"></script>

    </body>
</html>
