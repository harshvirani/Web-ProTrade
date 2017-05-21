<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">

<div class="container" >
  
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
     
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
<!--      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>-->
      <h3>Change Password</h3>
      <form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>User/updatePassword">
        <div class="form-group">
          <label class="col-lg-3 control-label">Old Password</label>
          <div class="col-lg-8">
              <input class="form-control" name="oldPass" type="password">
          </div>
        </div>
          
          <div class="form-group">
          <label class="col-lg-3 control-label">New Password</label>
          <div class="col-lg-8">
              <input class="form-control" name="newPass" type="password">
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Confirm Password</label>
          <div class="col-lg-8">
              <input class="form-control" name="confPass" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Change Password" type="submit">
            <span></span>
            <input onclick="location.href='<?php echo base_url().'profile';?>'" class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    </div>
</main>