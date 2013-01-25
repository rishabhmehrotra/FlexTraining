<?php
header("Content-type: text/xml");
require_once("connectdb.php");


$response = new SimpleXMLElement(stripslashes($_POST['composeSending']));
$username = $response->fields->uname;
$content = $response->fields->content;
$sent_to = $response->fields->to;
$subject = $response->fields->subject;

$query_compose_mail = "INSERT INTO sent VALUES ('','$username','$subject','$sent_to','$content')";//SELECT * FROM sent WHERE username = '$username'";
$result_compose = mysql_query($query_compose_mail);  

$output = new SimpleXMLElement('<out></out>');
if(!$result_compose) $output->addChild('success',"no");
else $output->addChild('success',"yes");

echo $output->asXML();

?>

