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
            
            <hr><li>
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
                        <a href="<?php echo base_url().NAV_USERS;?>SUBSCRIBER" tabindex="-1">
                        <i class="sidebar-icon material-icons">person</i>
                        Subscriber
                        <span class="sidebar-badge"><?php echo $sub_cnt; ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url().NAV_USERS;?>STAFF" tabindex="-1">
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

                <a href="<?php echo base_url() . 'market/1'?>" class="ripple-effect dropdown-toggle"  data-toggle="dropdown">
                    <i class="sidebar-icon mdl-color material-icons">account_balance</i>
                    Market
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">

                    <?php
                    foreach ($markets->result_array() as $mar) {
                        ?>

                        <li>
                            <a href="<?php echo base_url() . 'marketview/' . $mar['id']; ?>" tabindex="-1">
                                &nbsp;&nbsp;<i class="sidebar-icon material-icons">trending_up</i>
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
                        <a data-toggle="modal" data-target="#addMarket" tabindex="-1">
                            &nbsp;&nbsp;<i class="sidebar-icon material-icons">add_box</i>
                            Add Market
                        </a>
                    </li>
                </ul>

            </li>

        </ul>
        <!-- Sidebar divider -->
        <!-- <div class="sidebar-divider"></div> -->

        <!-- Sidebar text -->
        <!--  <div class="sidebar-text">Text</div> -->
    </aside>
    
    

</div>


<!-- Square card -->











