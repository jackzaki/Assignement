<?php
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$phone = $_POST["phone"];

$EmailTo = "syedahs@outlook.com";
$Subject = "A new registration form received";

// prepare email body text
$Fields .= "Name: ";
$Fields .= $name;
$Fields .= "\n\n";

$Fields.= "Phone: ";
$Fields .= $phone;
$Fields .= "\n\n";

$Fields.= "Email: ";
$Fields .= $email;
$Fields .= "\n\n";

$Fields .= "Message: ";
$Fields .= $message;
$Fields .= "\n";


// send email
$success = mail($EmailTo,  $Subject,  $Fields, "From:".$email);

	echo "<div class='alert alert-success'>
	Thank you for contacting us, your email has been sent to our special department.
	</div>";		

?>
