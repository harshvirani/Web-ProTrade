<!DOCTYPE html>
<html >
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <meta charset="UTF-8">
  <title>PRO-TRADE</title>
</head>
<style type="text/css">
	.mainbody{
		position: fixed; 

	   overflow-y: hidden;
	   top: 0; right: 0; bottom: 0; left: 0;
	}
	.center{
		margin: 10% 30%;
		box-shadow: 0px 0px 30px 0px rgba(67, 41, 122, 0.78);
		background-color: #f5f5f5;
	}
	.center #format{
		padding-left: 34px;
	}
	#signin{
		margin: 3% 15%;
		width: 400px;
		height: 400px;
	}
	#signup{
		margin: 3% 15%;
		width: 400px;
		height: 400px;
	}
</style>
<body>
<div class="mainbody">
  <div class="center">
  
  	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
	  <div class="mdl-tabs__tab-bar">
	      <a href="#signin" class="mdl-tabs__tab is-active">Sign In</a>
	      <a href="#signup" class="mdl-tabs__tab">Sign up</a>
	      
	  </div>

	  <div class="mdl-tabs__panel is-active" id="signin">
              <form id="format" action="<?php echo base_url(); ?>user/validate_user" method="post">
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" name="uname" id="sample3">
		    <label class="mdl-textfield__label" for="sample3">LOGIN ID</label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="password" name="password" id="sample3">
		    <label class="mdl-textfield__label" for="sample3">PASSWORD</label>
		  </div>
<!--		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" id="sample3">
		    <label class="mdl-textfield__label" for="sample3">Text...</label>
		  </div>-->

		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
			  SIGN IN
			</button>
		</form>
	  </div>

	  <div class="mdl-tabs__panel" id="signup">
              <form id="format" action="<?php echo base_url(); ?>user/Register" method="post">
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" name="name" type="text" id="sample3">
		    <label class="mdl-textfield__label" for="sample3">First Name</label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" name="pass" type="password" id="sample3">
		    <label class="mdl-textfield__label" for="sample3">Password</label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" name="email" type="email" id="sample3">
		    <label class="mdl-textfield__label" for="sample3">Email ID</label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" name="mob" type="number" id="sample3">
		    <label class="mdl-textfield__label" for="sample3">Contact NO.</label>
		  </div>

		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
		  	SIGN UP
			</button>
		</form>
	  </div>
	  
	</div>
  </div>
  

</div>    
</body>
</html>
