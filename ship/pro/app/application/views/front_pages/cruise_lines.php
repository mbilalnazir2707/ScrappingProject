    
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Cruise lines</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?php echo SURL; ?>dashboard">Dashboard</a></li>
                        <li>Cruise lines</li>
                    </ol>
                </div>
            </div>
            <!-- end row -->

            <div class="row"> 
                <div class="col-xl-12">

                    <?php
                      if($this->session->flashdata('err_message')){
                    ?>
                      <div class="alert alert-danger hide_alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('err_message'); ?>
                      </div>
                    <?php
                      }//end if($this->session->flashdata('err_message'))
                      if($this->session->flashdata('ok_message')){
                    ?>
                      <div class="alert alert-success hide_alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('ok_message'); ?>
                      </div>
                    <?php 
                      }//if($this->session->flashdata('ok_message'))
                    ?>

					<form action="" method="post">

					   <div class="form-group">
						 <label>Description</label>
						 <textarea id="service_description" name="cruise_lines" class="form-control ckeditor" required><?php echo ($get_front_pages_contents['cruise_lines']) ? filter_string($get_front_pages_contents['cruise_lines']) : '' ; ?></textarea>
					   </div>
					   
					   <div class="form-group">
						
							<button type="submit" class="btn btn-md btn-success"> Save Now </button>
						
					   </div>
					
					</form>
                    
                </div>

                

            </div>
             <!-- end row -->

         


        </div> <!-- container-fluid -->
                   
    </div> <!-- content -->
