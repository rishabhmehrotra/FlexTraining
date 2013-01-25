<?php
header("Content-type: text/xml");
require_once("connectdb.php");


$response = new SimpleXMLElement(stripslashes($_POST['registerSending']));

$uname = $response->fields->uname;
$name = $response->fields->name;
$pwd = $response->fields->pwd;
$address = $response->fields->address;
$email = $response->fields->email;
$mobile = $response->fields->mobile;

$query_compose_mail = "INSERT INTO users VALUES ('$name','$uname','$pwd','$address','$email','$mobile')";//SELECT * FROM sent WHERE username = '$username'";
$result_compose = mysql_query($query_compose_mail);

$output = new SimpleXMLElement('<out></out>');
if(!$result_compose) $output->addChild('success',"no");
else $output->addChild('success',"yes");

echo $output->asXML();

?>
