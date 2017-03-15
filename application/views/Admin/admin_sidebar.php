<div class=" demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
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
            <a data-toggle="dropdown" class="sidebar-brand " href="#settings-dropdown">
                <?php echo $this->session->userdata('email'); ?>
                <i class="material-icons f14">menu</i>
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
                        <a href="<?php echo base_url() . NAV_LOGOUT; ?>" tabindex="-1">
                            Log Out
                        </a>
                    </li>
                </ul>
            </li>
            <li class="divider"></li>
            <li>
                <a href="<?php echo base_url() . NAV_ADMIN; ?>">
                    <!--<i class="sidebar-icon md-inbox"></i>-->
                    <i class="sidebar-icon mdl-color material-icons">dashboard</i>
                    Dashboard
                </a>
            </li>
            <li class="dropdown "><!--clas=open-->
                <a class="ripple-effect dropdown-toggle" href="<?php echo base_url() . NAV_USERS; ?>" data-toggle="dropdown"><!--aria-expanded="false"-->
                    <i class="sidebar-icon material-icons">people</i>
                    User
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu"><!--style="display: block;"-->
                    <li>
                        <a href="<?php echo base_url() . NAV_USERS; ?>SUBSCRIBER" tabindex="-1">
                            <i class="sidebar-icon material-icons">person</i>
                            Subscriber
                            <span class="sidebar-badge"><?php echo $sub_cnt; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . NAV_USERS; ?>STAFF" tabindex="-1">
                            <i class="sidebar-icon material-icons">person</i>
                            Staff
                            <span class="sidebar-badge"><?php echo $staff_cnt; ?></span>
                        </a>
                    </li>

                    <hr>
                    <li>
                        <a data-toggle="modal" data-target="#addMarket" tabindex="-1">
                            &nbsp;&nbsp;<i class="sidebar-icon material-icons">person_add</i>
                            Add Member
                        </a>
                    </li>
                </ul>
            </li>
            <!--<li class="divider"></li>-->
            <li class="dropdown">

                <a href="<?php echo base_url() . 'market/1' ?>" class="ripple-effect dropdown-toggle"  data-toggle="dropdown">
                    <i class="sidebar-icon mdl-color material-icons">account_balance</i>
                    Market
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <style type="text/css">
                        .lock:hover .icon-unlock,
.lock .icon-lock {
    display: none;
}
.lock:hover .icon-lock {
    display: inline-block;
}
                    </style>
                    <?php
                    foreach ($markets->result_array() as $mar) {
                        ?>

                        <li>
                            <a class="lock" href="<?php echo base_url() . 'marketview/' . $mar['id']; ?>" tabindex="-1">

                                &nbsp;&nbsp;<i class="icon-unlock sidebar-icon material-icons ">trending_up</i>
                                <i id="<?php echo $mar['id']; ?>" class="icon-lock sidebar-icon material-icons deleteMarket" >delete_forever</i>
                                    
                                <?php echo $mar['name'];
                                ?>

                                <span class="sidebar-badge">

                                    <?php
                                    $coun = 0;
                                    foreach ($count->result_array() as $cnt) {
                                        if ($mar['id'] == $cnt['market_id']) {
                                            $coun = $cnt['COUNT(*)'];
                                        }
                                    }
                                    echo $coun;
                                    ?>

                                </span>
                            </a>
                        </li>

                        <?php
                    }
                    ?>
                    <hr>
                    <li>
                        <a data-toggle="modal" data-target="#addMarket" class="">
                            &nbsp;&nbsp;<i class="sidebar-icon material-icons">add_box</i>
                            Add Market
                        </a>
                    </li>
                </ul>

            </li>

            <li class="divider"></li>

        </ul>
        <!-- Sidebar divider -->
        <!-- <div class="sidebar-divider"></div> -->

        <!-- Sidebar text -->
        <!--  <div class="sidebar-text">Text</div> -->
    </aside>

    <script>
        $('.deleteMarket').click(function () {
            var btnid = this.id;
            
            showDialog({
                title: 'Delete Market',
                text: 'Are You Sure You Want to Delete?',
                negative: {
                    title: 'No'
                },
                positive: {
                    title: 'Yes',
                    onClick: function (e) {
                        document.location.href = '<?php echo base_url() . "admin/market/removeMarket/" ; ?>' + btnid ;
                    }
                }
            });
            return false;
        });
        
        
        function removeMarket(id){
        showDialog({
            title: 'Delete Market',
            text: 'Are You Sure You Want to Delete?',
            negative: {
                title: 'No'
            },
            positive: {
                title: 'Yes',
                onClick: function (e) {
                    document.location.href = '<?php echo base_url() . "admin/market/removeSymbol/" ; ?>' + id ;
                }
            }
        });
    }
    </script>

</div>

<div class="modal fade" id="addMarket" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

    <div class="modal-dialog">



        <!-- content goes here -->
        <form action="<?php echo base_url(); ?>Admin/market/addMarket" method="post">
            <div class="mdl-card mdl-shadow--6dp">
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">Add Market</h2>
                </div>


                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" name="name" type="text" id="sample1" required>
                    <label class="mdl-textfield__label"  for="sample1">Market Name</label>
                </div>
                
                <div class="mdl-card__actions mdl-card--border">
                    <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect pull-left">Add</button>
                    <button type="reset" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect pull-right">Cancel</button>
                </div>

            </div>
        </form>



    </div>
</div>
<!-- Square card -->











