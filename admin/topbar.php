      <!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p>&nbsp;</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
         
                <div class="login">
                
                <a title="<?php echo $name; ?> ( <?php echo $session_access; ?> ) account settings" href="#" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block"><?php echo $name; ?> <small>( <?php echo $session_access; ?> )</small></span></a>
                <a title="Log out <?php echo $name; ?> ( <?php echo $session_access; ?> )" data-toggle="modal" data-target="#logout-modal" class="login-btn" href="#"><i class="fa fa-sign-out"></i><span class="d-none d-md-inline-block">Log Out</span></a>
                
                </div>
                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Top bar end-->
      

      <!-- Login Modal-->
      <div id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Logout User</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
            </div>
            <div class="modal-body">
                
                <h3 class="text-center">Do you wish to log out?</h3>
                <br />
                <p class="text-center">
                  <a href="logout.php" class="btn btn-template-outlined"><i class="fa fa-sign-out"></i> Log out</a>
                </p>
 
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->