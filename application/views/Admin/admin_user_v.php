<!-- AANE MAIN CSS MA NAKHVATHI NATHI AAVTU -->
<style type="text/css">

.card-wrap {
  width:350px;
  margin:10px 5px;
  background:#e3e3e3;
  position:relative;
  padding:20px; 
  border-radius:5px;
  border-top:33.33px solid #2b9c92;
  font-family: 'Raleway', sans-serif;
}

.profile_pic-wrap {
  width:100px;
  height:100px;
  background:#e3e3e3;
  top:-30px;
  left:80px;
  padding:5px;
  position:absolute;
  margin-left: 50px;
  border-radius:50%; 
  overflow:hidden;
  }
  .profile_pic-wrap img {
    border-radius:50%;
    width: 100%;
  }

.user-name {
  text-align:center;
  margin-top:50px;
}
.user-title {
  text-align:center;
}
.find_me-wrap {
  margin-top:40px;
}
.find-me {
  font:.7em;
}
.info-wrap {
  text-align: center;
}
.icon-wrap a {
  line-height:70px;
  width:24%;
  text-decoration:none;
  padding:0;
  font-size:2em;
  cursor:pointer; 
  margin:0;
  color:darken(#e3e3e3,20);
  transition:color .1s linear;
  }
  .icon-wrap a:hover {
    color:darken(#e3e3e3,40);
    }
</style>
 
<!-- ADD STAFF MEMBER START -->  

<div class="container">
    <div id="addStaff" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">

                    <form id="format" action="<?php echo base_url(); ?>user/addStaff#tab2-panel" method="post">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="name" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">First Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="pass" type="password" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Password</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="pass1" type="password" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Password</label>
                        </div>
                        <div class="modal-footer">
                            <button class="pull-left mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                ADD
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ADD STAFF MEMBER OVER -->


<main class="mdl-layout__content">    

    <!-- TAB_1 START -->
    <section class="mdl-layout__tab-panel is-active " id="tab1-panel">
<!--<div class="mdl-grid">-->
        <div class="row client-row mdl-grid">


            <!--One Client Card-->
            <?php
            foreach ($users->result_array() as $row) {
                if ($row['type'] == 'SUBSCRIBER') {
                    ?>
<div class="card-wrap" id="<?php echo $row['id']; ?>">
  <div class="profile_pic-wrap">
    <img src="https://openclipart.org/download/247319/abstract-user-flat-3.svg" alt="img" />
  </div>
  <div class="info-wrap">
  <h1 class="user-name"><?php echo $row['uname']; ?></h1>
   <h6>EMAIL: <?php echo $row['email']; ?></h6>
   <h6>CONTACT: <?php echo $row['contactNo']; ?></h6>
    <hr>
    <a href="">View More...</a>
  </div>
</div>
<div class="card-wrap" id="<?php echo $row['id']; ?>">
  <div class="profile_pic-wrap">
    <img src="https://openclipart.org/download/247319/abstract-user-flat-3.svg" alt="img" />
  </div>
  <div class="info-wrap">
  <h1 class="user-name"><?php echo $row['uname']; ?></h1>
   <h6>EMAIL: <?php echo $row['email']; ?></h6>
   <h6>CONTACT: <?php echo $row['contactNo']; ?></h6>
    <hr>
    <a href="">View More...</a>
  </div>
</div>
<div class="card-wrap" id="<?php echo $row['id']; ?>">
  <div class="profile_pic-wrap">
    <img src="https://openclipart.org/download/247319/abstract-user-flat-3.svg" alt="img" />
  </div>
  <div class="info-wrap">
  <h1 class="user-name"><?php echo $row['uname']; ?></h1>
   <h6>EMAIL: <?php echo $row['email']; ?></h6>
   <h6>CONTACT: <?php echo $row['contactNo']; ?></h6>
    <hr>
    <a href="">View More...</a>
  </div>
</div>

<!--                     <div class="col-lg-4" id="<?php echo $row['id']; ?>">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="material-icons">account_circle</i> <?php echo $row['uname']; ?></h3><hr>
                                <table>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact:</td>
                                        <td><?php echo $row['contactNo']; ?></td>
                                    </tr>
                                </table>  
                            </div>
                            <div class="panel-body">
                                <div class="text-left">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="text-right" >

                                    <a href="<?php echo base_url() . NAV_USERS . '/removeUser/' . $row['id']; ?>"><i class="material-icons">delete</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
 -->

                    <!--Over One CLient Card-->
                    <?php
                }
            }
            ?>



        </div>

    </section>
    <!-- TAB_1 OVER -->




    <!-- TAB_2 START -->
    <section class="mdl-layout__tab-panel" id="tab2-panel">
        <div class="row client-row">


            <?php
            foreach ($users->result_array() as $row) {
                if ($row['type'] == 'STAFF') {
                    ?>

                    <div class="col-lg-4" id="<?php echo $row['id']; ?>">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="material-icons">account_circle</i> <?php echo $row['uname']; ?></h3><hr>
                                <table>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Contact:</td>
                                        <td><?php echo $row['contactNo']; ?></td>
                                    </tr>
                                </table>  
                            </div>
                            <div class="panel-body">
                                <div class="text-left">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="text-right">
                                    <a href="<?php echo base_url() . 'users/removeUser/' . $row['id']; ?>"><i class="material-icons">delete</i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Over One CLient Card-->
                    <?php
                }
            }
            ?>

        </div>
    </section>
    <!-- TAB_2 OVER -->

</main>

</div>


<div class="scrollbar" id="style-1">
    <div class="force-overflow"></div>
</div>