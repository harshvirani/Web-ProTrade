<!-- AANE MAIN CSS MA NAKHVATHI NATHI AAVTU -->
<style type="text/css">




.mdl-card--horizontal {
  flex-direction: column;
  height: 1vh; /* 1 */
  padding-left: 150px;
  width: 100%;
  
  .mdl-card__media {
    left: 0;
    position: absolute;
    width: 150px;
  }
  
  .mdl-card__supporting-text {
    flex: 1 1 auto;
    width: auto;
  }
}

.mdl-card--horizontal-2 {
  flex-direction: row;
  flex-wrap: wrap;
  min-height: 0px;
}  
  .mdl-card__title {
    align-items: flex-start;
    flex-direction: column;
    flex: 1 auto;
    float: left;
  }
  .mdl-card__title-text {
    align-self: flex-start;
  }
  .mdl-card__media {
    flex: 0 auto; 
    float: right;
    height: 112px;
    margin: 16px 16px 0 0;
    width: 112px;
  }
  .three-btn{
   flex: 0 auto; 
    float: right;
    
    margin: 5px 16px 16px 0;
    width: 112px; 
  }
  .mdl-card__actions {
    clear: both;
    flex: 1 auto; 
    padding: 8px 0 8px 8px;
  }
  .three-btn i{
    padding-left: 10px;
    cursor: pointer;
  }
  .mdl-card__actions a{
    text-decoration: none;
  }

</style>

<!-- ADD STAFF MEMBER START -->

<!--<div class="container">
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
 ADD STAFF MEMBER OVER -->

<main class="mdl-layout__content">
<div class="row mdl-grid">
    
     <?php
            foreach ($users->result_array() as $row) {
//                if ($row['type'] == 'STAFF') {
                    ?>

<div class="mdl-card mdl-shadow--2dp mdl-card--horizontal-2">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text"><?php echo $row['uname']; ?></h2><br/>
    <div class="mdl-card__subtitle-text">Status :-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['status']; ?><br>Contact :-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['contactNo']; ?></div>
  </div>
  <div class="mdl-card__media">
    <img src="http://placehold.it/112x112/DC143C/FFFFFF" alt="img">
  </div>
  <div class="mdl-card__actions">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">More Info</a>
 <div class="three-btn">
    <i id="tt1" class="material-icons">mode_edit</i>
    <i id="tt2" class="material-icons">block</i>
    <i id="tt3" class="material-icons">delete_forever</i>
      <div class="mdl-tooltip" data-mdl-for="tt1">
          Edit
      </div>
      <div class="mdl-tooltip" data-mdl-for="tt2">
          Block
      </div>
      <div class="mdl-tooltip" data-mdl-for="tt3">
          Delete
      </div>
  </div>
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
