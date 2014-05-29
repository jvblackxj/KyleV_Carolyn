<?php 

require_once('PEAR.php');

function handleCheckBoxes($value){
	$retval = "N";	
		
	if($value){
		$retval = "Y";
	}
	
	return $retval;
}

$errors = "Error: <br /><ul>";

$myemail = 'white.rabbit.44@gmail.com';

$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$hphone1 = $_POST['hphone1'];
$hphone2 = $_POST['hphone2'];
$hphone3 = $_POST['hphone3'];
$wphone1 = $_POST['wphone1'];
$wphone2 = $_POST['wphone2'];
$wphone3 = $_POST['wphone3'];
$email_add = $_POST['email'];
$message = $_POST['info'];
$host = handleCheckBoxes($_POST['host']);
$sign = handleCheckBoxes($_POST['sign']);
$other = handleCheckBoxes($_POST['other']);
$othertext = $_POST['othertext'];

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
    $host = "mail.judgecarolynellsworth.com";
    $port = 25;
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
	
    $uName = "auto@judgecarolynellsworth.com";
    $pwd = "jcemail";
    
    include('Mail.php');

    $smtp =& Mail::factory('smtp', array ('host' => $host, 
    					  'port' => $port, 
    					  'auth' => true, 
    					  'username' => $uName, 
    					  'password' => $pwd, 
    					  'persist' => true,
    					  'pipelining' => true,
    					  'localhost' => $host
    					  )
    			  );
    			  
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