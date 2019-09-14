<?php
include "simple_html_dom.php";
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,"https://www.vacationstogo.com");
  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1 );
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  //curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
  
  $result = curl_exec($ch);
  curl_close($ch);
  $html = new simple_html_dom();
  $html->load($result);
  $element =$html->find('select',0)->find('option');
  foreach ($element as $elemen)
  {
    $data[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
  }
   $element =$html->find('select',1)->find('option');
  foreach ($element as $elemen)
  {
     $data1[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
    
  }
 $element =$html->find('select',2)->find('option');

  foreach ($element as $elemen)
  {
    $data2[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
    
    
  }
  
 $element =$html->find('select',3)->find('option');
  foreach ($element as $elemen)
  {
     $data3[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
    
  }
  
  $element =$html->find('select',4)->find('option');
  foreach ($element as $elemen)
  {
    $data4[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
    
    
  }
  
 $element =$html->find('select',5)->find('option');
  foreach ($element as $elemen)
  {
     $data5[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
    
  }

 $element =$html->find('select',6)->find('option');

  foreach ($element as $elemen)
  {
    $data6[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
    
    
  }
  
 $element =$html->find('select',7)->find('option');
  foreach ($element as $elemen)
  {
     $data7[] = array(
      "text" => $elemen->plaintext,
      "value" => $elemen->value);
    
  }


?>
<div class="container-fluid" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-3">
        
        <div class="mb-2">
            <button class="btn btn-block btn-lg btn-success"> 90-Day Ticker </button>
            <p class="mt-2 text-center"> The world's best last-minute cruise markdowns. </p>
        </div>
        
        <div class="card">
          <div class="card-header">
            <h5> Find A Bargain </h5>
          </div>
          <div class="card-body">
            
            <div class="form-row">
               
                <div class="col-6 form-group">
                    <select class="form-control form-control-sm">
                     <?php 
                      foreach($data as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                    </select>
                </div>
                
                <div class="col-6 form-group">
                    <select class="form-control form-control-sm">
                        <?php 
                      foreach($data1 as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                    </select>
                </div>
                
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <?php 
                      foreach($data2 as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <?php 
                      foreach($data3 as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <?php 
                      foreach($data4 as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                   <?php 
                      foreach($data5 as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <?php 
                      foreach($data6 as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                </select>
            </div>
            
            <div class="form-group">
                <select class="form-control form-control-sm">
                    <?php 
                      foreach($data7 as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" /> Return to Same Port
                </label>
            </div>

            <div class="form-group">
                <label>
                    <input type="submit" value ="Show Me the Deals" name ="deals" />
                </label>
            </div>

            
          </div>
        </div>
        
    </div>
    
    <div class="col-md-9 col-sm-12">
      
      <?php
	  echo ($pages_row['my_account']) ? filter_string($pages_row['my_account']) : '' ;
	  ?>
            
    </div>
    
  </div>
</div>