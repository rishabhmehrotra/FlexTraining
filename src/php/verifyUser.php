<?php
header('Content-Type: text/xml');
require_once("connectdb.php");

$res = new SimpleXMLElement(stripslashes($_POST['sending']));

$username = $res->fields->uname;
$password = $res->fields->pwd;

//$username = mysql_real_escape_string($_POST["username"]);
//$password = mysql_real_escape_string($_POST["password"]);
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysql_fetch_array(mysql_query($query));

//echo "..........";

$output = new SimpleXMLElement('<out></out>');
if(!$result) $output->addChild('login',"no");
else $output->addChild('login',"yes");

echo $output->asXML();




//$output = "<loginsuccess>";
//if(!$result) $output .= "no";		
//else $output .= "yes";	
//$output .= "</loginsuccess>";
//print ($output);

?>