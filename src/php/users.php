<?php
header("Content-type: text/xml");
require_once("connectdb.php");


$response = new SimpleXMLElement(stripslashes($_POST['usersSending']));
$username = $response->fields->uname;

$query_get_all_emails = "SELECT * FROM users";
$result_get_all_emails = mysql_query($query_get_all_emails);  
$output_get_all_sent_emails = new SimpleXMLElement('<out></out>');

while($row_query = mysql_fetch_assoc($result_get_all_emails))
{
	$email = $output_get_all_sent_emails->addChild('users');
	$email->addChild('name',$row_query['name']);
	$email->addChild('email',$row_query['email']);
}

echo $output_get_all_sent_emails->asXML();
?>

