<?PHP
$errors = '';
$myemail = 'white.rabbit.44@gmail.com';
if(empty($_POST['name'])  || 
   empty($_POST['address']) || 
   empty($_POST['city']) || 
   empty($_POST['state']) || 
   empty($_POST['zip']) || 
   empty($_POST['hphone1']) || 
   empty($_POST['hphone2']) || 
   empty($_POST['hphone3']) || 
   empty($_POST['email']) || 
   empty($_POST['info']))
{
    $errors .= "\n Error: All required fields are neccessary";
}

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
$host = $_POST['host'];
$sign = $_POST['sign'];
$other = $_POST['other'];
$othertext = $_POST['othertext'];

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail;
    $email_subject = "Volunteer form submission: $name";
    $email_body = "You have received a volunteer request from your website. ".
            " Here are the details: \n Name: $name \n ".
            " Address: $address\n City: $city\n ".
            " State: $state\n Zip Code: $zip\n ".
            " Home Phone: $hphone1 - $hphone2 - $hphone3\n Work Phone: $wphone1 - $wphone2 - $wphone3\n ".
            " Email: $emailadd\n Message: $message\n ".
            " Signed up for host: $host\n Signed up for sign: $sign\n ".
            " Signed up for other: $other\n Other: $othertext";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_add";
    mail($to,$email_subject,$email_body,$headers);
    header('Location: thank_form.html');
}
?>