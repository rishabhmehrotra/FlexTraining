<?php
header("Content-type: text/xml");
require_once("connectdb.php");


$response = new SimpleXMLElement(stripslashes($_POST['sentSending']));
$username = $response->fields->uname;

$query_get_all_emails = "SELECT * FROM sent WHERE username = '$username'";
$result_get_all_emails = mysql_query($query_get_all_emails);  
$output_get_all_sent_emails = new SimpleXMLElement('<out></out>');

while($row_query = mysql_fetch_assoc($result_get_all_emails))
{
	$email = $output_get_all_sent_emails->addChild('email');
	$email->addChild('name',$row_query['name']);
	$email->addChild('username',$row_query['username']);
	$email->addChild('subject',$row_query['subject']);
	$email->addChild('sent_to',$row_query['sent_to']);
	$email->addChild('content',$row_query['content']);
}

echo $output_get_all_sent_emails->asXML();
?>

