<?php 

	include "simple_html_dom.php";
	$postFields = array ("LogEmail" =>  "m.bilal_nazir@yahoo.com",
              "OptIn"=>"yes",
              "WWWRetry" => "0",
              "SavePW" => "Y",
              "ResavePW" => "Y",
              "LastFocus" => "Yellow",
              "IntroTextInUse" => "default",
              "Title" => "N",
              "Title" => "",
              "FirstName" => "",
              "LastName" => "",
              "Email" => "",
              "VerifyEmail" => "",
              "country" => "",
              "Zip" => "",
              "YellowBoxSubmit" => "Go!"
  );
  $ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,"https://www.vacationstogo.com/login.cfm");
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_POST,count($postFields));
	curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($postFields));
	curl_setopt($ch,CURLOPT_COOKIEJAR,"cookie.txt");
	$response = curl_exec($ch);
 

	if($response)
  {
	curl_setopt($ch,CURLOPT_URL,"https://www.vacationstogo.com/ticker.cfm");
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_COOKIEJAR,"cookie.txt");
	$response = curl_exec($ch);
	curl_close($ch);

 
 $html = new simple_html_dom();
 
  $html->load($response);
 
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
          <form action ="<?php echo SURL;?>pages/tickerPost" method = "post">
            <div class="form-row">
              
                <div class="col-6 form-group">
                    <select  name = "SMonth" class="form-control form-control-sm">
                     <?php 
                      foreach($data as $values) {
                        
                      ?>
                        <option value = "<?php echo $values['value'];?>"><?php echo $values['text'];?>  </option>
                       <?php 
                     
                     }
                        ?>
                    </select>
                </div>
                
                <div name = "TMonth "class="col-6 form-group">
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
                <select name ="RegionID"  class="form-control form-control-sm">
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
                <select name = "LineID" class="form-control form-control-sm">
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
                <select name = "ShipID" class="form-control form-control-sm">
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
                <select name = "Lenght" class="form-control form-control-sm">
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
                <select name = "DPortID" class="form-control form-control-sm">
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
                <select name = "VPortID"class="form-control form-control-sm">
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

          </form>  
          </div>
        </div>
        
    </div>
    <div class="col-sm-6">
      <h1 class="text-center"> Find A Bargain </h1>

      <div class="card-body">
             <form action ="<?php echo SURL;?>pages/tickerPost" method = "post">
            <div class="form-row">
              
                <div class="col-6 form-group">
                    <select name = "SMonth" class="form-control form-control-sm">
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
                    <select name = "TMonth" class="form-control form-control-sm">
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
                <select name = "RegionID" class="form-control form-control-sm">
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
                <select name = "LineID" class="form-control form-control-sm">
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
                <select name = "ShipID" class="form-control form-control-sm">
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
                <select name = "Lenght" class="form-control form-control-sm">
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
                <select name = "DPortID" class="form-control form-control-sm">
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
                <select name = "VPortID" class="form-control form-control-sm">
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

          </form>  
        </div>
        
      
      <div class="text-center"> 
    
        <img src="<?php echo ASSETS?>images/bb.png" class="img-fluid" width="100px;" />
        <p>
            Executive Chairman
        </p>
        
        <button class="btn btn-md btn-danger mb-2 "> Our Best Price &amp; Service Guarantee </button>
        
        <hr />
    
        <h3 class="text-danger"> +1-713-974-2121 </h3>
        <h2> Or </h2>
        
        <button class="btn btn-md btn-info mb-4"> Click to inquire about a cruise online </button>
    	
      </div>
      
    </div>
    <div class="col-sm-3">
       
        <div class="card">
          <div class="card-header">
            <h5>   <button class="btn btn-block btn-lg btn-success"> Daily Specials </button>
 </h5>
          </div>
          <div class="card-body">
            
            <div class="form-row">
               
<!--
                <div class="col-6 form-group">
                    <input type="text" class="form-control" placeholder="First Name" />
                </div>
                
                <div class="col-6 form-group">
                    <input type="text" class="form-control" placeholder="Last Name" />
                </div>
                
                <div class="col-6 form-group">
                    <input type="text" class="form-control" placeholder="Contact Number" />
                </div>
                
                <div class="col-6 form-group">
                    <input type="email" class="form-control" placeholder="Email Address" />
                </div>
                
                <div class="col-12 form-group">
                    <input type="text" class="form-control" placeholder="Subject" />
                </div>
                
                <div class="col-12 form-group">
                    <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                </div>
                
                <div class="col-12 form-group">
                    <button class="btn btn-success btn-block"> Send Message </button>
                </div>
                
-->
               


            <div class="today"> <b>New May 17, 2019! </b></div>


            
                  <div class="section">
                    
                      <a href="/mm_page.cfm?promocode=vtg,mm,X6l,hal&incCT=y"><img class="card-img-top" src="https://www.vacationstogo.com/images/ship_pics/small%20ship29.jpg" class="ship" alt="$$$ Four-Day Sale!"/></a>
                    
                      <div class="header"><a href="/mm_page.cfm?promocode=vtg,mm,X6l,hal&incCT=y">$$$ Four-Day Sale!</a></div>
                    
                    <div class="text-center"><b>Holland America</b> is offering our customers huge discounts of up to 75%. Plus, receive shipboard credits of up to $500 per cabin on select voyages.<b> Book by May 20.</b>
                    <a href="/mm_page.cfm?promocode=vtg,mm,X6l,hal&incCT=y" class="one-place">Click here</a>. </div>
                  </div>
                  

                  
                    <hr style="clear:left;"/><br/>
                  
                  <div class="section">
                    
                      <a href="/ticker.cfm?r=0&l=20&incCT=y"><img  class="card-img-top" src="https://www.vacationstogo.com/images/ship_pics/ship%202751.jpg" class="ship" alt="$$$ Exclusive Offer!"/></a>
                    
                      <div class="header"><a href="/ticker.cfm?r=0&l=20&incCT=y">$$$ Exclusive Offer!</a></div>
                    
                    <div class="text-center"><b>Silversea </b>is offering savings of up to 79%, and our customers can also receive an exclusive additional discount of up to 15% off select last-minute departures. Plus, receive shipboard credits of up to $1,100 per cabin on select sailings. Pricing includes onboard gratuities, complimentary beverages including wine and spirits and butler service.<b> Book by May 27. </b>
                    <a href="/ticker.cfm?r=0&l=20&incCT=y" class="one-place">Click here</a>. </div>
                  </div>
                  

                  
                    <hr style="clear:left;"/><br/>
                  
                  <div class="section">
                    
                      <a href="/fastdeal.cfm?deal=12782"><img  class="card-img-top" src="https://www.vacationstogo.com/images/ship_pics/ship%202751.jpg" class="ship" alt="FastDeal # 12782"/></a>
                    
                      <div class="header"><a href="/fastdeal.cfm?deal=12782">FastDeal # 12782</a></div>
                    
                    <div class="text-center">7-night
                      Alaska cruise
                      
                      starting at <b>$444</b> per person!
                      Departs June 14, 2019 on
                      Celebrity's Celebrity Millennium. <a href="/fastdeal.cfm?deal=12782" class="one-place">Click here</a>
                      for more details.
                    </div>
                  </div>

                
            </div>
            
          </div>
        </div>
        
    </div>
  </div>
</div>
