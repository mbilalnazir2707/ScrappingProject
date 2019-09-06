<div class="container-fluid p-4">
  <div class="row">
    
    <div class="col-md-3">
        
        <div class="mb-2">
            <button class="btn btn-block btn-lg btn-success"> 90-Day Ticker </button>
            <p class="mt-3 text-center"> The world's best last-minute cruise markdowns. </p>
        </div>
        
        <div class="card">
          <div class="card-header">
            <h5> Find A Bargain </h5>
          </div>
          <div class="card-body">
            
            <div class="form-row">
               
                <div class="col-6 form-group">
                    <select class="form-control form-control-sm">
                        <option> From Month </option>
                    </select>
                </div>
                
                <div class="col-6 form-group">
                    <select class="form-control form-control-sm">
                        <option> To Month </option>
                    </select>
                </div>
                
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <option> All Cruise Regions </option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <option> All Cruise Lines </option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <option> All Cruise Ships </option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <option>Length of Cruise </option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <option> All Departure Ports </option>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <option> All Ports or Places to Visit </option>
                </select>
            </div>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" /> Return to Same Port
                </label>
            </div>
            
          </div>
        </div>
        
    </div>
    
    <div class="col-md-9 col-sm-12">
      
      <?php
	  echo ($pages_row['cruise_lines']) ? filter_string($pages_row['cruise_lines']) : '' ;
	  ?>
      
    </div>
    
  </div>
</div>