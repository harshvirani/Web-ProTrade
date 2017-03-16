  <style type="text/css">
  .mdl-card--horizontal-2 {
    flex-direction: row;
    flex-wrap: wrap;
    min-height: 0px;
    background: #626262;
    -webkit-box-shadow: 6px 6px 34px -2px rgba(158,220,222,1);
    -moz-box-shadow: 6px 6px 34px -2px rgba(158,220,222,1);
    box-shadow: 6px 6px 34px -2px rgba(158,220,222,1);
    margin-bottom: 10px;
  }  
    .mdl-card__title {
      align-items: flex-start;
      flex-direction: column;
      flex: 1 auto;
      float: left;
    }
    .mdl-button.mdl-button--colored{
      color: #FFFFFF;
      background: #37474f;
      border-radius: 7px;
      font-weight: 300;
    }
    .mdl-card__title-text {
      align-self: flex-start;
      color: #FFFFFF;
    }
    .mdl-card__subtitle-text{
      color: #FFFFFF;
      line-height: 1.5em;
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
      color: #FFFFFF;
      margin: 0px 16px 16px 0;
      width: 112px; 
    }
    .mdl-card__actions {
      clear: both;
      flex: 1 auto; 
      padding: 8px 0 8px 8px;
    }
    .three-btn i{
      display: inline-block;
      margin: 5px;
      cursor: pointer;
    }
    .mdl-card__actions a{
      text-decoration: none;
    }

  </style>
<script>
    
     $('.blockUser').click(function () {
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
        
        
        function blockUser(id,type){
        showDialog({
            title: 'Block User',
            text: 'Are You Sure You Want to Block?',
            negative: {
                title: 'No'
            },
            positive: {
                title: 'Yes',
                onClick: function (e) {
//                    alert(type)
                    document.location.href = '<?php echo base_url() . "admin/users/blockUser/" ; ?>' + id+'/'+type ;
                }
            }
        });
        }
        
        
        function unblockUser(id,type){
        showDialog({
            title: 'Unblock User',
            text: 'Are You Sure You Want to UnBlock?',
            negative: {
                title: 'No'
            },
            positive: {
                title: 'Yes',
                onClick: function (e) {
//                    alert(type)
                    document.location.href = '<?php echo base_url() . "admin/users/unblockUser/" ; ?>' + id+'/'+type ;
                }
            }
        });
        }
        
        
        function deleteUser(id,type){
        showDialog({
            title: 'Delete Market',
            text: 'Are You Sure You Want to Delete?',
            negative: {
                title: 'No'
            },
            positive: {
                title: 'Yes',
                onClick: function (e) {
//                    alert(type)
                    document.location.href = '<?php echo base_url() . "admin/users/removeUser/" ; ?>' + id+'/'+type ;
                }
            }
        });
    }
    </script>
  <main class="mdl-layout__content">
  <div class="row mdl-grid">
    <div class="col-md-4">
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
      <i id="<?php echo $row['id']; ?>" class="material-icons">mode_edit</i>
      <?php if($row['status']=='BLOCKED'){?>
      <i id="<?php echo $row['id']; ?>" onclick="unblockUser(this.id,'<?php echo $row['type']; ?>')" class="unblockUser material-icons">block</i>
      <?php }else{?>
      <i id="<?php echo $row['id']; ?>" onclick="blockUser(this.id,'<?php echo $row['type']; ?>')" class="blockUser material-icons">block</i>
      <?php }?>
      <i id="<?php echo $row['id']; ?>" onclick="deleteUser(this.id,'<?php echo $row['type']; ?>')" class="material-icons">delete_forever</i>
        <div class="mdl-tooltip" data-mdl-for="tt1">Edit</div>
        <div class="mdl-tooltip" data-mdl-for="tt2">Block</div>
        <div class="mdl-tooltip" data-mdl-for="tt3">Delete</div>
    </div>
    </div>
  </div>
      
      <?php
              }
      ?>
  </div>
  </div>
  </main>

  </div>


  <div class="scrollbar" id="style-1">
      <div class="force-overflow"></div>
  </div>
