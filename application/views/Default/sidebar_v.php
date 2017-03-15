<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">





    <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
    <script type="text/javascript">
        var socket = io.connect('http://localhost:8088');

        socket.on('message', function (data1) {
//				var actualContent = $( "#messages" ).html();
//				var newMsgContent = '<li> <strong>' + data.name + '</strong> : ' + data.message + '</li>';
//				var content = newMsgContent + actualContent;

//				$( "#messages" ).html( content );
//                            'use strict';
//                             var snackbarContainer = document.querySelector('#demo-toast-example');
//                             var data = {message: 'Example Message # ' + data1.name};
//    snackbarContainer.MaterialSnackbar.showSnackbar(data);

// $.bootstrapGrowl("This is another test"+data1.name, { type: 'success' });
            toastr.success('Name:' + data1.name, 'Buy/Sell', {timeOut: 5000})
        });



    </script>
    <aside id="sidebar" class="sidebar sidebar-inverse open" role="navigation">
        <!-- Sidebar header -->
        <div class="sidebar-header header-cover" style="background-image: url(<?php echo base_url() . NAV_ASSETS; ?>images/bg.jpg);">
            <!-- Top bar -->
            <div class="top-bar"></div>
            <!-- Sidebar toggle button -->
            <button type="button" class="sidebar-toggle">
                <i class="icon-material-sidebar-arrow"></i>
            </button>
            <!-- Sidebar brand image -->
            <div class="sidebar-image">
                <img src="<?php echo base_url() . NAV_ASSETS; ?>images/user.jpg" class="demo-avatar">
            </div>
            <!-- Sidebar brand name -->
            <a data-toggle="dropdown" class="sidebar-brand" href="#settings-dropdown">
                <?php echo $this->session->userdata('email'); ?>
                <b class="caret"></b>
            </a>

        </div>

        <!-- Sidebar navigation -->
        <ul class="nav sidebar-nav">
            <li class="dropdown">
                <ul id="settings-dropdown" class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url() . NAV_PROFILE; ?>" tabindex="-1">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . NAV_LOGOUT ?>" tabindex="-1">
                            Log Out
                        </a>
                    </li>
                </ul>
            </li><li class="divider"></li>
            <li>
                <a href="<?php echo base_url() . NAV_HOME; ?>">
                    <i class="sidebar-icon md-inbox"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() . NAV_PLAN; ?>">
                    <i class="sidebar-icon md-star"></i>
                    Plan
                </a>
            </li>

            <li class="divider"></li>
            <li class="dropdown">
                <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">
                    All Mail
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#" tabindex="-1">
                            Social
                            <span class="sidebar-badge">12</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" tabindex="-1">
                            Promo
                            <span class="sidebar-badge">0</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </aside>
    <!--                <header class="demo-drawer-header">
                        <img src="<?php echo base_url() . NAV_ASSETS; ?>images/user.jpg" class="demo-avatar">
                        <div class="demo-avatar-dropdown">
                            <span><?php echo $this->session->userdata('email'); ?></span>
                            <div class="mdl-layout-spacer"></div>
                            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                <i class="material-icons" role="presentation">arrow_drop_down</i>
                                <span class="visuallyhidden">Accounts</span>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                                <a href="<?php echo base_url() . NAV_LOGOUT ?>"><li class="mdl-menu__item">Logout</li></a>
                            </ul>
                        </div>
                    </header>
                    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                        <a class="mdl-navigation__link" href="<?php echo base_url() . NAV_HOME; ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
                        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Inbox</a>
                        <a class="mdl-navigation__link" href="<?php echo base_url() . NAV_PLAN; ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Subscrition Plan</a>
                        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Purchases</a>
                        <div class="mdl-layout-spacer"></div>
                        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span >Help</span></a>
                    </nav>-->

</div>