<?php
  include "simple_html_dom.php";
	
  $sm = $data["SMonth"];
	$tm = $data["TMonth"];
	$r = $data["RegionID"];
	$l = $data["LineID"];
	$s = $data["ShipID"];
	$n = $data["Lenght"];
	$d = $data["DPortID"];
	$v = $data["VPortID"];
	
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
	curl_setopt($ch,CURLOPT_POST,$postFields);
	curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($postFields));
	curl_setopt($ch,CURLOPT_COOKIEJAR,"cookie.txt");
	//curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
	$response = curl_exec($ch);
	
	if($response)
	{
		$url = "https://www.vacationstogo.com/ticker.cfm?r=$r&sm=$sm&tm=$tm&l=$l&s=$s&n=$n&d=$d&v=$v&edged=1";
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$response = curl_exec($ch);
		curl_close($ch);

    $html = new simple_html_dom();
		//$html->load($response);
    
   $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($response);
    libxml_clear_errors();
    $xpath = new DOMXpath($dom);
    $data = array();
    $table_rows = $xpath->query('//table[@class="tic BodyContentWidth"]/tr[@class="hiLite"]');
    
    foreach($table_rows as $row => $tr)
    {
      foreach($tr->childNodes as $td)
      {
        $data[$row][] = preg_replace('~[\r\n]+~','', trim($td->nodeValue));
      }
      $data[$row] = array_values(array_filter($data[$row]));
    }  



// this foreach extract the all view ports of the page which are selected and explode the url on the id bases  then save it in an array with its plaintext. 		
  /*  foreach ($html->find('a[href^=cruiseports/viewport.cfm?]') as $tag) {
      
      $url = $tag->href;
   
      $viewPort = explode("/",$url);
      $viewPort = $viewPort[count($viewPort)-1];
      $viewPort = explode("?",$viewPort);
      $viewPort = $viewPort[count($viewPort)-1];
      $viewPort = explode("&",$viewPort);
      $port = $viewPort[0];
      
    
     $links[] = array(
      "viewport" => $port,
      "text" => $tag->plaintext
    );
	}
  
*/

// this foreach extract the all view ships of the page which are selected and explode the url on the id bases  then save it in an array with its plaintext.

    /*foreach ($html->find('a[href^="ship.cfm?]') as $tag) {
      
      $url = $tag->href;
      $ship = explode("?",$url);
      $ship = $ship[count($ship)-1];
      $ship = explode("&",$ship);
      $Ship = $ship[0];
      
     $links1[] = array(
      "Ship" => $Ship,
      "text" => $tag->plaintext
    );
  }
*/

// this foreach extract the all view cruise line of the page which are selected and explode the url on the id bases  then save it in an array with its plaintext.

  /*foreach($html->find('a[href^="cruise_lines/]') as $tag)
    {
        $url = $tag->href;
        $crusieline = explode("/",$url);
        
        $crusieline = $crusieline[count($crusieline)-1];
        $crusieline = explode(".",$crusieline);
        $crusieLine = $crusieline[0];
        $links3[] = array(
          "crusieLine" => $crusieLine,
          "text" => $tag->plaintext
       );
    }
*/

// this foreach extract the all view fast deals of the page which are selected and explode the url on the id bases  then save it in an array with its plaintext.

  /*foreach ($html->find('a[href^="fastdeal.cfm?]') as $tag) {
      
      $url = $tag->href;
      $deal = explode("?",$url);
      $deal = $deal[count($deal)-1];
      $deal = explode("&",$deal);
      $deal = $deal[count($deal)-2];
      $deal = explode("=",$deal);
      $Deal = $deal[count($deal)-1];
      $links2[] = array(
      "Deal" => $Deal,
      "text" => $tag->plaintext
    );
  }*/
}
    /*echo "<pre>";
    print_r($links3);
		die;*/

?>

<!-- Copyright (c) 2019 by VacationsToGo.com. All rights reserved. -->

  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">


<HTML>
<HEAD>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<TITLE>Find A Bargain</TITLE>
<STYLE TYPE="text/css">
TD {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
}
.vtgtdleft {
	font-size: 11px;
	font-family: Arial, Helvetica, sans-serif;
	text-align: left;
}
.vtgtdright {
	text-align: right;
}
.vtgticfont {
font-size: 11px;
font-family: Arial, Helvetica, sans-serif;
}
.vtgticfont2 {
font-size: 12px;
font-family: Arial, Helvetica, sans-serif;
}
.vtgticfont3 {
font-size: 13px;
font-family: Arial, Helvetica, sans-serif;
}
.vtgticfont4 {
	font-size: 16px;
	font-family: Times New Roman, Times, serif;
}
.vtgticfont5 {
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
}
.vtgticfont6 {
font-size: 17px;
font-family: Arial, Helvetica, sans-serif;
}
.vtgticfont7 {
font-size: 20px;
font-family: Arial, Helvetica, sans-serif;
}
a.dealnav:link { color: #0000ff;}
a.dealnav:visited { color: #800080;}
a.dealnav:hover { color: #800080;}
a.dealnav:active { color: #800080; }

#tooltip {
    padding: 3px;
    background: #ffffe1;
    border: 1px solid #000000;
    text-align: left;
}

span.tip {
		color: #ff0000;
		font-weight: bold;
}

</STYLE> <STYLE TYPE="text/css">
  body {
    margin: 0px;
    text-align: center;
    background-color: #B3CEFB;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
    color: black;
    -webkit-text-size-adjust: 100%;
  }

  table {
    margin: 0px auto;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
  }

  a:link { color: MediumBlue; text-decoration: none; }
  a:hover { color: red; text-decoration: underline;}
  a:visited { color: MediumBlue; text-decoration: none; }
  a:visited:hover { color: red; text-decoration: underline; }

  a.one-place { text-decoration: underline!important; white-space: nowrap; }
  
  
  #BodyContainer {
    width: 980px;
    margin: 0px auto 0px auto;
    background-color: white;
    padding: 10px 0px 0px 0px;
  }
  
  .BodyContentWidth { width: 100%; }
  
  #ContentContainer {
    vertical-align: top;
    padding-top: 0px;
    padding-left: 15px;
    padding-bottom: 5px;
    padding-right: 15px;
  }

  h1 {
    margin: 10px 0px 0px 0px;
    padding-bottom: 17px;
    padding-top: 5px;
    text-align: center;
    color: #404040;
    font-family: Tahoma, Arial, Helvetica, sans-serif;
    font-weight: bold;
    font-size: 24px;
  }

  P.FirstP { margin-top: 0px; }
  select { font-family: Arial, Helvetica, sans-serif; font-size: 13px; }
  
  .inline-column {
    display: inline-block;
    text-align: left;
    vertical-align: top;
    white-space: nowrap;
  }


  .vAlignT { vertical-align: top; }
  .vAlignM { vertical-align: middle; }
  .vAlignB { vertical-align: bottom; }

  .tAlignL { text-align: left; }
  .tAlignC { text-align: center; }
  .tAlignR { text-align: right; }
  
  .one-place { white-space: nowrap; }
  .yellow-hilite { background-color: yellow; padding: 0px 2px 0px 2px; }

  .padL30 { padding-left: 30px; }
  .padL50 { padding-left: 50px; }

  #SMTD, #SMTD2 { margin-top: 0px; margin-bottom: 0px; }
  #SMTD .comment { font-size: 12px; color: red; }
  .select100 { width: 100px; }


  
  #TopMenuBar {
    margin-bottom: 7px;
    width: 100%;
    height: 28px;
    background-image: url(/images/menu_t.png);
    background-position: left top;
    background-repeat: repeat-x;
  }
  
  .TopMenuItem {
    text-align: center;
    vertical-align: middle;
    padding: 0px 39px 0px 0px;
    font-weight: bold;
  }

  .TopMenuItemR {
    text-align: center;
    vertical-align: middle;
    padding: 0px 5px 0px 0px;
    font-weight: bold;
  }
  
  .VtgIcon td { white-space: nowrap; text-align: center; }
  .VtgIcon td.IconText { text-align: center; line-height: 1.1em; }
  
  #TopMenuSpeakTo { font-size: 16px; color: black; font-weight: bold; }
  #TopMenuPhone { font-size: 22px; color: red; font-weight: bold; }
  #TopMenuPhone a[href^="tel"] { color: red!important; text-decoration:none; }

  #FooterSpeakToImg { font-size: 14px; color: black; font-weight: bold; }
  #FooterSpeakTo { font-size: 14px; color: black; font-weight: bold; }
  #FooterPhone { font-size: 24px; color: red; font-weight: bold; }
  #FooterPhone a[href^="tel"] { color: red!important; text-decoration:none; }

  span.container-top-sites { display: inline-block; line-height: 1em; text-align: center; }
  span.top-sites-padL { padding-left: 7px; }
  span.top-sites-padR { padding-right: 8px; }
  span.top-sites-separator { border-right: 1px solid black; }
  
  a.topnav:link { color: white; }
  a.topnav:hover { color: white; }
  a.topnav:visited { color: white; }
  a.topnav:visited:hover { color: white; }

  a.topnav-lang:link { color: #404040; }
  a.topnav-lang:hover { color: red; }
  a.topnav-lang:visited { color: #404040; }
  a.topnav-lang:visited:hover { color: red; }

  a.topnav-sites:link { color: MediumBlue; }
  a.topnav-sites:hover { color: red; }
  a.topnav-sites:visited { color: MediumBlue; }
  a.topnav-sites:visited:hover { color: red; }


  

  #LeftMenu {
    text-align: left;
    vertical-align: top;
    width: 195px;
    padding-left: 15px;
  }
  
  #LeftMenu .MenuGroup {
    margin-bottom: 0px;
    padding-bottom: 7px;
    background-color: #E8E8C8;
  }

  #LeftMenu .MenuGroup2 {
    margin-bottom: 0px;
    padding-bottom: 7px;
    background-color: #E8E8C8;
  }

  #LeftMenu .MenuGroup3 {
    padding-bottom: 7px;
    background-color: #E8E8C8;
  }
  
  #LeftMenu .MenuGroupHeader {
    margin-bottom: 5px;
    background-color: #CFD094;
    font-size: 14px;
    font-weight: bold;
    padding-top: 3px;
    padding-bottom: 3px;
    text-align: center;
  }
  
  #LeftMenu .MenuGroupHeader3 {
    margin-bottom: 5px;
    background-color: #CFD094;
    font-size: 14px;
    font-weight: bold;
    padding-top: 3px;
    padding-bottom: 3px;
    text-align: center;
  }
  
  #LeftMenu .MenuGroupEntries {
    padding: 0px 8px 0px 12px;
  }


  select.left-menu-fab { width: 185px; margin-top: 3px; font-size: 12px; }
  select.left-menu-fab-from { width: 98px; font-size: 12px; }
  select.left-menu-fab-to { margin-left: 1px; width: 86px; font-size: 12px; }




  #footer {
    margin-top: 7px;
    width: 100%;
    background-color: #E8E8C8;
    padding-top: 12px;
    padding-bottom: 10px;
    font-size: 12px;
    color: black;
  }
  
  #footer table { font-size: 12px!important; color: black!important; }
  #footer td { text-align: left!important; vertical-align: top!important; white-space: nowrap; font-size: 12px!important; }
  


  
  .Gutters { margin-left: 0px; margin-right: 50px; }
  .GutterL { margin-left: 50px; }
  .GutterR { margin-right: 50px; }




  .SearchContainer { padding: 8px; }
  .SearchContainer form { margin: 0px; }
  .no-message { color: #e8e8c8; font-weight: bold; display: none; }
  .warning-message { color: red; font-weight: bold; display: none; }
  
  .SearchContainer .SearchHeader {
    background-image: url(/images/searchhdry.jpg);
    background-position: bottom left;
    background-repeat: repeat-x;
    font-size: 18px;
    color: black;
    font-weight: normal;
  }
  
  .SearchContainer .fab { text-align: left; vertical-align: top; white-space: nowrap; }
  .SearchContainer .fab-comment { width: 75%; padding-left: 20px; text-align: left; vertical-align: top; color: red; font-size: 12px; }


  .SearchContainer .fab-comment-black { width: 75%; padding-left: 20px; text-align: left; vertical-align: top; color: black; font-size: 12px; }
  

  
  #BlendSlidesContainer { position: relative; width: 275px; height: 225px; }
  #Slide0 { position: absolute; top: 0; left: 0; z-index: 10; }
  #Slide1 { position: absolute; top: 0; left: 0; }
  #BtnRunPause { font-size: 11px; }
  


  #ttTrigger { cursor: pointer; }

  .MoreInfo { background-color: #ddd; margin-bottom: 5px; padding-bottom: 5px; }
  .MoreInfo .InfoHeader {
    height: 35px;
    background-image: url(/images/right_hdr.jpg);
    background-position: top;
    background-repeat: no-repeat;
    padding-top: 8px;
    text-align: center;
    font-weight: bold;
  }
  .MoreInfo .InfoGroup { margin-bottom: 5px; text-align: center; padding: 0px 5px 0px 5px; }


  table.prcDefault { background-color: FloralWhite; }


  p.NoYellowBg table { background-color: white!important; color: red!important; font-weight: bold; }

  
  a.poem:link {  color: red; font-weight: normal; font-size: 18px; text-decoration: none; border-bottom: 2px dotted green; }
  a.poem:hover { color: blue; text-decoration: none; border-bottom: 2px dotted red; }
  a.poem:visited {  color: red; font-weight: normal; font-size: 18px; text-decoration: none; border-bottom: 2px dotted green; }
  a.poem:visited:hover { color: blue; text-decoration: none; border-bottom: 2px dotted red; }
  
  a.poem2:link {  color: green; font-weight: normal; font-size: 16px; font-weight: bold; text-decoration: none; border-bottom: 2px dotted green; }
  a.poem2:hover { color: blue; text-decoration: none; border-bottom: 2px dotted red; }
  a.poem2:visited {  color: green; font-weight: normal; font-size: 16px; font-weight: bold; text-decoration: none; border-bottom: 2px dotted green; }
  a.poem2:visited:hover { color: blue; text-decoration: none; border-bottom: 2px dotted red; }
  
  .whitespace { border: 3px solid white; }
  .whitespacetop { border-top: 3px solid white; }
  .whitespacebottom { border-bottom: 3px solid white; }
  .whitespaceleft { border-left: 3px solid white; }
  .whitespaceright { border-right: 3px solid white; }


  a.tel-phone-num:link { color: inherit; text-decoration: none; }
  a.tel-phone-num:hover { color: inherit; text-decoration: none; }
  a.tel-phone-num:visited { color: inherit; text-decoration: none; }
  a.tel-phone-num:visited:hover { color: inherit; text-decoration: none; }


   .vtgfont1 {
   font-size: 12px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: red;
   }
   .vtgfont1b {
   font-size: 12px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: blue;
   }
   .vtgicon {
   font-size: 10px;
   font-family: Tahoma;
   font-weight: bold;
   color: blue;
   }
   .vtgfont1a {
   font-size: 12px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   text-decoration: none;
   }
   .vtgfont2 {
   font-size: 12px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: black;
   }
   .vtgfont3 {
   font-size: 14px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: black;
   }
   .vtgfont4 {
   font-size: 15px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: black;
   }
   .vtgfont5 {
   font-size: 19px;
   font-family: Arial, Helvetica, sans-serif;
   }
   .vtgfont6 {
   font-size: 13px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   }
   .vtgfont7 {
   font-size: 16px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: black;
   }
   .vtgfont8 {
   font-size: 18px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: black;
   }
   .vtgfont9 {
   font-size: 13px;
   font-family: Arial, Helvetica, sans-serif;
   }
   .vtgfont10 {
   font-size: 14px;
   color: red;
   }
   .vtgfont11 {
   font-size: 14px;
   }
   .vtgfont11b {
   font-size: 14px;
   color: black;
   }
   .vtgfont11r {
   font-size: 14px;
   color: red;
   }
   .vtgfont12 {
   font-size: 13px;
   }
   .vtgfont12b {
   font-size: 13px;
   color: black;
   }
   .vtgfont13 {
   font-size: 18px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
    font-style: italic;
   color: black;
   }
   .vtgfont13b {
   color: black;
   }   
   .vtgfont14 {
   color: red;
   font-weight: bold;
   } 
   .vtgfont15 {
   color: red;
   }
   .vtgfont16 {
   font-size: 13px;
   font-family: Arial, Helvetica, sans-serif;
   color: black;
   }
   .vtgfont17 {
   font-size: 13px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: red;
   }
   .vtgfont18 {
   font-size: 13px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: black;
   }
   .vtgfont19 {
   font-size: 18px;
   font-family: Arial, Helvetica, sans-serif;
   color: black;
   }
   .vtgfont20 {
   font-size: 20px;
   font-family: "Arial Black", Helvetica, sans-serif;
   font-weight: bold;
   font-style: italic;
   color: red;
   }
   .vtgfont21 {
    font-size: 20px;
    font-family: "Arial Black", Helvetica, sans-serif;
    font-weight: bold;
    color: blue;
    }
   .vtgfont22 {
   color: red;
   text-decoration: underline;
   }
   .vtgfont23 {
   font-size: 18px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: black;
   text-decoration: none;
   }
   .vtgfont24 {
   font-size: 18px;
   font-family: "Arial Black", Helvetica, sans-serif;
   font-weight: bold;
   font-style: italic;
   color: red;
   }
   .vtgfont25 {
   font-size: 18px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: blue;
   text-decoration: none;
   }   
   .qdroplist {
   font-size: 10px;
   }
   .dailysp {
   font-size: 14px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   color: red;
   }
   .amenities {
   font-size: 12px;
   }
   .ship_desc {
   font-size: 13px;
   color: black;
   font-family: Arial, Helvetica, sans-serif;
   }
   .ship_list {
   font-size: 10px;
   color: black;
   font-family: Arial, Helvetica, sans-serif;
   }
   hr.h2w460 {
   color: red;
   height: 2px;
   width: 460px;
   }
   .deal {
    font-size: 24px;
    font-family: "Arial Black";
    font-weight: bold;
    color: blue;
    }
    .phone {
    font-size: 24px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    color: red;
    }
    .emphasized {
    font-weight: bold;
    }

  table.worldlist .WC-Header { padding-right: 75px; }
  table.worldlist th { font-weight: bold; background-color: red; color: white; }
  table.worldlist tr.vtgticheader td { font-size: 11px; font-weight:bold; }
  table.worldlist .vtgtdleft { padding-left:4px;font-size: 11px; text-align: left; }
  table.worldlist .vtgticfont { font-size: 11px; }
  table.worldlist .vtgticfont4 {font-size: 16px; font-family: Times New Roman, Times, serif; }
</STYLE>

<LINK HREF="/css/fab.css" REL="stylesheet" TYPE="text/css">

<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" SRC="/js/fab_specialregion.js"></SCRIPT>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" SRC="/js/fab_tooltips.js"></SCRIPT>


<style type="text/css">
  div.CCFloat { width: 80px; text-align: left; white-space: nowrap; margin-bottom: 8px; float: left; }
  div.CCFloat img { width: 32px; vertical-align: middle; border: 0px; }
  div.CCnoFloat { width: 80px; text-align: center; white-space: nowrap; margin: auto auto 13px auto; }
  div.CCnoFloat img { width: 32px; vertical-align: middle; border: 0px; }

  a.u:link { text-decoration: underline; }
  a.u:hover { text-decoration: underline; }
  a.u:visited { text-decoration: underline; }
  a.u:visited:hover { text-decoration: underline; }

  /* These are used in ticker cells */
  table.tic { width: 100%; padding-left: 0px; padding-right: 0px; }
  .vtgticheader { background-color: red; color: white; font-weight: bold; }
	.vtgticheader a[href^="tel"] { color: white!important; text-decoration:underline; }

  .padL8 { padding-left: 8px; }
  .padR8 { padding-right: 8px; }

  .fd { width: 8%; } /* DealNum */
  .dy { width: 5%; } /* Days */

  
    .sd { width: 6%; }
    .dp { width: 13%; } /* Departing Port */
    .ep { width: 13%; } /* Ending Port */
    .ls { width: 19%; } /* Line / Ship */
    .rt { width: 5%; } /* Rating */
    .pr { width: 7%; } /* Brochure Price */
    .pn { width: 6%; } /* Our Price */
    .pd { width: 5%; } /* Percent Discount */
    .ms { width: 13%; } /* Status */
  

  .ods { background-color: #33FF00; font-weight: bold; }
  .bB { background-color: blue; font-weight: bold; }
  .bR { background-color: red; font-weight: bold; }
  .bY { background-color: yellow; font-weight: bold; }
  .cW { color: white; font-weight: bold; }
  .cR { color: red; font-weight: bold; }
  .cY { color: yellow; font-weight: bold; }

  div.Centered750 { text-align: center; width: 725px; margin-left: auto; margin-right: auto; }
  div.Centered525 { text-align: center; width: 525px; margin-left: auto; margin-right: auto; }


  a.ticker-phone-num:link { color: inherit; text-decoration: none; }
  a.ticker-phone-num:hover { color: inherit; text-decoration: none; }
  a.ticker-phone-num:visited { color: inherit; text-decoration: none; }
  a.ticker-phone-num:visited:hover { color: inherit; text-decoration: none; }
</style>

</HEAD>







<body onLoad="initRegionForm(0)">


  
  
  
  
  




  <div id="BodyContainer">

              
               
    <!-- DisneyWorld:N -->
    
    
    
    <img src="/images/ani_bargain.gif" width="950" height="50" border="0" alt="Find A Bargain"/>
    
  <!-- UseRCPhone:N -->



<div class="tic BodyContentWidth">
  
  <div align="center" style="margin-left:auto; margin-right:auto;">
    
    <br/>
    <div class="vtgtdleft" style="width:915px;">

      
      
        
        <div class="vtgticfont2">
          This page lists every cruise matching your selections. 
    
    
    
    

    

    
    Click the FastDeal # at the left of each listing for details, and call us at +1-713-974-2121 for information and reservations.
    
  

        </div>
        <br/>
        
      

    </div>  
  </div>  
</div>  









<div class="tic BodyContentWidth" style="background-color:#ffff00; padding-top:10px;">
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
  
  <td align="left" valign="top" style="padding-right:30px;">

    
      
      <ol class="vtgticfont2" style="text-align:left; font-weight:bold; margin-bottom:12px;">
      <li>Click the FastDeal # at left for prices and itinerary.</li>
      <li>All prices are per person, based on double occupancy, in US dollars.</li>
      <li>Click on column headings to sort by departure port, price, etc.</li>
      <li>Onboard credits, if shown, are based on two people per cabin.</li>
      </ol>
      
    

  </td>
  

  
  <td align="center" valign="top" width="170">
    
      <div style="margin-bottom:5px; font-weight:bold;">
        Prices shown in:
      </div>
    

    <div class="CCnoFloat">
      <img src="/images/flag_us.gif"/> US$
    </div>

    
  </td>
  

  

  
  <td align="right" valign="top" width="170" style="padding-left:5px;">
    <div style="margin-bottom:5px; font-weight:bold;">
      Convert prices to: 
    </div>
  
    <div class="CCFloat"><a href="ticker.cfm?ncc=ca&r=17&sm=201910&tm=201910&edged=1"><img src="/images/flag_ca.gif"/></a> <a href="ticker.cfm?ncc=ca&r=17&sm=201910&tm=201910&edged=1" class='u'>CAN$</a>
      </div>
    
        <div class="CCFloat">
          <a href="ticker.cfm?ncc=gb&r=17&sm=201910&tm=201910&edged=1"><img src="/images/flag_uk.gif"/></a> <a href="ticker.cfm?ncc=gb&r=17&sm=201910&tm=201910&edged=1" class='u'>GBP&pound;</a>
        </div>
      
        <div class="CCFloat">
          <a href="ticker.cfm?ncc=au&r=17&sm=201910&tm=201910&edged=1"><img src="/images/flag_au.gif"/></a> <a href="ticker.cfm?ncc=au&r=17&sm=201910&tm=201910&edged=1" class='u'>AUS$</a>
        </div>
      
      <div class="CCFloat">
        <a href="ticker.cfm?ncc=eu&r=17&sm=201910&tm=201910&edged=1"><img src="/images/flag_eu.gif"/></a> <a href="ticker.cfm?ncc=eu&r=17&sm=201910&tm=201910&edged=1" class='u'>Euros&euro;</a>
      </div>
    

  </td>
  
  </tr>
  </table>
</div>

 



<div class="tic BodyContentWidth">
  <table cellpadding="0" cellspacing="0" border="0" width="100%">
  <tr>
  <td class="fd bY" height="36">&nbsp;</td>

  

  <td class="vtgticfont2" style="text-align:right; padding-bottom:1px; padding-left:20px; padding-right:4px; background-color:cyan; font-weight:bold;">
    Now displaying:
    <br/>
    Change to:
  </td>

  <td class="vtgticfont2" style="padding-bottom:1px; padding-left:20px; background-color:cyan; font-weight:bold;">
    Cheapest Overall Rates 
    
    <br/>
     <a href='ticker.cfm?rm=1&r=17&sm=201910&tm=201910&edged=1' class='u'>Cheapest Oceanview</a> | <a href='ticker.cfm?rm=2&r=17&sm=201910&tm=201910&edged=1' class='u'>Cheapest Balcony</a> | <a href='ticker.cfm?rm=3&r=17&sm=201910&tm=201910&edged=1' class='u'>Cheapest Suite</a> 
  </td>


  <td class="vtgticfont2" style="padding-bottom:1px; padding-left:20px; background-color:cyan; font-weight:bold;">
    Double Occupancy Pricing
          <br/>
          <a href="ticker.cfm?&r=17&sm=201910&tm=201910&edged=1&occ=1" class="u">Single Occupancy Pricing</a>   
  </td>



  <td class="vtgticfont2" style="width:135px; padding-bottom:1px; padding-right:10px; text-align:right; background-color:cyan; font-weight:bold;">
    
      <span style="white-space:nowrap; display:inline-block; text-align:center;">
        
      Status Column<br/><a href="ticker.cfm?&r=17&sm=201910&tm=201910&edged=1&pdm=y" class="u">Price Per Night</a>
    
      </span>
    
  </td>
  </tr>
  </table>
</div>




<div class="tic BodyContentWidth">
  <table cellpadding="0" cellspacing="0" border="0" width="100%">
  <tr>
  <td class="fd bY">&nbsp;</td>
  <td style="padding-right:220px; padding-left:10px;">
  
    
      <br/>
      
      <img src="/images/flag_us.gif" width="32" height="17" border="0" alt="Convert to US$"/>
      
     &nbsp;<b class="vtgticfont5">Prices are in US$</b>&nbsp; 
      
      <img src="/images/flag_us.gif" width="32" height="17" border="0" alt="Convert to US$"/>
      
    <br/><br/>
    
  
  </td>
  </tr>
  </table>
</div>




<table width="100%" cellpadding="0" cellspacing="0" border="0" class="vtgticfont BodyContentWidth">
<tr class="vAlignB">
<th class="fd bY" >FastDeal #</th><th class="dy" ><a href="ticker.cfm?sort=d&r=17&sm=201910&tm=201910&edged=1" class="u">Nights</a></th><th class="sd" >Sailing<br/>Date</th><th class="dp" ><a href="ticker.cfm?sort=s&r=17&sm=201910&tm=201910&edged=1" class="u">Departs From</a></th><th class="ep" ><a href="ticker.cfm?sort=e&r=17&sm=201910&tm=201910&edged=1" class="u">Ends In</a></th><th style="width:18%;">Cruise Line / Ship</th><th style="width:6%;"><a href="ticker.cfm?sort=r&r=17&sm=201910&tm=201910&edged=1" class="u">Ship Rating <span style="white-space:nowrap;">1-6 Stars</span></a></th><th style="width:7%;">Brochure<br/>Starting<br/>Price*</th><th style="width:6%;"><a href="ticker.cfm?sort=v&r=17&sm=201910&tm=201910&edged=1" class="u">Our<br/>Starting<br/>Price</a></th><th style="width:5%;"><a href="ticker.cfm?sort=p&r=17&sm=201910&tm=201910&edged=1" class="u" style="color:red;"><span style="color:red;">YOU<br/>SAVE!!</span></a></th><th style="width:13%;">Status</th>
</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" class="tic BodyContentWidth"><tr><td colspan="3" class="vtgtdleft vtgticfont vtgticheader padL8">Click # For<br/>Prices & Itinerary</td>
    <td colspan="5" class="vtgticfont4 vtgticheader"><A NAME="1" style="color:white;"><?php echo $r;?></a></td>
    <td colspan="3" class="vtgtdright vtgticfont4 vtgticheader padR8">+1-713-974-2121</td></tr>
    
<?php foreach ($data as $row)
{
  ?>
<tr class="hiLite">
  
<td class="fd" style="background-color:yellow;height:31px;"><a href="fastdeal.cfm?deal=23577" class="dealnav u"><?php echo $row[0];?></a></td>
<td class="dy"><?php echo $row[1];?></td>
<td class="sd"><?php echo $row[2];?></td>
<td class="dp"><a href="cruiseports/viewport.cfm?port=217" class='u'><?php echo $row[3];?></a></td>
<td class="ep"><a href="cruiseports/viewport.cfm?port=217" class='u'><?php echo $row[4];?></a></td>
<td class="ls"><a href="cruise_lines/royal_caribbean_cruises.cfm" class='u'><?php echo $row[5];?></a> / <a href="ship.cfm?shipid=1098" class='u'>Spectrum of the Seas</a></td>
<td class="rt"><?php echo $row[6];?></td>

<td class="pr"><?php echo $row[7];?></td>

<td class="pn"><?php echo $row[8];?></td>

<td class="pd"><FONT COLOR="red"><b>  <?php echo $row[9];?></b></FONT></td>
<td class='bB ms'><?php echo $row[10];?></td>

</tr>
<?php
}
?>


</table> <!-- Ticker rows: 43 -->

  
  <div align="left" class="vtgticfont" style="padding: 3px;">* Celebrity, Holland America and Princess refer to rates in this column as "Launch Fares".</div>



<script type="text/javascript" language="javascript">
  var arrayRow = document.getElementsByTagName("tr");

  for( var i=0; i<arrayRow.length; i++ ) {
    if( arrayRow[i].className.search(/hiLite/i) != -1 ) {
      arrayRow[i].onmouseover = function() {
        this.style.backgroundColor = "yellow";
      }
      arrayRow[i].onmouseout = function() {
        this.style.backgroundColor = "white";
      }
    }
  }
</script>

              

  <table cellspacing="0" cellpadding="0" border="0" class="BodyContentWidth">
  <tr>
  <td width="100%">

              
              

              
              <div class="vtgticfont2 Centered525">

                
                

                <br/>

                
                  

                  <CENTER><p><B>Try a New Search</B></p></CENTER>
                  Want to try a new  search? Change any of the selections below
                  and click "Show Me the Deals."<br/>
                  <br/>
                

              </div>  
              





							<script type="text/javascript" language="JavaScript">
                function addOption( obj, val, txt )
                {
                  var opt = new Option( txt, val );
                  obj.options[obj.length] = opt;
                }

                function redoShipList( id, ships )
                {
                  if ( document.getElementById( id ) ) {
                    var obj = document.getElementById( id ).ShipID;
                    obj.options.length = 1;

                    if ( ships != "0" ) {
                      var shipArray = ships.split( /,/ );
                      var sID = 0;

                      for ( var i=0; i<shipArray.length; i++ ) {
                        sID = eval( shipArray[i] );
                        sName = "";

                        if ( sID > 0 ) {
                          switch ( sID ) { case 746:sN="50 Years of Victory";break;case 171:sN="Adventure of the Seas";break;case 726:sN="Aegean Odyssey";break;case 526:sN="Allure of the Seas";break;case 1006:sN="American Constellation";break;case 1046:sN="American Constitution";break;case 690:sN="American Spirit";break;case 627:sN="American Star";break;case 156:sN="Amsterdam";break;case 837:sN="Anthem of the Seas";break;case 434:sN="Arcadia";break;case 975:sN="Astoria";break;case 401:sN="Aurora";break;case 428:sN="Azamara Journey";break;case 1042:sN="Azamara Pursuit";break;case 433:sN="Azamara Quest";break;case 1096:sN="Azora";break;case 527:sN="Azura";break;case 181:sN="Brilliance of the Seas";break;case 843:sN="Britannia";break;case 294:sN="Caribbean Princess";break;case 653:sN="Carnival Breeze";break;case 218:sN="Carnival Conquest";break;case 494:sN="Carnival Dream";break;case 21:sN="Carnival Ecstasy";break;case 23:sN="Carnival Elation";break;case 22:sN="Carnival Fantasy";break;case 106:sN="Carnival Fascination";break;case 410:sN="Carnival Freedom";break;case 244:sN="Carnival Glory";break;case 1023:sN="Carnival Horizon";break;case 111:sN="Carnival Imagination";break;case 113:sN="Carnival Inspiration";break;case 217:sN="Carnival Legend";break;case 325:sN="Carnival Liberty";break;case 547:sN="Carnival Magic";break;case 1124:sN="Carnival Mardi Gras";break;case 290:sN="Carnival Miracle";break;case 1082:sN="Carnival Panorama";break;case 24:sN="Carnival Paradise";break;case 161:sN="Carnival Pride";break;case 1118:sN="Carnival Radiance";break;case 107:sN="Carnival Sensation";break;case 160:sN="Carnival Spirit";break;case 444:sN="Carnival Splendor";break;case 1103:sN="Carnival Sunrise";break;case 688:sN="Carnival Sunshine";break;case 16:sN="Carnival Triumph";break;case 321:sN="Carnival Valor";break;case 155:sN="Carnival Victory";break;case 931:sN="Carnival Vista";break;case 1121:sN="Celebrity Apex";break;case 179:sN="Celebrity Constellation";break;case 518:sN="Celebrity Eclipse";break;case 1028:sN="Celebrity Edge";break;case 489:sN="Celebrity Equinox";break;case 1047:sN="Celebrity Flora";break;case 147:sN="Celebrity Infinity";break;case 131:sN="Celebrity Millennium";break;case 649:sN="Celebrity Reflection";break;case 557:sN="Celebrity Silhouette";break;case 449:sN="Celebrity Solstice";break;case 162:sN="Celebrity Summit";break;case 322:sN="Celebrity Xpedition";break;case 1004:sN="Celebrity Xploration";break;case 999:sN="Columbus";break;case 213:sN="Coral Princess";break;case 512:sN="Costa Deliziosa";break;case 820:sN="Costa Diadema";break;case 642:sN="Costa Fascinosa";break;case 553:sN="Costa Favolosa";break;case 293:sN="Costa Fortuna";break;case 488:sN="Costa Luminosa";break;case 326:sN="Costa Magica";break;case 247:sN="Costa Mediterranea";break;case 827:sN="Costa neoRiviera";break;case 673:sN="Costa neoRomantica";break;case 458:sN="Costa Pacifica";break;case 1100:sN="Costa Smeralda";break;case 38:sN="Costa Victoria";break;case 343:sN="Crown Princess";break;case 1105:sN="Crystal Endeavor";break;case 959:sN="Crystal Esprit";break;case 222:sN="Crystal Serenity";break;case 40:sN="Crystal Symphony";break;case 231:sN="Diamond Princess";break;case 545:sN="Disney Dream";break;case 618:sN="Disney Fantasy";break;case 44:sN="Disney Magic";break;case 45:sN="Disney Wonder";break;case 419:sN="Emerald Princess";break;case 93:sN="Empress of the Seas";break;case 1119:sN="Enchanted Princess";break;case 85:sN="Enchantment of the Seas";break;case 436:sN="Eurodam";break;case 150:sN="Explorer of the Seas";break;case 469:sN="Finnmarken";break;case 480:sN="Fram";break;case 337:sN="Freedom of the Seas";break;case 166:sN="Golden Princess";break;case 67:sN="Grand Princess";break;case 630:sN="Grande Caribe";break;case 631:sN="Grande Mariner";break;case 86:sN="Grandeur of the Seas";break;case 947:sN="Harmony of the Seas";break;case 583:sN="Horizon";break;case 629:sN="Independence";break;case 437:sN="Independence of the Seas";break;case 299:sN="Insignia";break;case 1112:sN="Iona";break;case 230:sN="Island Princess";break;case 296:sN="Jewel of the Seas";break;case 926:sN="Koningsdam";break;case 730:sN="L'Austral";break;case 1106:sN="Le Bellot";break;case 731:sN="Le Boreal";break;case 1044:sN="Le Bougainville";break;case 1019:sN="Le Champlain";break;case 1066:sN="Le Commandant Charcot";break;case 1045:sN="Le Dumont d'Urville";break;case 1020:sN="Le Laperouse";break;case 858:sN="Le Lyrial";break;case 727:sN="Le Ponant";break;case 738:sN="Le Soleal";break;case 421:sN="Liberty of the Seas";break;case 46:sN="Maasdam";break;case 924:sN="Magellan";break;case 983:sN="Majestic Princess";break;case 90:sN="Majesty of the Seas";break;case 546:sN="Marina";break;case 255:sN="Mariner of the Seas";break;case 749:sN="Monarch";break;case 1161:sN="MS Eirik Raude";break;case 1083:sN="MS Fridtjof Nansen";break;case 743:sN="MS Marco Polo";break;case 471:sN="MS Midnatsol";break;case 1162:sN="MS Otto Sverdrup";break;case 1029:sN="MS Roald Amundsen";break;case 324:sN="MSC Armonia";break;case 1035:sN="MSC Bellissima";break;case 668:sN="MSC Divina";break;case 491:sN="MSC Fantasia";break;case 1086:sN="MSC Grandiosa";break;case 243:sN="MSC Lirica";break;case 496:sN="MSC Magnifica";break;case 957:sN="MSC Meraviglia";break;case 398:sN="MSC Musica";break;case 315:sN="MSC Opera";break;case 425:sN="MSC Orchestra";break;case 450:sN="MSC Poesia";break;case 739:sN="MSC Preziosa";break;case 1148:sN="MSC Seashore";break;case 984:sN="MSC Seaside";break;case 1001:sN="MSC Seaview";break;case 336:sN="MSC Sinfonia";break;case 498:sN="MSC Splendida";break;case 1120:sN="MSC Virtuosa";break;case 1122:sN="MV Victory I";break;case 1123:sN="MV Victory II";break;case 335:sN="Nautica";break;case 180:sN="Navigator of the Seas";break;case 516:sN="Nieuw Amsterdam";break;case 1038:sN="Nieuw Statendam";break;case 51:sN="Noordam";break;case 476:sN="Nordlys";break;case 1021:sN="Norwegian Bliss";break;case 674:sN="Norwegian Breakaway";break;case 219:sN="Norwegian Dawn";break;case 1081:sN="Norwegian Encore";break;case 515:sN="Norwegian Epic";break;case 840:sN="Norwegian Escape";break;case 423:sN="Norwegian Gem";break;case 755:sN="Norwegian Getaway";break;case 443:sN="Norwegian Jade";break;case 327:sN="Norwegian Jewel";break;case 1032:sN="Norwegian Joy";break;case 412:sN="Norwegian Pearl";break;case 108:sN="Norwegian Sky";break;case 319:sN="Norwegian Spirit";break;case 178:sN="Norwegian Star";break;case 165:sN="Norwegian Sun";break;case 493:sN="Oasis of the Seas";break;case 745:sN="Ocean Adventurer";break;case 750:sN="Ocean Diamond";break;case 917:sN="Ocean Endeavour";break;case 838:sN="Ocean Nova";break;case 487:sN="Oceana";break;case 245:sN="Oosterdam";break;case 405:sN="Oriana";break;case 949:sN="Ovation of the Seas";break;case 227:sN="Pacific Princess";break;case 528:sN="Paul Gauguin (PGC)";break;case 288:sN="Pride of America";break;case 800:sN="Quantum of the Seas";break;case 524:sN="Queen Elizabeth";break;case 246:sN="Queen Mary 2";break;case 407:sN="Queen Victoria";break;case 172:sN="Radiance of the Seas";break;case 788:sN="Regal Princess";break;case 298:sN="Regatta";break;case 87:sN="Rhapsody of the Seas";break;case 473:sN="Richard With";break;case 640:sN="Riviera";break;case 52:sN="Rotterdam";break;case 308:sN="Royal Clipper";break;case 704:sN="Royal Princess";break;case 448:sN="Ruby Princess";break;case 291:sN="Sapphire Princess";break;case 1137:sN="Scenic Eclipse";break;case 328:sN="Sea Princess";break;case 942:sN="Seabourn Encore";break;case 457:sN="Seabourn Odyssey";break;case 1022:sN="Seabourn Ovation";break;case 552:sN="Seabourn Quest";break;case 517:sN="Seabourn Sojourn";break;case 1140:sN="Seabourn Venture";break;case 311:sN="SeaDream I";break;case 312:sN="SeaDream II";break;case 1135:sN="SeaDream Innovation";break;case 256:sN="Serenade of the Seas";break;case 932:sN="Seven Seas Explorer";break;case 168:sN="Seven Seas Mariner";break;case 109:sN="Seven Seas Navigator";break;case 1093:sN="Seven Seas Splendor";break;case 221:sN="Seven Seas Voyager";break;case 99:sN="Silver Cloud";break;case 486:sN="Silver Explorer";break;case 757:sN="Silver Galapagos";break;case 1113:sN="Silver Moon";break;case 971:sN="Silver Muse";break;case 1150:sN="Silver Origin";break;case 149:sN="Silver Shadow";break;case 514:sN="Silver Spirit";break;case 175:sN="Silver Whisper";break;case 100:sN="Silver Wind";break;case 941:sN="Sirena";break;case 1064:sN="Sky Princess";break;case 92:sN="Sovereign";break;case 1098:sN="Spectrum of the Seas";break;case 967:sN="Spitsbergen";break;case 841:sN="Star Breeze";break;case 309:sN="Star Clipper";break;case 310:sN="Star Flyer";break;case 842:sN="Star Legend";break;case 801:sN="Star Pride";break;case 167:sN="Star Princess";break;case 65:sN="Sun Princess";break;case 1025:sN="Symphony of the Seas";break;case 472:sN="Trollfjord";break;case 1097:sN="Vasco da Gama";break;case 49:sN="Veendam";break;case 485:sN="Ventura";break;case 1069:sN="Viking Jupiter";break;case 1017:sN="Viking Orion";break;case 867:sN="Viking Sea";break;case 866:sN="Viking Sky";break;case 804:sN="Viking Star";break;case 998:sN="Viking Sun";break;case 1144:sN="Viking Venus";break;case 139:sN="Vision of the Seas";break;case 112:sN="Volendam";break;case 84:sN="Voyager of the Seas";break;case 297:sN="Westerdam";break;case 101:sN="Wind Spirit";break;case 102:sN="Wind Star";break;case 103:sN="Wind Surf";break;case 1041:sN="World Explorer";break;case 144:sN="Zaandam";break;case 447:sN="Zenith";break;case 214:sN="Zuiderdam";break; }
                          addOption( obj, sID, sN );
                        }
                      }
                    }
                    else { addOption(obj,"746","50 Years of Victory");addOption(obj,"171","Adventure of the Seas");addOption(obj,"726","Aegean Odyssey");addOption(obj,"526","Allure of the Seas");addOption(obj,"1006","American Constellation");addOption(obj,"1046","American Constitution");addOption(obj,"690","American Spirit");addOption(obj,"627","American Star");addOption(obj,"156","Amsterdam");addOption(obj,"837","Anthem of the Seas");addOption(obj,"434","Arcadia");addOption(obj,"975","Astoria");addOption(obj,"401","Aurora");addOption(obj,"428","Azamara Journey");addOption(obj,"1042","Azamara Pursuit");addOption(obj,"433","Azamara Quest");addOption(obj,"1096","Azora");addOption(obj,"527","Azura");addOption(obj,"181","Brilliance of the Seas");addOption(obj,"843","Britannia");addOption(obj,"294","Caribbean Princess");addOption(obj,"653","Carnival Breeze");addOption(obj,"218","Carnival Conquest");addOption(obj,"494","Carnival Dream");addOption(obj,"21","Carnival Ecstasy");addOption(obj,"23","Carnival Elation");addOption(obj,"22","Carnival Fantasy");addOption(obj,"106","Carnival Fascination");addOption(obj,"410","Carnival Freedom");addOption(obj,"244","Carnival Glory");addOption(obj,"1023","Carnival Horizon");addOption(obj,"111","Carnival Imagination");addOption(obj,"113","Carnival Inspiration");addOption(obj,"217","Carnival Legend");addOption(obj,"325","Carnival Liberty");addOption(obj,"547","Carnival Magic");addOption(obj,"1124","Carnival Mardi Gras");addOption(obj,"290","Carnival Miracle");addOption(obj,"1082","Carnival Panorama");addOption(obj,"24","Carnival Paradise");addOption(obj,"161","Carnival Pride");addOption(obj,"1118","Carnival Radiance");addOption(obj,"107","Carnival Sensation");addOption(obj,"160","Carnival Spirit");addOption(obj,"444","Carnival Splendor");addOption(obj,"1103","Carnival Sunrise");addOption(obj,"688","Carnival Sunshine");addOption(obj,"16","Carnival Triumph");addOption(obj,"321","Carnival Valor");addOption(obj,"155","Carnival Victory");addOption(obj,"931","Carnival Vista");addOption(obj,"1121","Celebrity Apex");addOption(obj,"179","Celebrity Constellation");addOption(obj,"518","Celebrity Eclipse");addOption(obj,"1028","Celebrity Edge");addOption(obj,"489","Celebrity Equinox");addOption(obj,"1047","Celebrity Flora");addOption(obj,"147","Celebrity Infinity");addOption(obj,"131","Celebrity Millennium");addOption(obj,"649","Celebrity Reflection");addOption(obj,"557","Celebrity Silhouette");addOption(obj,"449","Celebrity Solstice");addOption(obj,"162","Celebrity Summit");addOption(obj,"322","Celebrity Xpedition");addOption(obj,"1004","Celebrity Xploration");addOption(obj,"999","Columbus");addOption(obj,"213","Coral Princess");addOption(obj,"512","Costa Deliziosa");addOption(obj,"820","Costa Diadema");addOption(obj,"642","Costa Fascinosa");addOption(obj,"553","Costa Favolosa");addOption(obj,"293","Costa Fortuna");addOption(obj,"488","Costa Luminosa");addOption(obj,"326","Costa Magica");addOption(obj,"247","Costa Mediterranea");addOption(obj,"827","Costa neoRiviera");addOption(obj,"673","Costa neoRomantica");addOption(obj,"458","Costa Pacifica");addOption(obj,"1100","Costa Smeralda");addOption(obj,"38","Costa Victoria");addOption(obj,"343","Crown Princess");addOption(obj,"1105","Crystal Endeavor");addOption(obj,"959","Crystal Esprit");addOption(obj,"222","Crystal Serenity");addOption(obj,"40","Crystal Symphony");addOption(obj,"231","Diamond Princess");addOption(obj,"545","Disney Dream");addOption(obj,"618","Disney Fantasy");addOption(obj,"44","Disney Magic");addOption(obj,"45","Disney Wonder");addOption(obj,"419","Emerald Princess");addOption(obj,"93","Empress of the Seas");addOption(obj,"1119","Enchanted Princess");addOption(obj,"85","Enchantment of the Seas");addOption(obj,"436","Eurodam");addOption(obj,"150","Explorer of the Seas");addOption(obj,"469","Finnmarken");addOption(obj,"480","Fram");addOption(obj,"337","Freedom of the Seas");addOption(obj,"166","Golden Princess");addOption(obj,"67","Grand Princess");addOption(obj,"630","Grande Caribe");addOption(obj,"631","Grande Mariner");addOption(obj,"86","Grandeur of the Seas");addOption(obj,"947","Harmony of the Seas");addOption(obj,"583","Horizon");addOption(obj,"629","Independence");addOption(obj,"437","Independence of the Seas");addOption(obj,"299","Insignia");addOption(obj,"1112","Iona");addOption(obj,"230","Island Princess");addOption(obj,"296","Jewel of the Seas");addOption(obj,"926","Koningsdam");addOption(obj,"730","L'Austral");addOption(obj,"1106","Le Bellot");addOption(obj,"731","Le Boreal");addOption(obj,"1044","Le Bougainville");addOption(obj,"1019","Le Champlain");addOption(obj,"1066","Le Commandant Charcot");addOption(obj,"1045","Le Dumont d'Urville");addOption(obj,"1020","Le Laperouse");addOption(obj,"858","Le Lyrial");addOption(obj,"727","Le Ponant");addOption(obj,"738","Le Soleal");addOption(obj,"421","Liberty of the Seas");addOption(obj,"46","Maasdam");addOption(obj,"924","Magellan");addOption(obj,"983","Majestic Princess");addOption(obj,"90","Majesty of the Seas");addOption(obj,"546","Marina");addOption(obj,"255","Mariner of the Seas");addOption(obj,"749","Monarch");addOption(obj,"1161","MS Eirik Raude");addOption(obj,"1083","MS Fridtjof Nansen");addOption(obj,"743","MS Marco Polo");addOption(obj,"471","MS Midnatsol");addOption(obj,"1162","MS Otto Sverdrup");addOption(obj,"1029","MS Roald Amundsen");addOption(obj,"324","MSC Armonia");addOption(obj,"1035","MSC Bellissima");addOption(obj,"668","MSC Divina");addOption(obj,"491","MSC Fantasia");addOption(obj,"1086","MSC Grandiosa");addOption(obj,"243","MSC Lirica");addOption(obj,"496","MSC Magnifica");addOption(obj,"957","MSC Meraviglia");addOption(obj,"398","MSC Musica");addOption(obj,"315","MSC Opera");addOption(obj,"425","MSC Orchestra");addOption(obj,"450","MSC Poesia");addOption(obj,"739","MSC Preziosa");addOption(obj,"1148","MSC Seashore");addOption(obj,"984","MSC Seaside");addOption(obj,"1001","MSC Seaview");addOption(obj,"336","MSC Sinfonia");addOption(obj,"498","MSC Splendida");addOption(obj,"1120","MSC Virtuosa");addOption(obj,"1122","MV Victory I");addOption(obj,"1123","MV Victory II");addOption(obj,"335","Nautica");addOption(obj,"180","Navigator of the Seas");addOption(obj,"516","Nieuw Amsterdam");addOption(obj,"1038","Nieuw Statendam");addOption(obj,"51","Noordam");addOption(obj,"476","Nordlys");addOption(obj,"1021","Norwegian Bliss");addOption(obj,"674","Norwegian Breakaway");addOption(obj,"219","Norwegian Dawn");addOption(obj,"1081","Norwegian Encore");addOption(obj,"515","Norwegian Epic");addOption(obj,"840","Norwegian Escape");addOption(obj,"423","Norwegian Gem");addOption(obj,"755","Norwegian Getaway");addOption(obj,"443","Norwegian Jade");addOption(obj,"327","Norwegian Jewel");addOption(obj,"1032","Norwegian Joy");addOption(obj,"412","Norwegian Pearl");addOption(obj,"108","Norwegian Sky");addOption(obj,"319","Norwegian Spirit");addOption(obj,"178","Norwegian Star");addOption(obj,"165","Norwegian Sun");addOption(obj,"493","Oasis of the Seas");addOption(obj,"745","Ocean Adventurer");addOption(obj,"750","Ocean Diamond");addOption(obj,"917","Ocean Endeavour");addOption(obj,"838","Ocean Nova");addOption(obj,"487","Oceana");addOption(obj,"245","Oosterdam");addOption(obj,"405","Oriana");addOption(obj,"949","Ovation of the Seas");addOption(obj,"227","Pacific Princess");addOption(obj,"528","Paul Gauguin (PGC)");addOption(obj,"288","Pride of America");addOption(obj,"800","Quantum of the Seas");addOption(obj,"524","Queen Elizabeth");addOption(obj,"246","Queen Mary 2");addOption(obj,"407","Queen Victoria");addOption(obj,"172","Radiance of the Seas");addOption(obj,"788","Regal Princess");addOption(obj,"298","Regatta");addOption(obj,"87","Rhapsody of the Seas");addOption(obj,"473","Richard With");addOption(obj,"640","Riviera");addOption(obj,"52","Rotterdam");addOption(obj,"308","Royal Clipper");addOption(obj,"704","Royal Princess");addOption(obj,"448","Ruby Princess");addOption(obj,"291","Sapphire Princess");addOption(obj,"1137","Scenic Eclipse");addOption(obj,"328","Sea Princess");addOption(obj,"942","Seabourn Encore");addOption(obj,"457","Seabourn Odyssey");addOption(obj,"1022","Seabourn Ovation");addOption(obj,"552","Seabourn Quest");addOption(obj,"517","Seabourn Sojourn");addOption(obj,"1140","Seabourn Venture");addOption(obj,"311","SeaDream I");addOption(obj,"312","SeaDream II");addOption(obj,"1135","SeaDream Innovation");addOption(obj,"256","Serenade of the Seas");addOption(obj,"932","Seven Seas Explorer");addOption(obj,"168","Seven Seas Mariner");addOption(obj,"109","Seven Seas Navigator");addOption(obj,"1093","Seven Seas Splendor");addOption(obj,"221","Seven Seas Voyager");addOption(obj,"99","Silver Cloud");addOption(obj,"486","Silver Explorer");addOption(obj,"757","Silver Galapagos");addOption(obj,"1113","Silver Moon");addOption(obj,"971","Silver Muse");addOption(obj,"1150","Silver Origin");addOption(obj,"149","Silver Shadow");addOption(obj,"514","Silver Spirit");addOption(obj,"175","Silver Whisper");addOption(obj,"100","Silver Wind");addOption(obj,"941","Sirena");addOption(obj,"1064","Sky Princess");addOption(obj,"92","Sovereign");addOption(obj,"1098","Spectrum of the Seas");addOption(obj,"967","Spitsbergen");addOption(obj,"841","Star Breeze");addOption(obj,"309","Star Clipper");addOption(obj,"310","Star Flyer");addOption(obj,"842","Star Legend");addOption(obj,"801","Star Pride");addOption(obj,"167","Star Princess");addOption(obj,"65","Sun Princess");addOption(obj,"1025","Symphony of the Seas");addOption(obj,"472","Trollfjord");addOption(obj,"1097","Vasco da Gama");addOption(obj,"49","Veendam");addOption(obj,"485","Ventura");addOption(obj,"1069","Viking Jupiter");addOption(obj,"1017","Viking Orion");addOption(obj,"867","Viking Sea");addOption(obj,"866","Viking Sky");addOption(obj,"804","Viking Star");addOption(obj,"998","Viking Sun");addOption(obj,"1144","Viking Venus");addOption(obj,"139","Vision of the Seas");addOption(obj,"112","Volendam");addOption(obj,"84","Voyager of the Seas");addOption(obj,"297","Westerdam");addOption(obj,"101","Wind Spirit");addOption(obj,"102","Wind Star");addOption(obj,"103","Wind Surf");addOption(obj,"1041","World Explorer");addOption(obj,"144","Zaandam");addOption(obj,"447","Zenith");addOption(obj,"214","Zuiderdam"); }  // a quick one...
                  }
                }

                function updateShipList( id, val )
                {
                  if ( document.getElementById( id ) && document.getElementById( id ).ShipID ) {
                    val = parseInt( val );

                    if ( !val ) {
                      var sID = parseInt( document.getElementById( id ).ShipID.value );
                      redoShipList( id, 0 );

                      for ( var j=0; j<document.getElementById( id ).ShipID.length; j++ ) {
                        if ( document.getElementById( id ).ShipID[j].value == sID ) {
                          document.getElementById( id ).ShipID[j].selected = true;
                          break;
                        }
                      }
                    }
                    else {
                      switch ( val ) {
                        
                          case 105: redoShipList(id,"1006,1046,690,627,629,0");break; 
                          case 55: redoShipList(id,"428,1042,433,0");break; 
                          case 106: redoShipList(id,"630,631,0");break; 
                          case 8: redoShipList(id,"653,218,494,21,23,22,106,410,244,1023,111,113,217,325,547,1124,290,1082,24,161,1118,107,160,444,1103,688,16,321,155,931,0");break; 
                          case 11: redoShipList(id,"1121,179,518,1028,489,1047,147,131,649,557,449,162,322,1004,0");break; 
                          case 12: redoShipList(id,"512,820,642,553,293,488,326,247,827,673,458,1100,38,0");break; 
                          case 112: redoShipList(id,"975,999,924,743,1097,0");break; 
                          case 13: redoShipList(id,"1105,959,222,40,0");break; 
                          case 6: redoShipList(id,"524,246,407,0");break; 
                          case 16: redoShipList(id,"545,618,44,45,0");break; 
                          case 5: redoShipList(id,"156,436,926,46,516,1038,51,245,52,49,112,297,144,214,0");break; 
                          case 58: redoShipList(id,"469,480,1161,1083,471,1162,1029,476,473,967,472,0");break; 
                          case 41: redoShipList(id,"324,1035,668,491,1086,243,496,957,398,315,425,450,739,1148,984,1001,336,498,1120,0");break; 
                          case 17: redoShipList(id,"1021,674,219,1081,515,840,423,755,443,327,1032,412,108,319,178,165,288,0");break; 
                          case 47: redoShipList(id,"299,546,335,298,640,941,0");break; 
                          case 101: redoShipList(id,"434,401,527,843,1112,487,405,485,0");break; 
                          case 102: redoShipList(id,"528,0");break; 
                          case 109: redoShipList(id,"730,1106,731,1044,1019,1066,1045,1020,858,727,738,0");break; 
                          case 3: redoShipList(id,"294,213,343,231,419,1119,166,67,230,983,227,788,704,448,291,328,1064,167,65,0");break; 
                          case 56: redoShipList(id,"583,749,92,447,0");break; 
                          case 113: redoShipList(id,"746,745,750,917,838,1041,0");break; 
                          case 18: redoShipList(id,"932,168,109,1093,221,0");break; 
                          case 117: redoShipList(id,"1096,0");break; 
                          case 14: redoShipList(id,"171,526,837,181,93,85,150,337,86,947,437,296,421,90,255,180,493,949,800,172,87,256,1098,1025,139,84,0");break; 
                          case 123: redoShipList(id,"1137,0");break; 
                          case 19: redoShipList(id,"942,457,1022,552,517,1140,0");break; 
                          case 48: redoShipList(id,"311,312,1135,0");break; 
                          case 20: redoShipList(id,"99,486,757,1113,971,1150,149,514,175,100,0");break; 
                          case 49: redoShipList(id,"308,309,310,0");break; 
                          case 121: redoShipList(id,"1122,1123,0");break; 
                          case 45: redoShipList(id,"1069,1017,867,866,804,998,1144,0");break; 
                          case 108: redoShipList(id,"726,0");break; 
                          case 15: redoShipList(id,"841,842,801,101,102,103,0");break; 
                      }
                    }
                  }
                }
              </script>



              

              
              <div class="Centered750">

                

                  
                  <P>
                  <div id="MainFABDiv" STYLE="display:block;">

                    <div align="center">
                      <div class="SearchContainer" style="width:360px;">
                        <FORM ID="FormMainFAB" NAME="FormMainFAB" ACTION="ticker.cfm" METHOD=POST style="margin-top: 0px; margin-bottom: 0px;">

                        

                        <TABLE CELLPADDING=0 CELLSPACING=2 BORDER=0>

                          

                          <tr>
                          <td class="vtgtdleft">
                            <INPUT TYPE=HIDDEN NAME=Month VALUE=0>
                            <SELECT NAME="SMonth" CLASS="nn" style="width:125px; margin-right:4px;">
                              <OPTION VALUE="0">From Month
                              <OPTION VALUE="20199">September 2019 <OPTION SELECTED VALUE="201910">October 2019 <OPTION VALUE="201911">November 2019 <OPTION VALUE="201912">December 2019 <OPTION VALUE="20201">January 2020 <OPTION VALUE="20202">February 2020 <OPTION VALUE="20203">March 2020 <OPTION VALUE="20204">April 2020 <OPTION VALUE="20205">May 2020 <OPTION VALUE="20206">June 2020 <OPTION VALUE="20207">July 2020 <OPTION VALUE="20208">August 2020 <OPTION VALUE="20209">September 2020 <OPTION VALUE="202010">October 2020 <OPTION VALUE="202011">November 2020 <OPTION VALUE="202012">December 2020 <OPTION VALUE="20211">January 2021 <OPTION VALUE="20212">February 2021 <OPTION VALUE="20213">March 2021 <OPTION VALUE="20214">April 2021 <OPTION VALUE="20215">May 2021 <OPTION VALUE="20216">June 2021 <OPTION VALUE="20217">July 2021 <OPTION VALUE="20218">August 2021 <OPTION VALUE="20219">September 2021 <OPTION VALUE="202110">October 2021 <OPTION VALUE="202111">November 2021 <OPTION VALUE="202112">December 2021 <OPTION VALUE="20221">January 2022 <OPTION VALUE="20222">February 2022 <OPTION VALUE="20223">March 2022 <OPTION VALUE="20224">April 2022 <OPTION VALUE="20225">May 2022 <OPTION VALUE="20226">June 2022 <OPTION VALUE="20227">July 2022 <OPTION VALUE="20228">August 2022 <OPTION VALUE="20229">September 2022 <OPTION VALUE="202210">October 2022 <OPTION VALUE="202211">November 2022 <OPTION VALUE="202212">December 2022 
                            </SELECT><SELECT NAME="TMonth" CLASS="nn" style="width:125px;">
                              <OPTION VALUE="0">To Month
                              <OPTION VALUE="20199">September 2019 <OPTION SELECTED VALUE="201910">October 2019 <OPTION VALUE="201911">November 2019 <OPTION VALUE="201912">December 2019 <OPTION VALUE="20201">January 2020 <OPTION VALUE="20202">February 2020 <OPTION VALUE="20203">March 2020 <OPTION VALUE="20204">April 2020 <OPTION VALUE="20205">May 2020 <OPTION VALUE="20206">June 2020 <OPTION VALUE="20207">July 2020 <OPTION VALUE="20208">August 2020 <OPTION VALUE="20209">September 2020 <OPTION VALUE="202010">October 2020 <OPTION VALUE="202011">November 2020 <OPTION VALUE="202012">December 2020 <OPTION VALUE="20211">January 2021 <OPTION VALUE="20212">February 2021 <OPTION VALUE="20213">March 2021 <OPTION VALUE="20214">April 2021 <OPTION VALUE="20215">May 2021 <OPTION VALUE="20216">June 2021 <OPTION VALUE="20217">July 2021 <OPTION VALUE="20218">August 2021 <OPTION VALUE="20219">September 2021 <OPTION VALUE="202110">October 2021 <OPTION VALUE="202111">November 2021 <OPTION VALUE="202112">December 2021 <OPTION VALUE="20221">January 2022 <OPTION VALUE="20222">February 2022 <OPTION VALUE="20223">March 2022 <OPTION VALUE="20224">April 2022 <OPTION VALUE="20225">May 2022 <OPTION VALUE="20226">June 2022 <OPTION VALUE="20227">July 2022 <OPTION VALUE="20228">August 2022 <OPTION VALUE="20229">September 2022 <OPTION VALUE="202210">October 2022 <OPTION VALUE="202211">November 2022 <OPTION VALUE="202212">December 2022 
                            </SELECT>

  
                          </td>
                          </tr>

                          
                            <tr>
                            <td class="vtgtdleft">
                              <SELECT NAME="RegionID" CLASS="nn" ONCHANGE="showRegionDiv(0, this.value);" style="width:254px;">
                                <OPTION VALUE="0">Choose a Region
                                <OPTION VALUE="16">Africa<OPTION VALUE="9">Alaska<OPTION VALUE="31">Alaska Cruise & Land Tour<OPTION VALUE="36">Antarctica<OPTION VALUE="80">Arctic<OPTION VALUE="17" SELECTED>Asia<OPTION VALUE="49">Asia Cruise & Land Tour<OPTION VALUE="15">Australia & New Zealand<OPTION VALUE="48">Australia & New Zealand Cruise & Land Tour<OPTION VALUE="30">Bahamas<OPTION VALUE="84">Baltic<OPTION VALUE="18">Bermuda<OPTION VALUE="69">Black Sea<OPTION VALUE="83">British Isles<OPTION VALUE="82">Canary Islands<OPTION VALUE="13">Caribbean (All)<OPTION VALUE="42">Caribbean (Eastern)<OPTION VALUE="43">Caribbean (Southern)<OPTION VALUE="44">Caribbean (Western)<OPTION VALUE="19">Eastern Canada & New England<OPTION VALUE="51">Eastern Canada & New England Cruise & Land Tour<OPTION VALUE="71">Europe (All)<OPTION VALUE="45">Europe Cruise & Land Tour<OPTION VALUE="68">Galapagos<OPTION VALUE="87">Great Lakes<OPTION VALUE="37">Greek Islands<OPTION VALUE="21">Hawaii<OPTION VALUE="88">Indian Ocean<OPTION VALUE="11">Mediterranean (All)<OPTION VALUE="91">Mediterranean (Eastern)<OPTION VALUE="90">Mediterranean (Western) & Atlantic Islands<OPTION VALUE="22">Mexico & Central America<OPTION VALUE="33">Middle East<OPTION VALUE="24">Northern Europe<OPTION VALUE="86">Northwest Passage<OPTION VALUE="81">Norway<OPTION VALUE="39">Pacific U.S. & Canada<OPTION VALUE="14">Panama Canal<OPTION VALUE="41">Repositioning<OPTION VALUE="25">South America<OPTION VALUE="47">South America Cruise & Land Tour<OPTION VALUE="89">Southeast Asia Islands<OPTION VALUE="29">Southeastern U.S.<OPTION VALUE="50">Tahiti & South Pacific Islands<OPTION VALUE="26">Transatlantic<OPTION VALUE="34">Transpacific<OPTION VALUE="35">World
                              </SELECT>
                            </td>
                            </tr>
                          

                          <tr>
                          <td class="vtgtdleft">
                            <SELECT NAME="LineID" CLASS="nn" onChange="updateShipList('FormMainFAB', this.value)" style="width:215px;">
                              <OPTION VALUE="0">Choose a Cruise Line
                              <OPTION VALUE="105">American Cruise Lines<OPTION VALUE="55">Azamara<OPTION VALUE="106">Blount Small Ship Adventures<OPTION VALUE="8">Carnival<OPTION VALUE="11">Celebrity<OPTION VALUE="12">Costa Cruises<OPTION VALUE="112">Cruise & Maritime Voyages<OPTION VALUE="13">Crystal<OPTION VALUE="6">Cunard<OPTION VALUE="16">Disney<OPTION VALUE="5">Holland America<OPTION VALUE="58">Hurtigruten<OPTION VALUE="41">MSC Cruises<OPTION VALUE="17">Norwegian<OPTION VALUE="47">Oceania Cruises<OPTION VALUE="101">P&O Cruises<OPTION VALUE="102">Paul Gauguin Cruises<OPTION VALUE="109">Ponant<OPTION VALUE="3">Princess<OPTION VALUE="56">Pullmantur<OPTION VALUE="113">Quark Expeditions<OPTION VALUE="18">Regent<OPTION VALUE="117">Ritz-Carlton Yacht Collection<OPTION VALUE="14">Royal Caribbean<OPTION VALUE="123">Scenic Cruises<OPTION VALUE="19">Seabourn<OPTION VALUE="48">SeaDream Yacht Club<OPTION VALUE="20">Silversea<OPTION VALUE="49">Star Clippers<OPTION VALUE="121">Victory Cruise Lines<OPTION VALUE="45">Viking Cruises<OPTION VALUE="108">Voyages to Antiquity<OPTION VALUE="15">Windstar
                            </SELECT>
                          </td>
                          </tr>

                          <tr>
                          <td class="vtgtdleft">
                            <SELECT NAME="ShipID" CLASS="nn" style="width:215px;">
                              <OPTION VALUE="0" SELECTED>Choose a Ship
                              <OPTION VALUE="746">50 Years of Victory<OPTION VALUE="171">Adventure of the Seas<OPTION VALUE="726">Aegean Odyssey<OPTION VALUE="526">Allure of the Seas<OPTION VALUE="1006">American Constellation<OPTION VALUE="1046">American Constitution<OPTION VALUE="690">American Spirit<OPTION VALUE="627">American Star<OPTION VALUE="156">Amsterdam<OPTION VALUE="837">Anthem of the Seas<OPTION VALUE="434">Arcadia<OPTION VALUE="975">Astoria<OPTION VALUE="401">Aurora<OPTION VALUE="428">Azamara Journey<OPTION VALUE="1042">Azamara Pursuit<OPTION VALUE="433">Azamara Quest<OPTION VALUE="1096">Azora<OPTION VALUE="527">Azura<OPTION VALUE="181">Brilliance of the Seas<OPTION VALUE="843">Britannia<OPTION VALUE="294">Caribbean Princess<OPTION VALUE="653">Carnival Breeze<OPTION VALUE="218">Carnival Conquest<OPTION VALUE="494">Carnival Dream<OPTION VALUE="21">Carnival Ecstasy<OPTION VALUE="23">Carnival Elation<OPTION VALUE="22">Carnival Fantasy<OPTION VALUE="106">Carnival Fascination<OPTION VALUE="410">Carnival Freedom<OPTION VALUE="244">Carnival Glory<OPTION VALUE="1023">Carnival Horizon<OPTION VALUE="111">Carnival Imagination<OPTION VALUE="113">Carnival Inspiration<OPTION VALUE="217">Carnival Legend<OPTION VALUE="325">Carnival Liberty<OPTION VALUE="547">Carnival Magic<OPTION VALUE="1124">Carnival Mardi Gras<OPTION VALUE="290">Carnival Miracle<OPTION VALUE="1082">Carnival Panorama<OPTION VALUE="24">Carnival Paradise<OPTION VALUE="161">Carnival Pride<OPTION VALUE="1118">Carnival Radiance<OPTION VALUE="107">Carnival Sensation<OPTION VALUE="160">Carnival Spirit<OPTION VALUE="444">Carnival Splendor<OPTION VALUE="1103">Carnival Sunrise<OPTION VALUE="688">Carnival Sunshine<OPTION VALUE="16">Carnival Triumph<OPTION VALUE="321">Carnival Valor<OPTION VALUE="155">Carnival Victory<OPTION VALUE="931">Carnival Vista<OPTION VALUE="1121">Celebrity Apex<OPTION VALUE="179">Celebrity Constellation<OPTION VALUE="518">Celebrity Eclipse<OPTION VALUE="1028">Celebrity Edge<OPTION VALUE="489">Celebrity Equinox<OPTION VALUE="1047">Celebrity Flora<OPTION VALUE="147">Celebrity Infinity<OPTION VALUE="131">Celebrity Millennium<OPTION VALUE="649">Celebrity Reflection<OPTION VALUE="557">Celebrity Silhouette<OPTION VALUE="449">Celebrity Solstice<OPTION VALUE="162">Celebrity Summit<OPTION VALUE="322">Celebrity Xpedition<OPTION VALUE="1004">Celebrity Xploration<OPTION VALUE="999">Columbus<OPTION VALUE="213">Coral Princess<OPTION VALUE="512">Costa Deliziosa<OPTION VALUE="820">Costa Diadema<OPTION VALUE="642">Costa Fascinosa<OPTION VALUE="553">Costa Favolosa<OPTION VALUE="293">Costa Fortuna<OPTION VALUE="488">Costa Luminosa<OPTION VALUE="326">Costa Magica<OPTION VALUE="247">Costa Mediterranea<OPTION VALUE="827">Costa neoRiviera<OPTION VALUE="673">Costa neoRomantica<OPTION VALUE="458">Costa Pacifica<OPTION VALUE="1100">Costa Smeralda<OPTION VALUE="38">Costa Victoria<OPTION VALUE="343">Crown Princess<OPTION VALUE="1105">Crystal Endeavor<OPTION VALUE="959">Crystal Esprit<OPTION VALUE="222">Crystal Serenity<OPTION VALUE="40">Crystal Symphony<OPTION VALUE="231">Diamond Princess<OPTION VALUE="545">Disney Dream<OPTION VALUE="618">Disney Fantasy<OPTION VALUE="44">Disney Magic<OPTION VALUE="45">Disney Wonder<OPTION VALUE="419">Emerald Princess<OPTION VALUE="93">Empress of the Seas<OPTION VALUE="1119">Enchanted Princess<OPTION VALUE="85">Enchantment of the Seas<OPTION VALUE="436">Eurodam<OPTION VALUE="150">Explorer of the Seas<OPTION VALUE="469">Finnmarken<OPTION VALUE="480">Fram<OPTION VALUE="337">Freedom of the Seas<OPTION VALUE="166">Golden Princess<OPTION VALUE="67">Grand Princess<OPTION VALUE="630">Grande Caribe<OPTION VALUE="631">Grande Mariner<OPTION VALUE="86">Grandeur of the Seas<OPTION VALUE="947">Harmony of the Seas<OPTION VALUE="583">Horizon<OPTION VALUE="629">Independence<OPTION VALUE="437">Independence of the Seas<OPTION VALUE="299">Insignia<OPTION VALUE="1112">Iona<OPTION VALUE="230">Island Princess<OPTION VALUE="296">Jewel of the Seas<OPTION VALUE="926">Koningsdam<OPTION VALUE="730">L'Austral<OPTION VALUE="1106">Le Bellot<OPTION VALUE="731">Le Boreal<OPTION VALUE="1044">Le Bougainville<OPTION VALUE="1019">Le Champlain<OPTION VALUE="1066">Le Commandant Charcot<OPTION VALUE="1045">Le Dumont d'Urville<OPTION VALUE="1020">Le Laperouse<OPTION VALUE="858">Le Lyrial<OPTION VALUE="727">Le Ponant<OPTION VALUE="738">Le Soleal<OPTION VALUE="421">Liberty of the Seas<OPTION VALUE="46">Maasdam<OPTION VALUE="924">Magellan<OPTION VALUE="983">Majestic Princess<OPTION VALUE="90">Majesty of the Seas<OPTION VALUE="546">Marina<OPTION VALUE="255">Mariner of the Seas<OPTION VALUE="749">Monarch<OPTION VALUE="1161">MS Eirik Raude<OPTION VALUE="1083">MS Fridtjof Nansen<OPTION VALUE="743">MS Marco Polo<OPTION VALUE="471">MS Midnatsol<OPTION VALUE="1162">MS Otto Sverdrup<OPTION VALUE="1029">MS Roald Amundsen<OPTION VALUE="324">MSC Armonia<OPTION VALUE="1035">MSC Bellissima<OPTION VALUE="668">MSC Divina<OPTION VALUE="491">MSC Fantasia<OPTION VALUE="1086">MSC Grandiosa<OPTION VALUE="243">MSC Lirica<OPTION VALUE="496">MSC Magnifica<OPTION VALUE="957">MSC Meraviglia<OPTION VALUE="398">MSC Musica<OPTION VALUE="315">MSC Opera<OPTION VALUE="425">MSC Orchestra<OPTION VALUE="450">MSC Poesia<OPTION VALUE="739">MSC Preziosa<OPTION VALUE="1148">MSC Seashore<OPTION VALUE="984">MSC Seaside<OPTION VALUE="1001">MSC Seaview<OPTION VALUE="336">MSC Sinfonia<OPTION VALUE="498">MSC Splendida<OPTION VALUE="1120">MSC Virtuosa<OPTION VALUE="1122">MV Victory I<OPTION VALUE="1123">MV Victory II<OPTION VALUE="335">Nautica<OPTION VALUE="180">Navigator of the Seas<OPTION VALUE="516">Nieuw Amsterdam<OPTION VALUE="1038">Nieuw Statendam<OPTION VALUE="51">Noordam<OPTION VALUE="476">Nordlys<OPTION VALUE="1021">Norwegian Bliss<OPTION VALUE="674">Norwegian Breakaway<OPTION VALUE="219">Norwegian Dawn<OPTION VALUE="1081">Norwegian Encore<OPTION VALUE="515">Norwegian Epic<OPTION VALUE="840">Norwegian Escape<OPTION VALUE="423">Norwegian Gem<OPTION VALUE="755">Norwegian Getaway<OPTION VALUE="443">Norwegian Jade<OPTION VALUE="327">Norwegian Jewel<OPTION VALUE="1032">Norwegian Joy<OPTION VALUE="412">Norwegian Pearl<OPTION VALUE="108">Norwegian Sky<OPTION VALUE="319">Norwegian Spirit<OPTION VALUE="178">Norwegian Star<OPTION VALUE="165">Norwegian Sun<OPTION VALUE="493">Oasis of the Seas<OPTION VALUE="745">Ocean Adventurer<OPTION VALUE="750">Ocean Diamond<OPTION VALUE="917">Ocean Endeavour<OPTION VALUE="838">Ocean Nova<OPTION VALUE="487">Oceana<OPTION VALUE="245">Oosterdam<OPTION VALUE="405">Oriana<OPTION VALUE="949">Ovation of the Seas<OPTION VALUE="227">Pacific Princess<OPTION VALUE="528">Paul Gauguin (PGC)<OPTION VALUE="288">Pride of America<OPTION VALUE="800">Quantum of the Seas<OPTION VALUE="524">Queen Elizabeth<OPTION VALUE="246">Queen Mary 2<OPTION VALUE="407">Queen Victoria<OPTION VALUE="172">Radiance of the Seas<OPTION VALUE="788">Regal Princess<OPTION VALUE="298">Regatta<OPTION VALUE="87">Rhapsody of the Seas<OPTION VALUE="473">Richard With<OPTION VALUE="640">Riviera<OPTION VALUE="52">Rotterdam<OPTION VALUE="308">Royal Clipper<OPTION VALUE="704">Royal Princess<OPTION VALUE="448">Ruby Princess<OPTION VALUE="291">Sapphire Princess<OPTION VALUE="1137">Scenic Eclipse<OPTION VALUE="328">Sea Princess<OPTION VALUE="942">Seabourn Encore<OPTION VALUE="457">Seabourn Odyssey<OPTION VALUE="1022">Seabourn Ovation<OPTION VALUE="552">Seabourn Quest<OPTION VALUE="517">Seabourn Sojourn<OPTION VALUE="1140">Seabourn Venture<OPTION VALUE="311">SeaDream I<OPTION VALUE="312">SeaDream II<OPTION VALUE="1135">SeaDream Innovation<OPTION VALUE="256">Serenade of the Seas<OPTION VALUE="932">Seven Seas Explorer<OPTION VALUE="168">Seven Seas Mariner<OPTION VALUE="109">Seven Seas Navigator<OPTION VALUE="1093">Seven Seas Splendor<OPTION VALUE="221">Seven Seas Voyager<OPTION VALUE="99">Silver Cloud<OPTION VALUE="486">Silver Explorer<OPTION VALUE="757">Silver Galapagos<OPTION VALUE="1113">Silver Moon<OPTION VALUE="971">Silver Muse<OPTION VALUE="1150">Silver Origin<OPTION VALUE="149">Silver Shadow<OPTION VALUE="514">Silver Spirit<OPTION VALUE="175">Silver Whisper<OPTION VALUE="100">Silver Wind<OPTION VALUE="941">Sirena<OPTION VALUE="1064">Sky Princess<OPTION VALUE="92">Sovereign<OPTION VALUE="1098">Spectrum of the Seas<OPTION VALUE="967">Spitsbergen<OPTION VALUE="841">Star Breeze<OPTION VALUE="309">Star Clipper<OPTION VALUE="310">Star Flyer<OPTION VALUE="842">Star Legend<OPTION VALUE="801">Star Pride<OPTION VALUE="167">Star Princess<OPTION VALUE="65">Sun Princess<OPTION VALUE="1025">Symphony of the Seas<OPTION VALUE="472">Trollfjord<OPTION VALUE="1097">Vasco da Gama<OPTION VALUE="49">Veendam<OPTION VALUE="485">Ventura<OPTION VALUE="1069">Viking Jupiter<OPTION VALUE="1017">Viking Orion<OPTION VALUE="867">Viking Sea<OPTION VALUE="866">Viking Sky<OPTION VALUE="804">Viking Star<OPTION VALUE="998">Viking Sun<OPTION VALUE="1144">Viking Venus<OPTION VALUE="139">Vision of the Seas<OPTION VALUE="112">Volendam<OPTION VALUE="84">Voyager of the Seas<OPTION VALUE="297">Westerdam<OPTION VALUE="101">Wind Spirit<OPTION VALUE="102">Wind Star<OPTION VALUE="103">Wind Surf<OPTION VALUE="1041">World Explorer<OPTION VALUE="144">Zaandam<OPTION VALUE="447">Zenith<OPTION VALUE="214">Zuiderdam
                            </SELECT>
                          </td>
                          </tr>

                          

                          <tr>
                          <td class="vtgtdleft">
                            <SELECT NAME="Length" CLASS="nn" style="width:215px;">
                              <OPTION VALUE=0 SELECTED>Length of Cruise
                              <OPTION VALUE=1>3-6 Nights
                              <OPTION VALUE=2>7 Nights
                              <OPTION VALUE=3>8-13 Nights
                              <OPTION VALUE=4>14+ Nights
                              <OPTION VALUE=5>21+ Nights
                              <OPTION VALUE=6>30+ Nights
                              <OPTION VALUE=7>60+ Nights
                            </SELECT>
                          </td>
                          </tr>

                          <tr>
                          <td class="vtgtdleft">
                            <SELECT NAME="DPortID" CLASS="nn" style="width:325px;">
                              <OPTION VALUE="0">Choose a Departure Port
                              <OPTION VALUE="670">Abu Dhabi, United Arab Emirates<OPTION VALUE="4">Acapulco, Mexico<OPTION VALUE="7">Amsterdam, Holland<OPTION VALUE="1790">Anchorage (Any Port), AK<OPTION VALUE="8">Anchorage (Seward), AK<OPTION VALUE="1090">Anchorage (Whittier), AK<OPTION VALUE="9">Antigua<OPTION VALUE="11">Aruba<OPTION VALUE="12">Athens (Piraeus), Greece<OPTION VALUE="13">Auckland, New Zealand<OPTION VALUE="18">Balboa, Panama<OPTION VALUE="362">Baltimore, MD<OPTION VALUE="2036">Bangkok (Any Port), Thailand<OPTION VALUE="1228">Bangkok (Laem Chabang), Thailand<OPTION VALUE="21">Bar Harbor, ME<OPTION VALUE="22">Barbados<OPTION VALUE="23">Barcelona, Spain<OPTION VALUE="436">Bari, Italy<OPTION VALUE="1508">Bayonne, NJ<OPTION VALUE="2037">Beijing (Any Port), China<OPTION VALUE="903">Beijing (Tianjin), China<OPTION VALUE="28">Bergen, Norway<OPTION VALUE="30">Berlin (Warnemunde), Germany<OPTION VALUE="31">Bombay (Mumbai), India<OPTION VALUE="35">Boston, MA<OPTION VALUE="1639">Brazil (Any Port)<OPTION VALUE="37">Brisbane, Australia<OPTION VALUE="38">Buenos Aires, Argentina<OPTION VALUE="187">Cairo (Port Said), Egypt<OPTION VALUE="1544">Calgary, Canada<OPTION VALUE="1489">California (Any Port)<OPTION VALUE="46">Cape Town, South Africa<OPTION VALUE="49">Cartagena, Colombia<OPTION VALUE="329">Charleston, SC<OPTION VALUE="3616">Chicago (Iroquois Landing), IL<OPTION VALUE="3276">Colombia (Any Port)<OPTION VALUE="590">Colon, Panama<OPTION VALUE="59">Copenhagen, Denmark<OPTION VALUE="931">Costa Rica (Any Port)<OPTION VALUE="278">Cozumel, Mexico<OPTION VALUE="1640">Croatia (Any Port)<OPTION VALUE="64">Curacao<OPTION VALUE="371">Darwin, Australia<OPTION VALUE="2160">Detroit, MI<OPTION VALUE="368">Dubai, United Arab Emirates<OPTION VALUE="74">Dublin, Ireland<OPTION VALUE="75">Dubrovnik, Croatia<OPTION VALUE="77">Durban, South Africa<OPTION VALUE="79">Edinburgh (Leith), Scotland<OPTION VALUE="555">Edinburgh (Rosyth), Scotland<OPTION VALUE="970">Fairbanks, AK<OPTION VALUE="82">Fiji<OPTION VALUE="83">Florence / Pisa (Livorno), Italy<OPTION VALUE="1324">Florida (Any Port)<OPTION VALUE="320">Fort Lauderdale, FL<OPTION VALUE="693">Fort-de-France, Martinique<OPTION VALUE="2293">France (Any Port)<OPTION VALUE="318">Funchal, Madeira, Portugal<OPTION VALUE="326">Galveston, TX<OPTION VALUE="86">Genoa, Italy<OPTION VALUE="434">Glasgow (Greenock), Scotland<OPTION VALUE="1685">Grand Canary Island, Canary Islands<OPTION VALUE="1786">Greece (Any Port)<OPTION VALUE="157">Haifa, Israel<OPTION VALUE="98">Halifax, NS, Canada<OPTION VALUE="977">Hamburg, Germany<OPTION VALUE="2038">Hanoi (Any Port), Vietnam<OPTION VALUE="343">Hanoi (Haiphong), Vietnam<OPTION VALUE="104">Helsinki, Finland<OPTION VALUE="374">Hobart, Tasmania, Australia<OPTION VALUE="107">Hong Kong<OPTION VALUE="730">Honolulu, Oahu, HI<OPTION VALUE="2196">Houston (Any Port), TX<OPTION VALUE="2197">Houston (Galveston), TX<OPTION VALUE="114">Istanbul, Turkey<OPTION VALUE="1225">Itajai, Brazil<OPTION VALUE="1787">Italy (Any Port)<OPTION VALUE="823">Jacksonville, FL<OPTION VALUE="929">Jamaica (Any Port)<OPTION VALUE="1643">Japan (Any Port)<OPTION VALUE="561">Kiel, Germany<OPTION VALUE="1688">Kirkenes, Norway<OPTION VALUE="825">Kobe, Japan<OPTION VALUE="662">Kota Kinabalu, Malaysia<OPTION VALUE="1058">La Paz, Mexico<OPTION VALUE="274">La Romana (Casa de Campo), Dominican Republic<OPTION VALUE="486">Lanzarote, Canary Islands<OPTION VALUE="487">Las Palmas, Grand Canary Island, Canary Islands<OPTION VALUE="540">Lautoka, Fiji<OPTION VALUE="127">Lima (Callao), Peru<OPTION VALUE="129">Lisbon, Portugal<OPTION VALUE="1479">Liverpool, England<OPTION VALUE="928">London (Any Port), England<OPTION VALUE="130">London (Dover), England<OPTION VALUE="131">London (Southampton), England<OPTION VALUE="904">London (Tilbury), England<OPTION VALUE="910">London (Tower Bridge), England<OPTION VALUE="2232">Los Angeles (Any Port), CA<OPTION VALUE="1353">Los Angeles (Long Beach), CA<OPTION VALUE="2230">Los Angeles (San Pedro), CA<OPTION VALUE="2025">Madagascar (Any Port)<OPTION VALUE="628">Mahe, Seychelles<OPTION VALUE="136">Malaga, Spain<OPTION VALUE="3614">Maldives (Any Port)<OPTION VALUE="536">Male, Maldives<OPTION VALUE="2195">Malmö, Sweden<OPTION VALUE="638">Manaus, Brazil<OPTION VALUE="294">Marseille, France<OPTION VALUE="143">Melbourne, Australia<OPTION VALUE="281">Miami, FL<OPTION VALUE="748">Mobile, AL<OPTION VALUE="146">Mombasa, Kenya<OPTION VALUE="298">Monte Carlo, Monaco<OPTION VALUE="149">Montevideo, Uruguay<OPTION VALUE="150">Montreal, QC, Canada<OPTION VALUE="1316">Naples, Italy<OPTION VALUE="160">New Orleans, LA<OPTION VALUE="1509">New York (Any Port), NY<OPTION VALUE="1566">New York (Brooklyn), NY<OPTION VALUE="2494">New York (Chelsea Piers), NY<OPTION VALUE="161">New York (Manhattan), NY<OPTION VALUE="2657">New Zealand (Any Port)<OPTION VALUE="999">Newcastle-upon-Tyne, England<OPTION VALUE="3634">Niagara Falls, ON, Canada<OPTION VALUE="317">Nice (Villefranche), France<OPTION VALUE="1781">Nice, France<OPTION VALUE="473">Norfolk, VA<OPTION VALUE="435">Oporto (Leixoes), Portugal<OPTION VALUE="831">Osaka, Japan<OPTION VALUE="171">Oslo, Norway<OPTION VALUE="173">Palermo, Sicily, Italy<OPTION VALUE="174">Palma de Mallorca, Spain<OPTION VALUE="361">Panama City, Panama<OPTION VALUE="176">Papeete, Tahiti, Society Islands<OPTION VALUE="178">Paris (Le Havre), France<OPTION VALUE="852">Perth (Fremantle), Australia<OPTION VALUE="577">Philadelphia, PA<OPTION VALUE="370">Phuket, Thailand<OPTION VALUE="305">Port Canaveral, FL<OPTION VALUE="671">Port Louis, Mauritius<OPTION VALUE="188">Portland, ME<OPTION VALUE="1691">Portsmouth, England<OPTION VALUE="1647">Portugal (Any Port)<OPTION VALUE="803">Providence, RI<OPTION VALUE="464">Puerto Caldera, Costa Rica<OPTION VALUE="1569">Puerto Rico (Any Port)<OPTION VALUE="192">Puerto Vallarta, Mexico<OPTION VALUE="567">Punta Arenas, Chile<OPTION VALUE="584">Puntarenas, Costa Rica<OPTION VALUE="195">Quebec City, QC, Canada<OPTION VALUE="887">Ravenna, Italy<OPTION VALUE="198">Recife, Brazil<OPTION VALUE="199">Reykjavik, Iceland<OPTION VALUE="200">Rhodes, Greece<OPTION VALUE="202">Rio de Janeiro, Brazil<OPTION VALUE="203">Rome (Civitavecchia), Italy<OPTION VALUE="324">Rotterdam, Holland<OPTION VALUE="1052">Russian Waterways<OPTION VALUE="824">Salvador, Brazil<OPTION VALUE="207">San Diego, CA<OPTION VALUE="325">San Francisco, CA<OPTION VALUE="2035">San Jose, Costa Rica<OPTION VALUE="210">San Juan, Puerto Rico<OPTION VALUE="656">Santiago (San Antonio), Chile<OPTION VALUE="212">Santiago (Valparaiso), Chile<OPTION VALUE="1247">Santo Domingo, Dominican Republic<OPTION VALUE="859">Sao Paulo (Santos), Brazil<OPTION VALUE="1314">Savona, Italy<OPTION VALUE="313">Seattle, WA<OPTION VALUE="404">Seville, Spain<OPTION VALUE="2026">Seychelles (Any Port)<OPTION VALUE="217">Shanghai, China<OPTION VALUE="344">Singapore<OPTION VALUE="1652">Spain (Any Port)<OPTION VALUE="229">St. Lucia<OPTION VALUE="230">St. Maarten<OPTION VALUE="231">St. Martin<OPTION VALUE="342">St. Petersburg, Russia<OPTION VALUE="233">St. Thomas, U.S. Virgin Islands<OPTION VALUE="1553">Stockholm, Sweden<OPTION VALUE="238">Sydney, Australia<OPTION VALUE="239">Tahiti, French Polynesia<OPTION VALUE="315">Tampa, FL<OPTION VALUE="2041">Tasmania (Any Port), Australia<OPTION VALUE="1325">Tenerife, Canary Islands<OPTION VALUE="2031">Tokyo (Harumi), Japan<OPTION VALUE="3642">Tokyo (Koto City), Japan<OPTION VALUE="902">Tokyo (Yokohama), Japan<OPTION VALUE="814">Toronto, ON, Canada<OPTION VALUE="618">Toulon, France<OPTION VALUE="1493">Trieste, Italy<OPTION VALUE="447">Tromso, Norway<OPTION VALUE="442">Trondheim, Norway<OPTION VALUE="1656">Turkey (Any Port)<OPTION VALUE="568">Ushuaia, Argentina<OPTION VALUE="735">Valencia, Spain<OPTION VALUE="438">Valletta, Malta<OPTION VALUE="253">Vancouver, BC, Canada<OPTION VALUE="256">Venice, Italy
                            </SELECT>
                          </td>
                          </tr>

                          <tr>
                          <td class="vtgtdleft">
                            <SELECT NAME="VPortID" CLASS="nn" style="width:325px;">
                              <OPTION VALUE="0">Choose a Port or Place to Visit
                              <OPTION VALUE="670">Abu Dhabi, United Arab Emirates<OPTION VALUE="4">Acapulco, Mexico<OPTION VALUE="669">Adelaide, Australia<OPTION VALUE="483">Ajaccio, Corsica, France<OPTION VALUE="451">Alesund, Norway<OPTION VALUE="268">Alicante, Spain<OPTION VALUE="700">Amalfi, Italy<OPTION VALUE="2271">Amber Cove, Dominican Republic<OPTION VALUE="7">Amsterdam, Holland<OPTION VALUE="1790">Anchorage (Any Port), AK<OPTION VALUE="8">Anchorage (Seward), AK<OPTION VALUE="1090">Anchorage (Whittier), AK<OPTION VALUE="1789">Anchorage, AK<OPTION VALUE="424">Ancona, Italy<OPTION VALUE="799">Annapolis, MD<OPTION VALUE="1346">Antarctic Peninsula<OPTION VALUE="1797">Antibes, France<OPTION VALUE="9">Antigua<OPTION VALUE="1907">Antipodes Island, New Zealand<OPTION VALUE="1889">Aomori, Japan<OPTION VALUE="2461">Aride, Seychelles<OPTION VALUE="456">Arrecife, Lanzarote, Canary Islands<OPTION VALUE="11">Aruba<OPTION VALUE="354">Astoria, OR<OPTION VALUE="12">Athens (Piraeus), Greece<OPTION VALUE="1954">Atlasov Island, Kuril Islands, Russia<OPTION VALUE="13">Auckland, New Zealand<OPTION VALUE="18">Balboa, Panama<OPTION VALUE="19">Bali, Indonesia<OPTION VALUE="362">Baltimore, MD<OPTION VALUE="1802">Bandol, France<OPTION VALUE="1724">Banff, AB, Canada<OPTION VALUE="1692">Bangkok (Klong Toey), Thailand<OPTION VALUE="1228">Bangkok (Laem Chabang), Thailand<OPTION VALUE="21">Bar Harbor, ME<OPTION VALUE="22">Barbados<OPTION VALUE="23">Barcelona, Spain<OPTION VALUE="436">Bari, Italy<OPTION VALUE="972">Basel, Switzerland<OPTION VALUE="953">Bay of Islands, New Zealand<OPTION VALUE="1508">Bayonne, NJ<OPTION VALUE="903">Beijing (Tianjin), China<OPTION VALUE="341">Beijing (Xingang), China<OPTION VALUE="915">Belem, Brazil<OPTION VALUE="322">Belfast, Northern Ireland<OPTION VALUE="27">Belize City, Belize<OPTION VALUE="1891">Benoa, Bali<OPTION VALUE="271">Bequia, Grenadines<OPTION VALUE="28">Bergen, Norway<OPTION VALUE="30">Berlin (Warnemunde), Germany<OPTION VALUE="1009">Berlin, Germany<OPTION VALUE="494">Bilbao, Spain<OPTION VALUE="1747">Bodo, Norway<OPTION VALUE="395">Bodrum, Turkey<OPTION VALUE="31">Bombay (Mumbai), India<OPTION VALUE="32">Bonaire<OPTION VALUE="430">Bonifacio, Corsica, France<OPTION VALUE="33">Bora Bora, Society Islands<OPTION VALUE="34">Bordeaux, France<OPTION VALUE="35">Boston, MA<OPTION VALUE="1909">Bounty Islands, New Zealand<OPTION VALUE="1639">Brazil (Any Port)<OPTION VALUE="36">Bremerhaven, Germany<OPTION VALUE="37">Brisbane, Australia<OPTION VALUE="666">Broome, Australia<OPTION VALUE="38">Buenos Aires, Argentina<OPTION VALUE="194">Busan, South Korea<OPTION VALUE="1002">Buzios, Brazil<OPTION VALUE="39">Cabo San Lucas, Mexico<OPTION VALUE="40">Cadiz, Spain<OPTION VALUE="382">Cairns, Australia<OPTION VALUE="187">Cairo (Port Said), Egypt<OPTION VALUE="42">Cairo / Giza (Alexandria), Egypt<OPTION VALUE="1489">California (Any Port)<OPTION VALUE="43">Canary Islands (Any Port), Spanish Territory<OPTION VALUE="1857">Canberra, Australia<OPTION VALUE="403">Cannes, France<OPTION VALUE="1054">Cape Horn<OPTION VALUE="46">Cape Town, South Africa<OPTION VALUE="2605">Cardiff, Wales<OPTION VALUE="49">Cartagena, Colombia<OPTION VALUE="1025">Cartagena, Spain<OPTION VALUE="50">Casablanca, Morocco<OPTION VALUE="1201">Castaway Cay, Bahamas<OPTION VALUE="275">Catalina Island, CA<OPTION VALUE="387">Catania, Sicily, Italy<OPTION VALUE="329">Charleston, SC<OPTION VALUE="51">Charlottetown, PE, Canada<OPTION VALUE="1910">Chatham Islands, New Zealand<OPTION VALUE="3616">Chicago (Iroquois Landing), IL<OPTION VALUE="1852">Chios, Greece<OPTION VALUE="848">Christchurch (Lyttelton), New Zealand<OPTION VALUE="2133">Cleveland, OH<OPTION VALUE="369">Cochin, India<OPTION VALUE="276">CocoCay, Bahamas<OPTION VALUE="345">College Fjord, AK<OPTION VALUE="57">Colombo, Sri Lanka<OPTION VALUE="590">Colon, Panama<OPTION VALUE="58">Constanta, Romania<OPTION VALUE="59">Copenhagen, Denmark<OPTION VALUE="1808">Corcovado, Costa Rica<OPTION VALUE="60">Corfu, Greece<OPTION VALUE="600">Cork (Cobh), Ireland<OPTION VALUE="417">Costa Maya, Mexico<OPTION VALUE="931">Costa Rica (Any Port)<OPTION VALUE="278">Cozumel, Mexico<OPTION VALUE="1810">Crete (Chania), Greece<OPTION VALUE="63">Crete (Heraklion), Greece<OPTION VALUE="1640">Croatia (Any Port)<OPTION VALUE="64">Curacao<OPTION VALUE="1338">Curieuse, Seychelles<OPTION VALUE="537">Da Nang, Vietnam<OPTION VALUE="66">Dakar, Senegal<OPTION VALUE="1858">Dalyan River, Turkey<OPTION VALUE="1815">Darien Jungle, Panama<OPTION VALUE="371">Darwin, Australia<OPTION VALUE="1631">Deception Island, Antarctica<OPTION VALUE="1548">Denali National Park & Preserve, AK<OPTION VALUE="2160">Detroit, MI<OPTION VALUE="71">Dominica<OPTION VALUE="72">Dominican Republic<OPTION VALUE="1854">Dravuni Island, Fiji<OPTION VALUE="368">Dubai, United Arab Emirates<OPTION VALUE="74">Dublin, Ireland<OPTION VALUE="75">Dubrovnik, Croatia<OPTION VALUE="849">Dunedin (Port Chalmers), New Zealand<OPTION VALUE="77">Durban, South Africa<OPTION VALUE="78">Easter Island, Chilean dependency<OPTION VALUE="79">Edinburgh (Leith), Scotland<OPTION VALUE="2623">Edinburgh (Newhaven), Scotland<OPTION VALUE="555">Edinburgh (Rosyth), Scotland<OPTION VALUE="1605">Edinburgh, Scotland<OPTION VALUE="1044">Elbe River<OPTION VALUE="1913">Enderby Island, New Zealand<OPTION VALUE="81">Ensenada, Mexico<OPTION VALUE="334">Ephesus / Kusadasi, Turkey<OPTION VALUE="1920">Espiritu Santo, Vanuatu<OPTION VALUE="2067">Fair Isle, Scotland<OPTION VALUE="970">Fairbanks, AK<OPTION VALUE="1788">Falmouth, Jamaica<OPTION VALUE="1901">Fergusson Island, Papua New Guinea<OPTION VALUE="82">Fiji<OPTION VALUE="2118">Fishguard, Wales<OPTION VALUE="412">Flam, Norway<OPTION VALUE="83">Florence / Pisa (Livorno), Italy<OPTION VALUE="1324">Florida (Any Port)<OPTION VALUE="320">Fort Lauderdale, FL<OPTION VALUE="693">Fort-de-France, Martinique<OPTION VALUE="352">Fortaleza, Brazil<OPTION VALUE="332">Freeport (Port Lucaya), Bahamas<OPTION VALUE="2199">Freetown, Sierra Leone<OPTION VALUE="1842">Friday Harbor, WA<OPTION VALUE="1240">Fujairah, United Arab Emirates<OPTION VALUE="318">Funchal, Madeira, Portugal<OPTION VALUE="1563">Galapagos Islands (Any Port), Ecuador<OPTION VALUE="326">Galveston, TX<OPTION VALUE="1822">Gatun Lake, Panama<OPTION VALUE="517">Gdansk (Gdynia), Poland<OPTION VALUE="439">Geiranger, Norway<OPTION VALUE="86">Genoa, Italy<OPTION VALUE="1775">Gettysburg, PA<OPTION VALUE="88">Gibraltar, UK Territory<OPTION VALUE="1847">Gili Islands, Indonesia<OPTION VALUE="3163">Gjesværstappan Islands, Norway<OPTION VALUE="1546">Glacier Bay National Park & Preserve, AK<OPTION VALUE="434">Glasgow (Greenock), Scotland<OPTION VALUE="552">Goa (Mormugao), India<OPTION VALUE="1823">Golfo Dulce, Costa Rica<OPTION VALUE="894">Gothenburg, Sweden<OPTION VALUE="1838">Grand Bahama Island, Bahamas<OPTION VALUE="1685">Grand Canary Island, Canary Islands<OPTION VALUE="89">Grand Cayman, Cayman Islands<OPTION VALUE="1236">Grand Turk, Turks and Caicos Islands<OPTION VALUE="284">Great Stirrup Cay, Bahamas<OPTION VALUE="1786">Greece (Any Port)<OPTION VALUE="90">Grenada<OPTION VALUE="91">Grenadines<OPTION VALUE="92">Guadeloupe<OPTION VALUE="1930">Gunung Palung National Park, Malaysia<OPTION VALUE="157">Haifa, Israel<OPTION VALUE="871">Hakodate, Japan<OPTION VALUE="97">Half Moon Cay, Bahamas<OPTION VALUE="98">Halifax, NS, Canada<OPTION VALUE="2286">Hambantota, Sri Lanka<OPTION VALUE="977">Hamburg, Germany<OPTION VALUE="100">Hamilton, Bermuda<OPTION VALUE="343">Hanoi (Haiphong), Vietnam<OPTION VALUE="550">Hanoi (Halong Bay), Vietnam<OPTION VALUE="2407">Harvest Caye, Belize<OPTION VALUE="104">Helsinki, Finland<OPTION VALUE="336">Hilo, Hawaii, HI<OPTION VALUE="105">Ho Chi Minh City (Phu My), Vietnam<OPTION VALUE="1229">Ho Chi Minh City (Saigon), Vietnam<OPTION VALUE="374">Hobart, Tasmania, Australia<OPTION VALUE="510">Holyhead, Wales<OPTION VALUE="490">Honfleur, France<OPTION VALUE="107">Hong Kong<OPTION VALUE="730">Honolulu, Oahu, HI<OPTION VALUE="2196">Houston (Any Port), TX<OPTION VALUE="111">Huatulco, Mexico<OPTION VALUE="1547">Hubbard Glacier, AK<OPTION VALUE="425">Hvar, Croatia<OPTION VALUE="112">Ibiza, Spain<OPTION VALUE="1486">Icy Strait Point, AK<OPTION VALUE="2325">Inside Passage, AK<OPTION VALUE="523">Invergordon, Scotland<OPTION VALUE="2045">Iqaluit, Canada<OPTION VALUE="1997">Ishigaki Island, Japan<OPTION VALUE="1973">Israel (Any Port)<OPTION VALUE="114">Istanbul, Turkey<OPTION VALUE="1225">Itajai, Brazil<OPTION VALUE="1787">Italy (Any Port)<OPTION VALUE="823">Jacksonville, FL<OPTION VALUE="929">Jamaica (Any Port)<OPTION VALUE="1923">Jayapura, Papua Province, Indonesia<OPTION VALUE="117">Jerusalem / Tel Aviv (Ashdod), Israel<OPTION VALUE="3490">Johannesburg, South Africa<OPTION VALUE="579">Jost Van Dyke, British Virgin Islands<OPTION VALUE="118">Juneau, AK<OPTION VALUE="295">Kahului, Maui, HI<OPTION VALUE="1728">Kangerlussuaq, Greenland<OPTION VALUE="1573">Kauai (Any Port), HI<OPTION VALUE="1721">Kenai, AK<OPTION VALUE="120">Ketchikan, AK<OPTION VALUE="121">Key West, FL<OPTION VALUE="561">Kiel, Germany<OPTION VALUE="1805">Kilauea Volcano, HI<OPTION VALUE="418">King's Wharf, Bermuda<OPTION VALUE="1688">Kirkenes, Norway<OPTION VALUE="1814">Kjollefjord, Norway<OPTION VALUE="1203">Klaipeda, Lithuania<OPTION VALUE="651">Ko Samui, Thailand<OPTION VALUE="825">Kobe, Japan<OPTION VALUE="833">Kodiak, AK<OPTION VALUE="545">Komodo, Indonesia<OPTION VALUE="337">Kona, Hawaii, HI<OPTION VALUE="1682">Koper, Slovenia<OPTION VALUE="662">Kota Kinabalu, Malaysia<OPTION VALUE="1322">Kotor, Montenegro<OPTION VALUE="340">Kuala Lumpur (Port Kelang), Malaysia<OPTION VALUE="1312">Kushiro, Japan<OPTION VALUE="432">La Coruna, Spain<OPTION VALUE="629">La Digue, Seychelles<OPTION VALUE="292">La Goulette, Tunisia<OPTION VALUE="1058">La Paz, Mexico<OPTION VALUE="1187">La Possession, Reunion Island<OPTION VALUE="274">La Romana (Casa de Campo), Dominican Republic<OPTION VALUE="293">Labadee, Haiti<OPTION VALUE="140">Lahaina, Maui, HI<OPTION VALUE="1583">Lake Erie<OPTION VALUE="1581">Lake Huron<OPTION VALUE="1584">Lake Michigan<OPTION VALUE="1582">Lake Ontario<OPTION VALUE="877">Langkawi, Malaysia<OPTION VALUE="486">Lanzarote, Canary Islands<OPTION VALUE="487">Las Palmas, Grand Canary Island, Canary Islands<OPTION VALUE="540">Lautoka, Fiji<OPTION VALUE="416">Lerwick, Shetland Islands, Scotland<OPTION VALUE="127">Lima (Callao), Peru<OPTION VALUE="128">Limassol, Cyprus<OPTION VALUE="129">Lisbon, Portugal<OPTION VALUE="1479">Liverpool, England<OPTION VALUE="1204">Lombok, Indonesia<OPTION VALUE="928">London (Any Port), England<OPTION VALUE="130">London (Dover), England<OPTION VALUE="380">London (Harwich), England<OPTION VALUE="131">London (Southampton), England<OPTION VALUE="904">London (Tilbury), England<OPTION VALUE="910">London (Tower Bridge), England<OPTION VALUE="522">Londonderry, Northern Ireland<OPTION VALUE="1730">Longyearbyen, Spitsbergen, Norway<OPTION VALUE="2232">Los Angeles (Any Port), CA<OPTION VALUE="1353">Los Angeles (Long Beach), CA<OPTION VALUE="2230">Los Angeles (San Pedro), CA<OPTION VALUE="474">Luxor (Safaga), Egypt<OPTION VALUE="1633">Maceio, Brazil<OPTION VALUE="2025">Madagascar (Any Port)<OPTION VALUE="1511">Madrid, Spain<OPTION VALUE="628">Mahe, Seychelles<OPTION VALUE="136">Malaga, Spain<OPTION VALUE="3614">Maldives (Any Port)<OPTION VALUE="536">Male, Maldives<OPTION VALUE="2195">Malmö, Sweden<OPTION VALUE="638">Manaus, Brazil<OPTION VALUE="714">Mangalore, India<OPTION VALUE="663">Manila, Philippines<OPTION VALUE="137">Manta, Ecuador<OPTION VALUE="1827">Maputo, Mozambique<OPTION VALUE="1937">Maria Island, Tasmania, Australia<OPTION VALUE="607">Marmaris, Turkey<OPTION VALUE="294">Marseille, France<OPTION VALUE="265">Martha's Vineyard, MA<OPTION VALUE="139">Martinique<OPTION VALUE="1572">Maui (Any Port), HI<OPTION VALUE="1939">Maumere, Flores, Indonesia<OPTION VALUE="603">Mayreau, Grenadines<OPTION VALUE="142">Mazatlan, Mexico<OPTION VALUE="143">Melbourne, Australia<OPTION VALUE="857">Merida (Progreso), Mexico<OPTION VALUE="379">Messina, Sicily, Italy<OPTION VALUE="281">Miami, FL<OPTION VALUE="1675">Milford Haven, Wales<OPTION VALUE="2131">Milos, Greece<OPTION VALUE="2134">Milwaukee, WI<OPTION VALUE="1837">Misty Fjords National Monument, AK<OPTION VALUE="748">Mobile, AL<OPTION VALUE="146">Mombasa, Kenya<OPTION VALUE="298">Monte Carlo, Monaco<OPTION VALUE="148">Montego Bay, Jamaica<OPTION VALUE="1212">Monterey, CA<OPTION VALUE="149">Montevideo, Uruguay<OPTION VALUE="150">Montreal, QC, Canada<OPTION VALUE="151">Moorea, Society Islands<OPTION VALUE="367">Muscat, Oman<OPTION VALUE="152">Mykonos, Greece<OPTION VALUE="1311">Nadi, Fiji<OPTION VALUE="156">Nafplion, Greece<OPTION VALUE="153">Nagasaki, Japan<OPTION VALUE="154">Naples / Capri (Sorrento), Italy<OPTION VALUE="1316">Naples, Italy<OPTION VALUE="299">Nassau, Bahamas<OPTION VALUE="291">Nawiliwili, Kauai, HI<OPTION VALUE="158">Nesebur, Bulgaria<OPTION VALUE="160">New Orleans, LA<OPTION VALUE="1509">New York (Any Port), NY<OPTION VALUE="1566">New York (Brooklyn), NY<OPTION VALUE="2494">New York (Chelsea Piers), NY<OPTION VALUE="161">New York (Manhattan), NY<OPTION VALUE="999">Newcastle-upon-Tyne, England<OPTION VALUE="162">Newport, RI<OPTION VALUE="163">Nha Trang, Vietnam<OPTION VALUE="3634">Niagara Falls, ON, Canada<OPTION VALUE="317">Nice (Villefranche), France<OPTION VALUE="1781">Nice, France<OPTION VALUE="1096">Nome, AK<OPTION VALUE="473">Norfolk, VA<OPTION VALUE="1248">Nosy Be, Madagascar<OPTION VALUE="627">Nosy Komba, Madagascar<OPTION VALUE="541">Noumea, New Caledonia<OPTION VALUE="168">Ocho Rios, Jamaica<OPTION VALUE="169">Odessa, Ukraine<OPTION VALUE="441">Olden, Norway<OPTION VALUE="170">Olympia (Katakolon), Greece<OPTION VALUE="435">Oporto (Leixoes), Portugal<OPTION VALUE="831">Osaka, Japan<OPTION VALUE="171">Oslo, Norway<OPTION VALUE="925">Otaru, Japan<OPTION VALUE="637">Pago Pago, American Samoa<OPTION VALUE="173">Palermo, Sicily, Italy<OPTION VALUE="174">Palma de Mallorca, Spain<OPTION VALUE="930">Panama Canal (Full or Partial Transit)<OPTION VALUE="302">Panama Canal (Full Transit)<OPTION VALUE="303">Panama Canal (Partial Transit)<OPTION VALUE="361">Panama City, Panama<OPTION VALUE="176">Papeete, Tahiti, Society Islands<OPTION VALUE="1848">Paradise Bay, Antarctica<OPTION VALUE="1991">Pare Pare, Indonesia<OPTION VALUE="178">Paris (Le Havre), France<OPTION VALUE="1148">Paris, France<OPTION VALUE="396">Patmos, Greece<OPTION VALUE="2833">Pembroke, Wales<OPTION VALUE="179">Penang, Malaysia<OPTION VALUE="852">Perth (Fremantle), Australia<OPTION VALUE="365">Petra (Aqaba), Jordan<OPTION VALUE="936">Petropavlovsk, Kamchatka, Russia<OPTION VALUE="577">Philadelphia, PA<OPTION VALUE="370">Phuket, Thailand<OPTION VALUE="921">Pitcairn Island, UK Territory<OPTION VALUE="672">Pointe des Galets, Reunion Island<OPTION VALUE="304">Ponta Delgada, Portugal<OPTION VALUE="305">Port Canaveral, FL<OPTION VALUE="671">Port Louis, Mauritius<OPTION VALUE="569">Port Stanley, Falkland Islands<OPTION VALUE="188">Portland, ME<OPTION VALUE="591">Portland, OR<OPTION VALUE="1691">Portsmouth, England<OPTION VALUE="1647">Portugal (Any Port)<OPTION VALUE="1980">Praslin, Seychelles<OPTION VALUE="307">Princess Cays, Bahamas<OPTION VALUE="803">Providence, RI<OPTION VALUE="464">Puerto Caldera, Costa Rica<OPTION VALUE="1246">Puerto Cortes, Honduras<OPTION VALUE="641">Puerto Limon, Costa Rica<OPTION VALUE="564">Puerto Montt, Chile<OPTION VALUE="461">Puerto Quetzal, Guatemala<OPTION VALUE="1569">Puerto Rico (Any Port)<OPTION VALUE="192">Puerto Vallarta, Mexico<OPTION VALUE="1876">Puget Sound, WA<OPTION VALUE="567">Punta Arenas, Chile<OPTION VALUE="193">Punta del Este, Uruguay<OPTION VALUE="584">Puntarenas, Costa Rica<OPTION VALUE="1664">Pylos, Greece<OPTION VALUE="195">Quebec City, QC, Canada<OPTION VALUE="1517">Quito, Ecuador<OPTION VALUE="1951">Raja Ampat, Papua Province, Indonesia<OPTION VALUE="654">Rarotonga, Cook Islands<OPTION VALUE="887">Ravenna, Italy<OPTION VALUE="198">Recife, Brazil<OPTION VALUE="199">Reykjavik, Iceland<OPTION VALUE="200">Rhodes, Greece<OPTION VALUE="673">Richards Bay, South Africa<OPTION VALUE="201">Riga, Latvia<OPTION VALUE="202">Rio de Janeiro, Brazil<OPTION VALUE="308">Roatan, Honduras<OPTION VALUE="203">Rome (Civitavecchia), Italy<OPTION VALUE="592">Roseau, Dominica<OPTION VALUE="1952">Ross Sea Region, Antarctica<OPTION VALUE="324">Rotterdam, Holland<OPTION VALUE="1629">Rovinj, Croatia<OPTION VALUE="1600">Saguenay, QC, Canada<OPTION VALUE="1205">Saint John, NB, Canada<OPTION VALUE="3317">Saint-Denis, Réunion Island<OPTION VALUE="553">Salalah, Oman<OPTION VALUE="609">Salerno, Italy<OPTION VALUE="824">Salvador, Brazil<OPTION VALUE="207">San Diego, CA<OPTION VALUE="325">San Francisco, CA<OPTION VALUE="2035">San Jose, Costa Rica<OPTION VALUE="210">San Juan, Puerto Rico<OPTION VALUE="1982">Santa Ana Island, Solomons<OPTION VALUE="991">Santa Cruz, Tenerife, Canary Islands<OPTION VALUE="656">Santiago (San Antonio), Chile<OPTION VALUE="212">Santiago (Valparaiso), Chile<OPTION VALUE="1247">Santo Domingo, Dominican Republic<OPTION VALUE="1221">Santo Tomas de Castilla, Guatemala<OPTION VALUE="213">Santorini, Greece<OPTION VALUE="859">Sao Paulo (Santos), Brazil<OPTION VALUE="647">Sapporo (Muroran), Japan<OPTION VALUE="2220">Sarande, Albania<OPTION VALUE="1314">Savona, Italy<OPTION VALUE="313">Seattle, WA<OPTION VALUE="1047">Seine River<OPTION VALUE="664">Semarang, Indonesia<OPTION VALUE="404">Seville, Spain<OPTION VALUE="2026">Seychelles (Any Port)<OPTION VALUE="217">Shanghai, China<OPTION VALUE="364">Sharm-El-Sheikh, Egypt<OPTION VALUE="2019">Sicily (Any Port)<OPTION VALUE="854">Sihanoukville, Cambodia<OPTION VALUE="344">Singapore<OPTION VALUE="218">Sitka, AK<OPTION VALUE="219">Skagway, AK<OPTION VALUE="2846">Skjoldungen, Greenland<OPTION VALUE="1665">Sokhna, Egypt<OPTION VALUE="1317">Sorrento, Italy<OPTION VALUE="1652">Spain (Any Port)<OPTION VALUE="515">Split, Croatia<OPTION VALUE="222">St. Barts<OPTION VALUE="223">St. Croix, U.S. Virgin Islands<OPTION VALUE="226">St. John, U.S. Virgin Islands<OPTION VALUE="227">St. Kitts<OPTION VALUE="1580">St. Lawrence Seaway<OPTION VALUE="229">St. Lucia<OPTION VALUE="230">St. Maarten<OPTION VALUE="231">St. Martin<OPTION VALUE="3444">St. Paul, AK<OPTION VALUE="529">St. Peter Port, Guernsey, Channel Islands<OPTION VALUE="342">St. Petersburg, Russia<OPTION VALUE="233">St. Thomas, U.S. Virgin Islands<OPTION VALUE="234">St. Tropez, France<OPTION VALUE="235">St. Vincent<OPTION VALUE="1774">Staunton, VA<OPTION VALUE="560">Stavanger, Norway<OPTION VALUE="1553">Stockholm, Sweden<OPTION VALUE="237">Suez Canal<OPTION VALUE="882">Suva, Fiji<OPTION VALUE="1731">Svalbard Archipelago, Norway<OPTION VALUE="238">Sydney, Australia<OPTION VALUE="527">Sydney, NS, Canada<OPTION VALUE="2659">Sylvan Beach, NY<OPTION VALUE="239">Tahiti, French Polynesia<OPTION VALUE="826">Taipei (Keelung), Taiwan<OPTION VALUE="1706">Talkeetna, AK<OPTION VALUE="240">Tallinn, Estonia<OPTION VALUE="1955">Tami Islands, Papua New Guinea<OPTION VALUE="315">Tampa, FL<OPTION VALUE="381">Tangier, Morocco<OPTION VALUE="241">Taormina (Giardini Naxos), Sicily, Italy<OPTION VALUE="372">Tauranga, New Zealand<OPTION VALUE="1325">Tenerife, Canary Islands<OPTION VALUE="2031">Tokyo (Harumi), Japan<OPTION VALUE="3642">Tokyo (Koto City), Japan<OPTION VALUE="902">Tokyo (Yokohama), Japan<OPTION VALUE="2311">Tolanaro (Fort Dauphin), Madagascar<OPTION VALUE="814">Toronto, ON, Canada<OPTION VALUE="246">Tortola, British Virgin Islands<OPTION VALUE="618">Toulon, France<OPTION VALUE="1659">Tracy Arm (Twin Sawyer Glaciers), AK<OPTION VALUE="1493">Trieste, Italy<OPTION VALUE="2643">Trincomalee, Sri Lanka<OPTION VALUE="249">Trinidad<OPTION VALUE="1800">Trogir, Croatia<OPTION VALUE="447">Tromso, Norway<OPTION VALUE="442">Trondheim, Norway<OPTION VALUE="1656">Turkey (Any Port)<OPTION VALUE="1571">Turks and Caicos<OPTION VALUE="568">Ushuaia, Argentina<OPTION VALUE="251">Valdez, AK<OPTION VALUE="735">Valencia, Spain<OPTION VALUE="438">Valletta, Malta<OPTION VALUE="253">Vancouver, BC, Canada<OPTION VALUE="1914">Vansittart Bay, Australia<OPTION VALUE="254">Vanuatu<OPTION VALUE="256">Venice, Italy<OPTION VALUE="258">Victoria, BC, Canada<OPTION VALUE="534">Victoria, Seychelles<OPTION VALUE="321">Vigo, Spain<OPTION VALUE="259">Virgin Gorda, British Virgin Islands<OPTION VALUE="449">Visby, Sweden<OPTION VALUE="648">Vladivostok, Russia<OPTION VALUE="476">Walvis Bay, Namibia<OPTION VALUE="2033">Warren, RI<OPTION VALUE="634">Wellington, New Zealand<OPTION VALUE="1963">Wewak, Papua New Guinea<OPTION VALUE="1702">Whitehorse, YT, Canada<OPTION VALUE="1773">Williamsburg, VA<OPTION VALUE="1256">Wrangell, AK<OPTION VALUE="2150">Wyandotte, MI<OPTION VALUE="1011">Yangon (Thilawa), Myanmar<OPTION VALUE="1607">Zadar, Croatia<OPTION VALUE="516">Zeebrugge, Belgium<OPTION VALUE="1969">Zhupanova, Kamchatka, Russia
                            </SELECT>
                          </td>
                          </tr>

                          <tr>
                          <td class="vtgtdleft">
                            <INPUT TYPE="CHECKBOX" NAME="RoundTrip" VALUE="Y" ><FONT class="vtgticfont2" COLOR=BLACK>Return to Same Port</FONT>
                          </td>
                          </tr>

                          <tr>
                          <td ALIGN=CENTER style="padding-top: 8px;"><INPUT TYPE=IMAGE BORDER=0 src="/images/show-me-the-deals-v3.png" ALT="Show Me the Deals"></td>
                          </tr>

                        </table>

                        </FORM>


                        <script type="text/javascript" language="JavaScript">
                          
                        </script>
                      </div>  
                    </div>

                  </div>  


                  
                  


<div id="Reg31Div" style="width:100%; display:none;">

  <div class="SearchContainer" style="text-align:center; margin-left:auto; margin-right:auto;">
    
    
    <form id="FormRegion31" name="FormRegion31" action="/ticker.cfm" method="post" style="margin-top:0px; margin-bottom:0px;">
    

    <input type="hidden" name="Month" value="0" />

    <input type="hidden" name="A1RegionID" value="0" />
    <input type="hidden" name="A2RegionID" value="0" />
    <input type="hidden" name="A3RegionID" value="0" />

    <input type="hidden" name="ShipRating" value="0" />
    <input type="hidden" name="MinDay" value="0" />
    <input type="hidden" name="MaxDay" value="0" />
    <input type="hidden" name="StateRoom" value="0" />
    <input type="hidden" name="Occupancy" value="2" />
    <input type="hidden" name="MinPrice" value="0" />
    <input type="hidden" name="MaxPrice" value="0" />
    <input type="hidden" name="MinRating" value="0" />
    <input type="hidden" name="MaxRating" value="0" />
    <input type="hidden" name="MinSize" value="0" />
    <input type="hidden" name="MaxSize" value="0" />
    <input type="hidden" name="ExPortID" value="0" />
    <input type="hidden" name="ExA1PortID" value="0" />

    <input type="hidden" name="A1LineID" value="0" />
    <input type="hidden" name="A2LineID" value="0" />
    <input type="hidden" name="A3LineID" value="0" />
    <input type="hidden" name="ExclLineID" value="0" />
    <input type="hidden" name="ExclA1LineID" value="0" />

    <input type="hidden" name="A1ShipID" value="0" />
    <input type="hidden" name="A2ShipID" value="0" />
    <input type="hidden" name="A3ShipID" value="0" />

    <input type="hidden" name="DA1PortID" value="0" />
    <input type="hidden" name="DA2PortID" value="0" />
    <input type="hidden" name="DA3PortID" value="0" />

    <input type="hidden" name="VA1PortID" value="0" />
    <input type="hidden" name="VA2PortID" value="0" />
    <input type="hidden" name="VA3PortID" value="0" />


    



    <table id="Reg31Table" cellpadding="0" cellspacing="2" border="0">

    <tr>
    <td class="tAlignL">
    
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
      <td class="fab">

        <div style="margin-bottom:2px;">


          <select name="SMonth" 
            style="width:130px;"  ><option value="0">From Month</option><option value="20205">May 2020</option><option value="20206">June 2020</option><option value="20207">July 2020</option><option value="20208">August 2020</option><option value="20209">September 2020</option></select> <select name="SDay" 
            style="width:81px;"  ><option value="0" selected>Any Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> 
            </div>
            <div>
          <select name="TMonth" 
            style="width:130px;"  ><option value="0">To Month</option><option value="20205">May 2020</option><option value="20206">June 2020</option><option value="20207">July 2020</option><option value="20208">August 2020</option><option value="20209">September 2020</option></select> <select name="TDay" 
            style="width:81px;"  ><option value="0" selected>Any Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>

        </div>

      </td>
      <td></td>
      </tr>
      </table>
    
    </td>
    </tr>
    


    

      <tr>
      <td class="tAlignL">
      
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
        <td class="fab">


          <select name="RegionID" 
              style="width:215px;"  ><option value="0">Choose a Region</option><option value="16">Africa</option><option value="9">Alaska</option><option value="31" selected>Alaska Cruise & Land Tour</option><option value="36">Antarctica</option><option value="80">Arctic</option><option value="17">Asia</option><option value="49">Asia Cruise & Land Tour</option><option value="15">Australia & New Zealand</option><option value="48">Australia & New Zealand Cruise & Land Tour</option><option value="30">Bahamas</option><option value="84">Baltic</option><option value="18">Bermuda</option><option value="69">Black Sea</option><option value="83">British Isles</option><option value="82">Canary Islands</option><option value="13">Caribbean (All)</option><option value="42">Caribbean (Eastern)</option><option value="43">Caribbean (Southern)</option><option value="44">Caribbean (Western)</option><option value="19">Eastern Canada & New England</option><option value="51">Eastern Canada & New England Cruise & Land Tour</option><option value="71">Europe (All)</option><option value="45">Europe Cruise & Land Tour</option><option value="68">Galapagos</option><option value="87">Great Lakes</option><option value="37">Greek Islands</option><option value="21">Hawaii</option><option value="88">Indian Ocean</option><option value="11">Mediterranean (All)</option><option value="91">Mediterranean (Eastern)</option><option value="90">Mediterranean (Western) & Atlantic Islands</option><option value="22">Mexico & Central America</option><option value="33">Middle East</option><option value="24">Northern Europe</option><option value="86">Northwest Passage</option><option value="81">Norway</option><option value="39">Pacific U.S. & Canada</option><option value="14">Panama Canal</option><option value="41">Repositioning</option><option value="25">South America</option><option value="47">South America Cruise & Land Tour</option><option value="89">Southeast Asia Islands</option><option value="29">Southeastern U.S.</option><option value="50">Tahiti & South Pacific Islands</option><option value="26">Transatlantic</option><option value="34">Transpacific</option><option value="35">World</option></select>


        </td>
        <td></td>
        </tr>
        </table>
      
      </td>
      </tr>
      


      <tr>
      <td class="tAlignL">
      
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
        <td class="fab">


          <select name="LineID" 
              style="width:215px;"  ><option value="0" selected>Choose a Cruise Line</option><option value="11">Celebrity Cruises</option><option value="5">Holland America Line</option><option value="17">Norwegian Cruise Line</option><option value="3">Princess Cruises</option><option value="14">Royal Caribbean International</option><option value="15">Windstar Cruises</option></select>


        </td>
        <td></td>
        </tr>
        </table>
      
      </td>
      </tr>
      


      <tr>
      <td class="tAlignL">
      
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
        <td class="fab">


          <select name="ShipID" 
              style="width:215px;"  ><option value="0" selected>Choose a Ship</option><option value="518">Celebrity Eclipse</option><option value="131">Celebrity Millennium</option><option value="213">Coral Princess</option><option value="67">Grand Princess</option><option value="926">Koningsdam</option><option value="51">Noordam</option><option value="327">Norwegian Jewel</option><option value="227">Pacific Princess</option><option value="172">Radiance of the Seas</option><option value="704">Royal Princess</option><option value="841">Star Breeze</option><option value="112">Volendam</option><option value="297">Westerdam</option></select>


        </td>
        <td></td>
        </tr>
        </table>
        
      </td>
      </tr>
      


      <tr>
      <td class="tAlignL">
      
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
        <td class="fab">


          <select name="Length" 
              style="width:215px;"  ><option value="0" selected>Length of Cruise</option><option value="1">3-6 Nights</option><option value="2">7 Nights</option><option value="3">8-13 Nights</option><option value="4">14+ Nights</option><option value="5">21+ Nights</option><option value="6">30+ Nights</option><option value="7">60+ Nights</option></select>


        </td>
        <td></td>
        </tr>
        </table>
        
      </td>
      </tr>
      





      <tr>
      <td class="tAlignL">
      
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
        <td class="fab">


          <select name="DPortID" 
              style="width:275px;"  ><option value="0" selected>Choose a Departure Port</option><option value="8">Anchorage (Seward), AK</option><option value="1789">Anchorage, AK</option><option value="1544">Calgary, Canada</option><option value="970">Fairbanks, AK</option><option value="313">Seattle, WA</option><option value="253">Vancouver, BC, Canada</option></select>


        </td>
        <td></td>
        </tr>
        </table>
        
      </td>
      </tr>
      


      <tr>
      <td class="tAlignL">
      
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
        <td class="fab">

          <select name="VPortID" 
              style="width:275px;"  ><option value="0" selected>Choose a Port or Place to Visit</option><option value="1722">Alyeska, AK</option><option value="8">Anchorage (Seward), AK</option><option value="1090">Anchorage (Whittier), AK</option><option value="1789">Anchorage, AK</option><option value="1724">Banff, AB, Canada</option><option value="1544">Calgary, Canada</option><option value="345">College Fjord, AK</option><option value="1693">Copper River, AK</option><option value="1183">Cordova, AK</option><option value="1708">Dawson City, YT, Canada</option><option value="1548">Denali National Park & Preserve, AK</option><option value="2405">Endicott Arm, AK</option><option value="970">Fairbanks, AK</option><option value="1546">Glacier Bay National Park & Preserve, AK</option><option value="285">Haines, AK</option><option value="106">Homer, AK</option><option value="1547">Hubbard Glacier, AK</option><option value="1486">Icy Strait Point, AK</option><option value="2325">Inside Passage, AK</option><option value="1725">Jasper, AB, Canada</option><option value="118">Juneau, AK</option><option value="1710">Kamloops, BC, Canada</option><option value="1721">Kenai, AK</option><option value="120">Ketchikan, AK</option><option value="1771">Lake Louise, Canada</option><option value="1837">Misty Fjords National Monument, AK</option><option value="2406">Point Adolphus, AK</option><option value="191">Prince Rupert, BC, Canada</option><option value="313">Seattle, WA</option><option value="218">Sitka, AK</option><option value="219">Skagway, AK</option><option value="1706">Talkeetna, AK</option><option value="1659">Tracy Arm (Twin Sawyer Glaciers), AK</option><option value="251">Valdez, AK</option><option value="253">Vancouver, BC, Canada</option><option value="1702">Whitehorse, YT, Canada</option><option value="1256">Wrangell, AK</option></select>
          <br/>

          <input type="Checkbox" name="RoundTrip" value="Y">Return to Same Port<br/>

        </td>
        <td></td>
        </tr>
        </table>
        
      </td>
      </tr>
    



    <tr>
    <td class="tAlignC">
      <input type="image" border="0" src="/images/show-me-the-deals-v3.png" style="margin-top:10px;" />
    </td>
    </tr>
    
    </table>
    </form>

  </div>

</div>




                </P>

                <p style="font-size:13px;">
                For more search options, use our <A HREF="custom.cfm" class="one-place">Custom Search</A>.
                </p>

                
                

                <br/>
              </div>  
              



  

              
              <div class="Centered750">
                

                <div align="center">
                  <p style="font-size:13px; font-weight:bold;">Key to Ship Ratings</p>

                  <table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                  <td class="vtgtdright">
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>&nbsp;
                  </td>
                  <td class="vtgtdleft" style="font-size:13px;">= Exceptional in every way</td>
                  </tr>
                  <tr>
                  <td class="vtgtdright">
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>&nbsp;
                  </td>
                  <td class="vtgtdleft" style="font-size:13px;">= Excellent</td>
                  </tr>
                  <tr>
                  <td class="vtgtdright">
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>&nbsp;
                  </td>
                  <td class="vtgtdleft" style="font-size:13px;">= Very good</td>
                  </tr>
                  <tr>
                  <td class="vtgtdright">
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>&nbsp;
                  </td>
                  <td class="vtgtdleft" style="font-size:13px;">= Good</td>
                  </tr>
                  <tr>
                  <td class="vtgtdright">
                    <IMG SRC="images/star2.gif" border="0"/>
                    <IMG SRC="images/star2.gif" border="0"/>&nbsp;
                  </td>
                  <td class="vtgtdleft" style="font-size:13px;">= Fair</td>
                  </tr>
                  <tr>
                  <td class="vtgtdright">
                    <IMG SRC="images/star2.gif" border="0"/>&nbsp;
                  </td>
                  <td class="vtgtdleft" style="font-size:13px;">= Limited appeal</td>
                  </tr>
                  </table>

                  <br/>
                  <br/>

                  <div class="vtgticfont4" style="width:720px; clear:both; padding:10px; border:1px solid gray;">
                    <B>Important Notes:</B> For information about any cruise listed, click the FastDeal # at left.
                    For information about any departure port, click the port name.
                    For information or rating of any ship, click the ship name.
                    For information about any cruise line, click the cruise line name.
                    <HR WIDTH="80%" SIZE="1" color="gray"/>
                    Availability is extremely
                    limited on all FastDeals and must be reconfirmed at time of booking. All prices are subject
                    to change without notice by cruise lines until deposit is made. Prices must be reconfirmed
                    at time of booking.<br/>Please have your credit card ready.
                  </div>


                  

                  <br/>
                  <br/>

                  <div class="vtgticfont4" style="width:420px; clear:both;">
                    <IMG SRC="/images/flags2.gif" ALT="International Visitors Click Here" BORDER=0 style="margin-bottom:7px;"/><br/>
                    International Visitors may convert US dollar price into any currency
                    by clicking any price shown on a FastDeal page.
                  </div>

                  <br/>
                  <span class="vtgticfont2">
                  <FORM>
                  <INPUT TYPE=BUTTON VALUE=" Home " style="font-size:13px;" onClick="window.location = 'index.cfm'">
                  </FORM>
                  </span>
                </div>

								

                
              </div>  
              




              <br style="clear:both;"/>
              <br/>
              




<div id="phone-cbr" align="center">
  <div style="width:500px; margin-left:auto; margin-right:auto;">

		
      <TABLE BORDER=0>
        <TR>
          <TD ALIGN=CENTER valign="middle">
            

            
                
                <span id="FooterPhone">
                  +1-713-974-2121
                </span><br/>

              
          </TD>

          
            <TD ALIGN=CENTER WIDTH="50" id="div_img_black_or">
              <img src="/images/black_or.gif" BORDER=0>
            </TD>
            <TD style="width:192px; height:42px;" id="div_img_click_to_inquire">
              

                <a href="/callback.cfm"><img src="/images/click-to-inquire_v2-new.png" border="0"/></a>

                

              
            </TD>
          

        </TR>
      </TABLE>

      

    

  </div>

</div>


<!-- Global site tag (gtag.js) - Google Ads: 1072669009 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1072669009"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1072669009');
</script>

<!-- Event snippet for Remarketing tag remarketing page -->
<script>
  gtag('event', 'conversion', {
     'send_to': 'AW-1072669009/cOe0COaD0gMQ0cK-_wM',
     'aw_remarketing_only': true
  });
</script>

              <br/>
              <br/>


</td>  
</tr>
</table>



              
<script type="text/javascript" language="javascript">
  if ( document.getElementById( "temp-left-fab" ) ) {
    var oL = null;

    
  }
</script>




<script type="text/javascript" language="JavaScript">
  if ( document.getElementById( "temp-left-fab" ) ) {
    
  }

  // For IE...
  if ( window.addEventListener ) {
    window.addEventListener( "load", function() {
      if ( document.getElementById( "temp-left-fab-ShipID" ) && document.getElementById( "temp-left-fab-LineID" ) ) {
        var oLine = document.getElementById( "temp-left-fab-LineID" );
        var oShip = document.getElementById( "temp-left-fab-ShipID" );
        var iPrev = oShip.selectedIndex;  // Save...

        if ( oLine.value && oLine.value != "0" ) {
          updateShipList( "temp-left-fab", oLine.value );

          if ( iPrev < oShip.length )
            oShip.selectedIndex = iPrev;
        }
      }
    });
  }
</script>






  <div id="footer">
    <table border="0">
    
    <tr>
      <td colspan="4" style="text-align:center!important;">
        <a href="/employ_opp.cfm"><b><u>Career Opportunities</u></b></a><br/>
        <br/>
      </td>
    </tr>
    
    <tr>
    <td>
      <div style="margin-bottom:3px;">
        <b style="color:black;">About Cruising</b>
      </div>
      <a href="/cruise_articles.cfm">Cruise Articles</a><br/>
      <a href="https://www.vacationstogonewsletters.com">Cruise Newsletter Archive</a><br/>
      <a href="/fuel_surcharge.cfm">Fuel Surcharges</a><br/>
      
      <a href="/cruise_maps.cfm">Maps</a><br/>
      <a href="/cruise_weather.cfm">Weather</a><br/>
    </td>

    <td class="padL50">
      <div style="margin-bottom:3px;">
        <b style="color:black;">Company Info</b>
      </div>
      <a href="/about.cfm">About Vacations To Go</a><br/>
      <a href="/community_involvement.cfm">Community Involvement</a><br/>
      <a href="/contact.cfm">Contact Us</a><br/>
      <a href="/vtg_leadership.cfm">Corporate Officers</a><br/>
      <a href="/testimonials.cfm">Cruise Lines Love Us</a><br/>
      <a href="/reviews.cfm">Vacations To Go Reviews</a><br/>
    </td>

    <td class="padL50">
      <div style="margin-bottom:3px;">
        <b style="color:black;">Our Newsletters</b>
      </div>
      <a href="/cruise_newsletter.cfm">Cruise Newsletter</a><br/>
      <a href="https://www.rivercruise.com/river_cruise_newsletter.cfm?source=vtgnewsletter">River Cruise Newsletter</a><br/>
      <a href="https://www.tourvacationstogo.com/tour_newsletter.cfm?source=vtgnewsletter">Tour Newsletter</a><br/>
      <a href="https://www.resortvacationstogo.com/newsletter.html?source=vtgnewsletter">Resort Newsletter</a><br/>
      <a href="https://www.africasafari.com/safari_newsletter.cfm?source=vtgnewsletter">Safari Newsletter</a><br/>
      <a href="https://www.vacationstogo.com/singles_newsletter.cfm?source=vtgnewsletter">Singles Newsletter</a><br/>
    </td>

    <td class="padL50">
      <div style="margin-bottom:3px;">
      <b style="color:black;">Site Info</b>
      </div>
      <a href="/privacy.cfm">Privacy Policy</a><br/>
      <a href="/site_map.cfm">Site Map</a><br/>
      <a href="/terms.cfm">Terms & Conditions</a><br/>
    </td>

    
    </tr>

    </table>

    
      <br/>
      <hr width="88%"/>
      <table border="0">
        <tr>
          <td valign=top><b>Office Hours:</b></td>
          <td><span style="color:MediumBlue;">Open Mon-Fri 5:30am to midnight, Sat & Sun 7am to 10pm<br>Central Time, Houston, Texas, USA</td>
        </tr>
      </table>
    

    <hr width="88%"/>
    <br/>

    <div align="center" style="margin-bottom:15px; font-size:13px!important; font-weight:bold;">
      Try Our Other Sites
    </div>

    <div align="center">
      <table border="0">
      <tr>
      <td>
        <a href="https://www.tourvacationstogo.com/?source=cruisebottom" class="footer-sites"><img src="/images/tour_footer.jpg" border="0" alt="Save 40% with Escorted &amp; Independent Tours!"/></a>
      </td>
      <td style="padding-right:25px; padding-left:3px; padding-top:7px;">
        <a href="https://www.tourvacationstogo.com/?source=cruisebottom" class="footer-sites">Save 40% with<br/>Escorted &amp;<br/>Independent Tours!</a>
      </td>

      <td>
        <a href="https://www.resortvacationstogo.com/?source=cruisebottom" class="footer-sites"><img src="/images/resort_footer.jpg" border="0" alt="Save 50% on Hotels &amp; All-Inclusive Resorts!"/></a>
      </td>
      <td style="padding-right:25px; padding-left:3px; padding-top:7px;">
        <a href="https://www.resortvacationstogo.com/?source=cruisebottom" class="footer-sites">Save 50% on<br/>Hotels &amp;<br/>All-Inclusive Resorts!</a>
      </td>

      <td>
        <a href="https://www.rivercruise.com/?source=cruisebottom" class="footer-sites"><img src="/images/river_cruise_footer.jpg" border="0" alt="Save 50% on River Cruises Worldwide!"/></a>
      </td>
      <td style="padding-right:25px; padding-left:3px; padding-top:7px;">
        <a href="https://www.rivercruise.com/?source=cruisebottom" class="footer-sites">Save 50% on<br/>River Cruises<br/>Worldwide!</a>
      </td>

      <td>
        <a href="https://www.africasafari.com/?source=cruisebottom" class="footer-sites"><img src="/images/safari_footer.jpg" border="0" alt="Africa Safaris from Budget to Luxury!"/></a>
      </td>
      <td style="padding-left:3px; padding-top:7px;">
        <a href="https://www.africasafari.com/?source=cruisebottom" class="footer-sites">Africa Safaris<br/>from<br/>Budget to Luxury!</a>
      </td>
      </tr>
      </table>
    </div>

    <br/>
    <br/>
    <div align="center" style="margin-bottom:10px;">
      <a href="/tellus.cfm"><img src="/images/tell-us-about-site.gif" border="0" alt=""/></a>
    </div>

    <div align="center" style="margin-top:15px;">
      Copyright &copy; 2019 by VacationsToGo.com. All rights reserved. CST 2072920-50
    </div>
  </div>

<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"4057686"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
<noscript><img src="//bat.bing.com/action/0?ti=4057686&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>

<script>
function getBingCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function overwriteBingCookie() {
  var cname = "_uetmsclkid";
  var cvalue = getBingCookie(cname);
  if(cname){
    var expires = "expires=Session";
    document.cookie = cname + "=" + cvalue + ";" + "domain=www.vacationstogo.com;" + expires + ";path=/";
  }
}

overwriteBingCookie();
</script>



</div> 




</body>
</HTML>
