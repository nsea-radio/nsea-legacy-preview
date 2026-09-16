<?php
if(isset($_POST['email'])) {
	
	// CHANGE THE TWO LINES BELOW
	$email_to = "membership@nsea.com";
	
	$email_subject = "NSEA membership request";
	
	
	function died($error) {
		// your error code can go here
		echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['first_name']) ||
		!isset($_POST['last_name']) ||
		!isset($_POST['address']) ||
		!isset($_POST['city']) ||
		!isset($_POST['state']) ||
		!isset($_POST['zip']) ||
		!isset($_POST['email']) ||
		!isset($_POST['telephone']) ||
		!isset($_POST['gmrs']) ||
		!isset($_POST['gmrs_call']) ||
		!isset($_POST['comments'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	
	$first_name = $_POST['first_name']; // required
	$last_name = $_POST['last_name']; // required
	$address = $_POST['address']; // required
	$city= $_POST['city']; // required
	$state= $_POST['state']; // required
	$zip= $_POST['zip']; // required
	$email_from = $_POST['email']; // required
	$telephone = $_POST['telephone']; // not required
	$gmrs= $_POST['gmrs']; // required
	$gmrs_call = $_POST['gmrs_call']; // not required
	$comments = $_POST['comments']; // required
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
  	$error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
        $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$last_name)) {
  	$error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  	
  	}
        $string_exp = "/^[A-Za-z0-9 .'-]+$/";
  if(!preg_match($string_exp,$address)) {
  	$error_message .= 'The Address you entered does not appear to be valid.<br />';
  	
  	}
        $string_exp = "/^[A-Za-z0-9 .'-]+$/";
  if(!preg_match($string_exp,$city)) {
  	$error_message .= 'The city you entered does not appear to be valid.<br />';
  	
  	}
        $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$state)) {
  	$error_message .= 'The state you entered does not appear to be valid.<br />';
  	
  	}
        $string_exp = "/^[0-9 .'-]+$/";
  if(!preg_match($string_exp,$zip)) {
  	$error_message .= 'The Zip Code you entered does not appear to be valid.<br />';
  	
  	if(isset($_POST['submit']))
{

    echo $radio_value = $_POST["radio"];
}
  	$error_message .= 'The Zip Code you entered does not appear to be valid.<br />';
  	
  	
  	
  }
  if(strlen($comments) < 2) {
  	$error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Form details below.\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "First Name: ".clean_string($first_name)."\n";
	$email_message .= "Last Name: ".clean_string($last_name)."\n";
	$email_message .= "Address: ".clean_string($address)."\n";
	$email_message .= "City: ".clean_string($city)."\n";
	$email_message .= "State: ".clean_string($state)."\n";
	$email_message .= "Zip Code: ".clean_string($zip)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Telephone: ".clean_string($telephone)."\n";
	$email_message .= "GMRS License: ".clean_string($gmrs)."\n";
	$email_message .= "GMRS Call Sign: ".clean_string($gmrs_call)."\n";
	$email_message .= "Comments: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- place your own success html below -->

<center><br><br><br><br><br><br><bIg><big>Thank you for contacting us. We will be in touch with you very soon.
<center><p><a href="http://www.nsea.com">
      BACK</a></p>
<?php
}
die();
?>