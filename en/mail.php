<?php
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$phone = $_POST["phone"];
$intrestedin = $_POST["intrestedin"];

$EmailTo = "syedahs@outlook.com";
$Subject = "A NEW ".strtoupper($intrestedin)." Received";

// prepare email body text
$Fields .= "Name: ";
$Fields .= $name;
$Fields .= "\n\n";

$Fields.= "Query Type: ";
$Fields .= $intrestedin;
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
