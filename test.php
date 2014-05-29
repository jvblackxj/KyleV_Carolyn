<?php 

function handleCheckBoxes($value){
	$retval = "N";	
		
	if($value){
		$retval = "Y";
	}
	
	return $retval;
}

require_once "Mail.php";
require_once "PEAR.php";

$errors = "Error: <br /><ul>";

$myemail = 'white.rabbit.44@gmail.com';

$name = "JasonV";
$address = "123 Main";
$city = "SLC";
$state = "UT";
$zip = "84014";
$hphone1 = "801";
$hphone2 = "821";
$hphone3 = "1485";
$wphone1 = null;
$wphone2 = null;
$wphone3 = null;
$email_add = "jvblackxj@gmail.com";
$message = "sup?";
$host = handleCheckBoxes(true);
$sign = handleCheckBoxes(true);
$other = handleCheckBoxes(false);
$othertext = "But is it really false?";

if(empty($name)  || 
   empty($address) || 
   empty($city) || 
   empty($state) || 
   empty($zip) || 
   empty($hphone1) || 
   empty($hphone2) || 
   empty($hphone3) || 
   empty($email_add) || 
   empty($message))
{
    $errors .= "<li>All required fields are neccessary.</li>";
}

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_add))
{
    $errors .= "<li>Invalid email address</li>";
}

if(strlen($errors)==17)
{
    $host = "ssl://smtp.gmail.com";
    $port = 465;
    $email_subject = "Volunteer form submission: $name";
    $email_body = "You have received a volunteer request from your website. ".
            " Here are the details: \n Name: $name \n ".
            " Address: $address\n City: $city\n ".
            " State: $state\n Zip Code: $zip\n ".
            " Home Phone: $hphone1 - $hphone2 - $hphone3\n Work Phone: $wphone1 - $wphone2 - $wphone3\n ".
            " Email: $emailadd\n Message: $message\n ".
            " Signed up for host: $host\n Signed up for sign: $sign\n ".
            " Signed up for other: $other\n Other: $othertext";

    $headers = array ('From' => $email_add, 'To' => $myemail, 'Subject' => $email_subject);
	
    $uName = $myemail;
    $pwd = "";

    $smtp =& Mail::factory('mail', array ('host' => $host, 
    					  'port' => $port, 
    					  'auth' => true, 
    					  'username' => $uName, 
    					  'password' => $pwd, 
    					  'persist' => true,
    					  'pipelining' => true,
    					  'localhost' => $host
    					  )
    			  );
    if(PEAR::isError($smtp){ echo $smtp->getMessage(); }
    			  
    $mail = $smtp->send($to, $headers, $email_body);

    if(PEAR::isError($mail)){
    	$msg = $mail->getMessage();
    }else{
    	$msg = "success";
    }
    
    echo $msg;
    //header('Location: thank_form.php?msg='.$msg);
}

if(strlen($errors) > 17){
    $errors .= "</ul>";
    print $errors;
}
?>