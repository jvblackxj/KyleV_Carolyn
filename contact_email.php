<?PHP
$errors = '';
$myemail = 'white.rabbit.44@gmail.com';
if(empty($_POST['name'])  || 
   empty($_POST['address']) || 
   empty($_POST['city']) || 
   empty($_POST['state']) || 
   empty($_POST['zip']) || 
   empty($_POST['phone1']) || 
   empty($_POST['phone2']) || 
   empty($_POST['phone3']) || 
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
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$phone3 = $_POST['phone3'];
$fax1 = $_POST['fax1'];
$fax2 = $_POST['fax2'];
$fax3 = $_POST['faxe3'];
$email_add = $_POST['email'];
$message = $_POST['info'];

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail;
    $email_subject = "Website Contact Request: $name";
    $email_body = "Someone has filled out the contact form on your wbesite. ".
            " Here are the details: \n Name: $name \n ".
            " Address: $address\n City: $city\n ".
            " State: $state\n Zip Code: $zip\n ".
            " Phone Number: $phone1 - $phone2 - $phone3\n Fax number: $fax1 - $fax2 - $fax3\n ".
            " Email: $emailadd\n Message: $message\n ".
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_add";
    mail($to,$email_subject,$email_body,$headers);
    header('Location: thank_form.html');
}
?>