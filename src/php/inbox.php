<?php
header("Content-type: text/xml");
require_once("connectdb.php");


$response = new SimpleXMLElement(stripslashes($_POST['inboxSending']));
$username = $response->fields->uname;

$query_get_all_emails = "SELECT * FROM inbox WHERE username = '$username'";
$result_get_all_emails = mysql_query($query_get_all_emails);  
$output_get_all_emails = new SimpleXMLElement('<out></out>');

while($row_query = mysql_fetch_assoc($result_get_all_emails))
{
	$email = $output_get_all_emails->addChild('email');
	$email->addChild('name',$row_query['name']);
	$email->addChild('username',$row_query['username']);
	$email->addChild('subject',$row_query['subject']);
	$email->addChild('content',$row_query['content']);
	$email->addChild('from',$row_query['frm']);
}

echo $output_get_all_emails->asXML();
?>

