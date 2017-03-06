<!-- AANE MAIN CSS MA NAKHVATHI NATHI AAVTU -->
<style type="text/css">

.card-wrap {
  width:340px;
  margin:10px auto;
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
  left:70px;
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
<div class="row mdl-grid">
    
     <?php
            foreach ($users->result_array() as $row) {
//                if ($row['type'] == 'STAFF') {
                    ?>

<div class="col-md-4 card-wrap" id="<?php echo $row['id']; ?>">
  <div class="profile_pic-wrap">
    <img src="https://openclipart.org/download/247319/abstract-user-flat-3.svg" alt="img" />
  </div>
  <div class="info-wrap">
  <h1 class="user-name"><?php echo $row['uname']; ?></h1>
   <h6>EMAIL: <?php echo $row['email']; ?></h6>
   <h6>CONTACT:<?php echo $row['contactNo']; ?></h6>
    <hr>
  </div>
</div>
    
    
    <?php
            }
    ?>

</div>
</main>

</div>


<div class="scrollbar" id="style-1">
    <div class="force-overflow"></div>
</div>
