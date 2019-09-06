      
      <div class="card card-pages">
        
        <div class="card-header bg-img"> 
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Admin Panel</strong> </h3>
        </div>

        <div class="card-body">

          <?php
              if($this->session->flashdata('err_message')){
          ?>
                  <div class="alert alert-danger alert-dismissable hide_alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $this->session->flashdata('err_message'); ?>
                  </div>
          <?php
             }//end if($this->session->flashdata('err_message'))
              
              if($this->session->flashdata('ok_message')){
          ?>
                  <div class="alert alert-success alert-dismissable alert-dismissable hide_alert mt-3">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $this->session->flashdata('ok_message'); ?>
                  </div>
          <?php 
              }//if($this->session->flashdata('ok_message'))
          ?>

          <form class="form-horizontal m-t-20 validate_frm" action="<?php echo SURL; ?>login/login-process" method="post">
              
              <div class="form-group">
                  <input type="text" class="form-control input-lg" placeholder="Enter your login ID" id="email_address" name="email_address" required />
              </div>

              <div class="form-group">
                  <input type="password" class="form-control input-lg" placeholder="Enter your password" id="password" name="password" required minlength="4" maxlength="20" />
              </div>

              <!-- google captcha -->
              <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="6LdOTqkUAAAAAM77EN1gKZhi8IQtYS4ZLuVH1_Wt"></div>
              </div>

              
              
              <div class="form-group text-center">
                  <div class="col-12">
                      <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                  </div>
              </div>

              <!--
              <div class="form-group m-t-20">
                  
                  <div class="col-sm-12">
                    <a href="<?php echo SURL; ?>login/forgot-password"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                  </div>
              
              </div>
              -->
              
          </form> 
        </div>                                 
        
    </div>