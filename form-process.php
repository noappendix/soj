<?php

if (isset($_POST['b_submit'])) {
		
	require_once('config.php');
	
	unset($_POST['b_submit']);
	unset($_POST['r_file']);
	$textString = "";
	$csvFields = '"' . implode('","', array_keys($_POST)) . '"';
	//$csvValues = '"' . implode('","', array_values($_POST)) . '"';
	$csvValuesArray = array();
	foreach ($_POST as $key => $value) {
			
		if (is_array($value))
			$value = implode("; ", array_filter($value));  //array_filter removes empty values; do this just for email

		array_push($csvValuesArray, $value);
		$label = $fieldNames[$key];
		//special handling for website update type
		if ($label == 'Update Type' && $value == 'landing')
			$value = 'Landing Page';
		$textString .= "\r\n$label : $value";
	}
	$csvValues = '"' . implode('","', $csvValuesArray) . '"';
	
	//upload files
	$fileNames = array();
	$uploadFileName = '';
	
	if (count($_FILES) > 0 && count($_FILES['r_file']) > 0) {
		$files = $_FILES['r_file'];
		
		//Get the number of files from one of the values
		$fileCount = count($files['name']);
		
		for ($i = 0; $i < $fileCount; $i++) {
			
			//blanks creep in, so exlcude those
			if ($files['name'][$i] != '') {
				$uploadFileName = date('YmdHis') . "_" . rand(1,99) . "_" . str_replace(' ', '_', $files['name'][$i]);
				$uploadFilePath = $uploadFolder . $uploadFileName;
				$tmp_path = $files["tmp_name"][$i];
				if(is_uploaded_file($tmp_path)) {
					copy($tmp_path, $uploadFilePath);
					array_push($fileNames, $uploadFileName);
				}
			}
		}
	}
	
	//create string of URLs for email and DB
	$urlList = '';
	if (count($fileNames) > 0) {
		$urlList = $uploadUrl . implode(" , ".$uploadUrl, $fileNames);
	}
	$textString .= "\nUploaded Files : $urlList ";
	$csvFields .= '"r_file"';
	$csvValues .= '"'.$urlList.'"';
	
	
	//insert into DB
	$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	$textString = "\nRequest Type: $requestType". $textString;
	$stmt = $mysqli->prepare("INSERT INTO creative_requests (request_type, plain_text, csv_keys, csv_values, created) VALUES (?, ?, ?, ?, NOW())" );
	$stmt->bind_param('ssss', $requestType, $textString, $csvFields, $csvValues);
	$stmt->execute();
	
	mysqli_close($mysqli);
	
	
	//send email through Swiftmailer; mail() can't deliver to Sojern's gmail-hosted email
	
	require_once 'swiftmailer/lib/swift_required.php';
	/*function swiftmailer_configurator() {
		// configure Swift Mailer
		Swift_DependencyContainer::getInstance()->...
		Swift_Preferences::getInstance()->...
	}
	Swift::init('swiftmailer_configurator');*/
	
	$subject = "Sojern.com Creative Request - $requestType";
	 // Add a distinguishing item to subject line if possible
	 // most forms
	 if (array_key_exists("r_client", $_POST)) {
		$subject .= " (" . $_POST['r_client'] . ")";
	 //conference materials, presentation support
	 } elseif (array_key_exists("r_confname", $_POST)) {
		$subject .= " (" . $_POST['r_confname'] . ")";
	 //infographic (destination)
	 } elseif (array_key_exists("srep_destination", $_POST)) {
		$subject .= " (" . $_POST['srep_destination'] . ")";
	 //business card
	 } elseif (array_key_exists("r_bname", $_POST)) {
		$subject .= " (" . $_POST['r_bname'] . ")";
	 }
	
	$message = Swift_Message::newInstance()
  // Give the message a subject - some types have different subjects
  ->setSubject($subject)
  // Set the From address with an associative array
  ->setFrom('sojernmail@gmail.com')
  ->setReplyTo($replyToEmail)
  // Set the To addresses with an associative array
  ->setTo(array($notificationEmail))
  // Give it a body
  ->setBody($textString);
  
  // Create the Transport
  $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587)
	  ->setUsername('sojernmail@gmail.com')
	  ->setPassword('580Howard')
	  ->setEncryption('tls')
	  ;
	$mailer = Swift_Mailer::newInstance($transport);
	
	// Send the message to confirmation address
	$result1 = $mailer->send($message);
	// Dynamic creative - also send to DC recipients
	if ($requestType == "Dynamic Creative") {
		
		$message->setTo(array('katie.stapleton@sojern.com'));
		$resultb = $mailer->send($message);
		
	}
	if ($requestType == "Case Study") {
		$message->setTo(array('arendse.lund@sojern.com'));
		$resultcs = $mailer->send($message);
	}
	//send a copy to submitter
	$message->setTo(array($_POST['r_email']));
	$result2 = $mailer->send($message);
	//send to additional email address(es), if any
	if (isset($_POST['r_addl_email']) && $_POST['r_addl_email'] != '') {
		$message->setTo(array($_POST['r_addl_email']));
		$result3 = $mailer->send($message);
	}
	//echo "$result1<br>$result2<br>$result3"; exit();

	
	//include confirmation page
	require_once("form-confirmation.php");
	
	/*echo "<b>textString</b><br><pre>$textString</pre>";
	echo $csvFields;
	echo "<br>";
	echo $csvValues;*/
	
	exit();

}

?>