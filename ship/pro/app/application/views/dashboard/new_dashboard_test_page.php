    
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    
                    <h4 class="pull-left page-title"> System Analytics Dashboard </h4>
                    <ol class="breadcrumb pull-right hidden">
                        <li><a href="<?php echo SURL ?>dashboard">Dashboard</a></li>
                        <!--<li class="active">Dashboard</li>-->
                    </ol>
                    
                </div>
            </div>

            <!-- Start Widget -->
            <!--Widget-4 -->
            
			<div class="row">
                            
				<div class="col-lg-3">
				
					<div class="card card-border card-info shadow">
						<div class="card-header"> 
							<h3 class="card-title text-info"> <i class="fa fa-repeat"></i> New Orders</h3> 
						</div> 
						<div class="card-body"> 
							<h2 class="pull-left"> Total </h2>
							<h3 class="text-white pull-right"> <a href="#" class="btn btn-info btn-rounded waves-effect waves-light shadow"> 100 </a> </h3>
						</div> 
					</div>
				</div>
				<div class="col-lg-3">
					<div class="card card-border card-success shadow">
						<div class="card-header"> 
							<h3 class="card-title text-success"> <i class="fa fa-users"></i>  New users</h3> 
						</div> 
						<div class="card-body"> 
							<h2 class="pull-left"> Total </h2>
							<h3 class="text-white pull-right"> <a href="#" class="btn btn-success btn-rounded waves-effect waves-light shadow"> 100 </a> </h3>
						</div> 
					</div>
				</div>
				<div class="col-lg-3">
					<div class="card card-border card-danger shadow">
						<div class="card-header"> 
							<h3 class="card-title text-danger"> <i class="fa fa-dollar"></i> Total Earnings</h3> 
						</div> 
						<div class="card-body"> 
							<h2 class="pull-left"> Total </h2>
							<h3 class="text-white pull-right"> <a href="#" class="btn btn-danger btn-rounded waves-effect waves-light shadow"> $99,89,711 </a> </h3>
						</div> 
					</div>
				</div>
				
				<div class="col-lg-3">
                            
				  <div class="card card-border card-inverse shadow">
					   <div class="card-header"> 
						   <h3 class="card-title text-inverse"> <i class="fa fa-bar-chart"></i> All Selling Leads</h3> 
					   </div>
					   <div class="card-body"> 
							<h2 class="pull-left"> Total </h2>
							<h3 class="text-white pull-right"> <a href="#" class="btn btn-secondary btn-rounded waves-effect waves-light shadow"> 100 </a> </h3>
						</div> 
				   </div>
				
				</div>
				
			</div>
			<!-- end row -->
			
			<div class="row">
				<div class="col-lg-6">
					<div class="card card-border card-info shadow">
						<div class="card-header"> 
							<h3 class="card-title text-info">Sales Stats</h3> 
						</div> 
						<div class="card-body"> 
							 <div id="website-stats" style="height: 320px" class="flot-chart"></div>
						</div> 
					</div>
				</div>

				<div class="col-lg-6">
					<div class="card card-border card-info shadow">
						<div class="card-header"> 
							<h3 class="card-title text-info">Top Selling Leads</h3> 
						</div> 
						<div class="card-body"> 
							<div id="pie-chart">
								<div id="pie-chart-container" class="flot-chart" style="height: 320px">
								</div>
							</div>
						</div> 
					</div>
				</div>
			</div>
			
        </div> <!-- container -->
                   
    </div> <!-- content -->