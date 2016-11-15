<?php

if(!isset($_POST['submit']))
{
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];

if(empty($name)||empty($visitor_email)) 
{
    echo "Cannot leave name or email blank";

}

$email_from = "Contact@IGMC.com";
if (isset($phone)){
    $email_subject = "New Question from $name. Phone Number: $phone";
}
else{
    $email_subject = "New Question from $name";
}
$email_body = $message;

$to = "lej4@cornell.edu";
$headers = "From: $email_from";
$headers .= "Reply-To: $visitor_email";
mail($to,$email_subject,$email_body,$headers);
header('Location: thank-you.html');

if (!preg_match("@{1}" && "[a-Z]", $visitor_email)){
	echo "you did not insert a valid email";
}
if (!preg_match("[a-Z]",$name)){
	echo "you did not insert a valid name";
}
if (!preg_match("[0-9]{10}",$phone)){
        echo "you did not enter a valid number";
}
if (!preg_match("[\s\S]{10,}",$message)){
        echo "Message has to be longer than 10 characters";
}

?>