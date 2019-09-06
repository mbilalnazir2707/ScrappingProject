    
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Users Listing</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="<?php echo SURL; ?>dashboard">Dashboard</a></li>
                        <li>Users Listing</li>
                    </ol>
                </div>
            </div>
            <!-- end row -->

            <div class="row"> 
                <div class="col-xl-12">

                    <table class="table table-hover table-bordered table-striped datatable">
                    
                    	<thead>
                    		<tr>
                    			<th> ID </th>
                    			<th> Title </th>
                    			<th> First Name </th>
                    			<th> Last Name </th>
                    			<th> Email Address </th>
                    			<th> Country </th>                    		
                    		</tr>
                    	</thead>
                    	
                    	<tbody>
                    	
                    		<?php
                    		if($users){
							  foreach($users as $user){
								?>
						
								<tr>
									<td> <?php echo $user['id']; ?> </td>
									<td> <?php echo $user['title']; ?> </td>
									<td> <?php echo $user['first_name']; ?> </td>
									<td> <?php echo $user['last_name']; ?> </td>
									<td> <?php echo $user['email']; ?> </td>
									<td> <?php echo $user['country']; ?> </td>
								</tr>

							  <?php
							  }
							} else {
							?>
							
								<tr>
									<td colspan="6"> No record found </td>
									
								</tr>
							
							<?php } ?>
							
                    	</tbody>
                    	
                    </table>
                    
                </div>

                

            </div>
             <!-- end row -->

         


        </div> <!-- container-fluid -->
                   
    </div> <!-- content -->
