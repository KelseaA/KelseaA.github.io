<?php 
$errors = '';
$myemail = 'andersonkelsea@gmail.com';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact Form Error!</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/normalize.css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<style>
		body{
			text-align: center;
			padding-top: 10rem;
		}
		.error{
			margin-bottom: 1.5rem;
			line-height: 2rem;
		}
	</style>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<div class="error">
<h1>Error!</h1>
<?php
echo nl2br($errors);
?>
</div>
<form action="index.html">
		<input type="submit" value="Return to Site" class="submit-button">
</form>

</body>
</html>