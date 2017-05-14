<main class="mdl-layout__content mdl-color--grey-100">
    <div class="mdl-grid demo-content">

<div class="container" >
  
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
       

        <h6><a href="<?php echo base_url();?>user/upload_picture">Upload a different photo...</a></h6>
        <!-- <input type="file" class="text-center center-block well well-sm"> -->
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
<!--      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>-->
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>/User/updateProfile">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
              <input class="form-control" name="name" value="<?php echo $profile->name;?>" type="text">
          </div>
        </div>
<!--        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="Bishop" type="text">
          </div>
        </div>-->
        <div class="form-group">
          <label class="col-lg-3 control-label">Contact</label>
          <div class="col-lg-8">
              <input class="form-control" name="contactNo" value="<?php echo $profile->contactNo;?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
              <input class="form-control" name="email" value="<?php echo $profile->email;?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Username:</label>
          <div class="col-md-8">
              <input class="form-control" value="<?php echo $_SESSION['uname'];?>" type="text" disabled="true">
          </div>
        </div>
<!--        <div class="form-group">
          <label class="col-lg-3 control-label">Password:</label>
          <div class="col-lg-8">
              <input class="form-control" name="password" type="text">
          </div>
        </div>-->
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    </div>
</main>