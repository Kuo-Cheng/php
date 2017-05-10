<?php

	//Test url 
	
	//$actionUrl = "http://www.dtresearch.com/cgi-bin/cgiemail/email_templates/supportAlex.txt";
	$actionUrl = "http://www.dtresearch.com/cgi-bin/cgiemail/email_templates/".$_POST['actionUrl'];
	
	$captcha;

	//Test response data
	/*
	foreach ($_POST as $key => $value) {
		echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
	}
	*/
	
	//Ask google by the key.
	if (isset($_POST['g-recaptcha-response'])) {
		$captcha = $_POST['g-recaptcha-response'];
		//echo $captcha;
		
		//Key from google
		$privatekey = "6Ld9ogwUAAAAAMnHJOTTgJhd9PrLocFGRIR7EOpx";
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => $privatekey,
			'response' => $captcha,
			'remoteip' => $_SERVER['REMOTE_ADDR']
		);

		$curlConfig = array(
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => $data
		);

		$ch = curl_init();
		curl_setopt_array($ch, $curlConfig);
		$response = curl_exec($ch);
		curl_close($ch);
	}else{
		echo "No g-recaptcha-response data!!!";
	}

	//echo  '<br>response=';
	//echo $response;
	
	//Parse the response from google, it will be the json format
	$jsonResponse = json_decode($response);

	//echo  '<br>jsonResponse='.$jsonResponse;
	echo '<!DOCTYPE html>'.PHP_EOL;
	//echo '<html onload="submitMail();">'.PHP_EOL;
	echo '<html>'.PHP_EOL;
	echo '<head>'.PHP_EOL;
	echo '<title>mail</title>'.PHP_EOL;
	echo '<script type="text/javascript" src="/js/jquery-3.1.1.slim.min.js"></script>'.PHP_EOL;
	echo '<script type="text/javascript" src="/js/jquery-ui.min.js"></script>'.PHP_EOL;
	
	echo '<link href="http://www.dtresearch.com/css/jquery-ui-min.css" rel="stylesheet">'.PHP_EOL;
	echo '<link href="http://www.dtresearch.com/css/jquery-ui.theme.min.css" rel="stylesheet">'.PHP_EOL;
	echo '<link href="http://www.dtresearch.com/css/jquery-ui.structure.min.css" rel="stylesheet">'.PHP_EOL;
	echo '<link href="http://www.dtresearch.com/css/spinner.css" rel="stylesheet">'.PHP_EOL;
	
	echo '<link href="http://www.dtresearch.com/css/reset.css" rel="stylesheet">'.PHP_EOL;
	echo '<link href="http://www.dtresearch.com/css/setting.css" rel="stylesheet">'.PHP_EOL;
	echo '<link href="http://www.dtresearch.com/css/setting_layout.css" rel="stylesheet">'.PHP_EOL;
	echo '<link href="http://www.dtresearch.com/css/include_head.css" rel="stylesheet">'.PHP_EOL;
	echo '<link href="http://www.dtresearch.com/css/include_footer.css" rel="stylesheet">'.PHP_EOL;
	
	echo '<script language="javascript">'.PHP_EOL;
		
	//Unknow reason the same code working on Government, but doesn't work here. Using jquery to control the action submit.
	echo '$(document).ready(function(){'.PHP_EOL;
	echo '		var frm = document.getElementById("support_request_form");'.PHP_EOL;
	echo '		frm.submit();'.PHP_EOL;
	echo '}); '.PHP_EOL;

	//echo 'function submitMail(){'.PHP_EOL; 
	//echo 'document.forms[0].submit();'.PHP_EOL;
	//echo '}'.PHP_EOL;
	//echo 'document.forms[0].submit();'.PHP_EOL;
	echo '</script>'.PHP_EOL;
	echo '</head>'.PHP_EOL;
	echo '<body>'.PHP_EOL;
	
	echo '<div class="header_fixd">'.PHP_EOL;
	echo '<div class="top_center">'.PHP_EOL;
	echo '<!-- top part -->'.PHP_EOL;
	echo '<div class="top_part">'.PHP_EOL;		
    echo '<div class="sales_connection">'.PHP_EOL;
    echo 'E-MAIL : <a href="mailto:Sales@dtri.com">sales@dtri.com</a>'.PHP_EOL;
    echo '</div>'.PHP_EOL;		
	echo '<!-- language-->'.PHP_EOL;
    echo '<div class="language_selector">'.PHP_EOL;
    echo '<div class="block_for_name">'.PHP_EOL;
	echo '<div class="name_block arr">ENGLISH</div>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
	echo '<ul class="languages_list">'.PHP_EOL;				
    echo '<li><div class="name_block"><a href="http://www.dtresearch.cn/">简体中文</a></div></li>'.PHP_EOL;			
	echo '<li><div class="name_block"><a href="http://www.dtresearch.com.tw/">繁體中文</a></div></li>'.PHP_EOL;
    echo '<li><div class="name_block"><a href="http://dtresearch.jp/">日本語</a></div></li>	'.PHP_EOL;
	echo '</ul>'.PHP_EOL;
	echo '</div>'.PHP_EOL;
    echo '<!-- how to buy -->'.PHP_EOL;	
    echo '<div class="how_to_buy22"><a href="evaluation_request.html">Evaluation Request</a></div>  '.PHP_EOL;
        
    echo '<div class="how_to_buy"><a href="../about/How-To-Buy.html">How To Buy</a></div>'.PHP_EOL;
            
	echo '</div>  '.PHP_EOL;
	echo '<!-- top part end -->'.PHP_EOL;
		
	echo '<!-- bottom part -->'.PHP_EOL;
	echo '<div class="bottom_part">'.PHP_EOL;
	echo '<h1 class="logo"><a href="http://www.dtresearch.com/">DT Research, Inc.,</a></h1>'.PHP_EOL;
	echo '<!-- top menu-->'.PHP_EOL;
	echo '<div class="top_menu">'.PHP_EOL;
	echo '<ul>'.PHP_EOL;
	echo '<li class="spr"><a href="#">Products & Solutions</a>'.PHP_EOL;
	echo '<ul>'.PHP_EOL;
    echo '<li><a href="../products/embedded-controller.html"><img src="../shard_img/menu_icon_100.png" />Embedded Controller/ System</a></li><h1></h1>'.PHP_EOL;
    echo '<li><a href="../products/Medical-Tablet.html"><img src="../shard_img/menu_icon_DT300MD.png" />Medical Tablets</a></li>'.PHP_EOL;
    echo '<li><a href="../products/Medical-Handheld.html"><img src="../shard_img/menu_icon_DT400MD.png" />Medical Handheld Terminals</a></li>'.PHP_EOL;
    echo '<li><a href="../products/Medical-Cart-Computer.html"><img src="../shard_img/menu_icon_DT590X.png"/>Medical-Cart Computers</a></li>'.PHP_EOL;
    echo '<li><a href="../products/Medical-Grade-Integrated-LCD-Systems.html"><img src="../shard_img/menu_icon_DT500MD.png" />Medical-Grade Integrated LCD Systems</a></li>'.PHP_EOL;
    echo '<li><a href="../products/software.html"><img src="../shard_img/menu_icon_SW.png" />Software</a></li>'.PHP_EOL;
                    echo '</ul>'.PHP_EOL;
                echo '</li>'.PHP_EOL;
                echo '<li class="spr"><a href="#">Industry Solutions</a>'.PHP_EOL;
    				echo '<ul style="width:280px; margin:0 0 0 350px;"> '.PHP_EOL;
    				echo '<li><a href="../industry/application/medical.html"><img src="../shard_img/menu_icon_application.png" />Applications</a></li> '.PHP_EOL;
                    echo '<li><a href="../industry/CaseStudy/deployment.html"><img src="../shard_img/menu_icon_deployment.png" />Deployment</a></li>'.PHP_EOL;
                    echo '</ul>'.PHP_EOL;
                echo '</li>'.PHP_EOL;
                echo '<li class="spr"><a href="../partners/partner.html">Partners</a>'.PHP_EOL;
                echo '</li>'.PHP_EOL;
                echo '<li class="spr"><a href="#">Support</a>'.PHP_EOL;
    				echo '<ul style="width:420px; margin:0 0 0 450px;">'.PHP_EOL;
    				echo '<li><a href="support_contact.html"><img src="../shard_img/menu_icon_SupportContact.png" />Support Contact</a></li> '.PHP_EOL;
                    echo '<li><a href="download.html"><img src="../shard_img/menu_icon_download.png" >Download</a></li>'.PHP_EOL;
                    echo '<li><a href="warranty.html"><img src="../shard_img/menu_icon_wrrnaty.png"/>Warranty</a></li>'.PHP_EOL;
                    echo '</ul>'.PHP_EOL;
                echo '</li>'.PHP_EOL;
                echo '<li><a href="../about/Company-Profile.html">About Us</a></li>'.PHP_EOL;
			echo '</ul>'.PHP_EOL;
			echo '</div>'.PHP_EOL;
			
		echo '</div>'.PHP_EOL;
		echo '<!-- bottom part end -->	'.PHP_EOL;    
	
	echo '</div>'.PHP_EOL;
echo '</div>'.PHP_EOL;


	
	if ($jsonResponse->success == "true") {
		
		
		echo '<form onsubmit="checkCheckBox(this)" action="'.$actionUrl.'" method="post" name="support_request_form" id="support_request_form" >'.PHP_EOL;
		foreach ($_POST as $key => $value) {
			//echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
			if( $key == "g-recaptcha-response" || $key == "submit" ){
				
			}else{
				echo '<input type="hidden" name="' . $key.'" value="'.$value.'" />';
				echo PHP_EOL;
			}
			
		}
		//echo '<input type="submit" />'.PHP_EOL;
		echo "</form>".PHP_EOL;
		
		echo '<div id="floatingBarsG">'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_01"></div>'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_02"></div>'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_03"></div>'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_04"></div>'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_05"></div>'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_06"></div>'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_07"></div>'.PHP_EOL;
		echo '<div class="blockG" id="rotateG_08"></div>'.PHP_EOL;
		echo '</div>'.PHP_EOL;
		
	}else{
		/*
		* ERROR CODE:
		* missing-input-secret	The secret parameter is missing.
		* invalid-input-secret	The secret parameter is invalid or malformed.
		* missing-input-response	The response parameter is missing.
		* invalid-input-response	The response parameter is invalid or malformed.
		* { "success": false, "error-codes": [ "missing-input-response" ] }
		*/
		//Print error message
		
		foreach ($jsonResponse as $key => $value) {
			
			if($key=="error-codes"){
				foreach ($value as $arrVal) {					
					
					$errMsg;
					if($arrVal=="missing-input-response"){
						$errMsg = "The response parameter is missing!";
					}else if($arrVal=="missing-input-secret"){
						$errMsg = "The secret parameter is missing!";
					}else if($arrVal=="invalid-input-secret"){
						$errMsg = "The secret parameter is invalid or malformed!";
					}else if($arrVal=="invalid-input-response"){
						$errMsg = "The response parameter is invalid or malformed!";
					}else{
						$errMsg = "Unknown error!";
					}
					echo '<div class="ui-widget">';
					echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">';
					echo '<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>';
					echo '		<strong>Error:</strong>'. $errMsg .'</p>';
					echo '</div>';
					echo '</div>';
				}	
			}
		}

		//echo '<br><button onclick="goBack()">Go Back!</button>';
		echo '<br>&nbsp;<button class="ui-button ui-widget ui-corner-all" onclick="goBack()">Go Back!</button>';

		echo '<script>';
		echo 'function goBack() {';
		echo '	window.history.go(-1);';
		echo '}';
		echo '</script>';
	}
    echo '</body>'.PHP_EOL;
	echo '</html>'.PHP_EOL;
	
	

?>