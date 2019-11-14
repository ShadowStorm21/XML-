<?php

//encrypt function....

function encrypt($plaintext){

	$secret_key = '123';
	$key = hash('sha256', $secret_key);
	
	
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = openssl_random_pseudo_bytes($ivlen);
	$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
	$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
	$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
	return $ciphertext;
}

//decrypt function....

function decrypt($ciphertext){

	$secret_key = '123';
	$key = hash('sha256', $secret_key);

	$c = base64_decode($ciphertext);
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = substr($c, 0, $ivlen);
	$hmac = substr($c, $ivlen, $sha2len=32);
	$ciphertext_raw = substr($c, $ivlen+$sha2len);
	$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
	$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
	if (hash_equals($hmac, $calcmac))
	{
	    
	return $original_plaintext;
	}}


$host = "localhost"; 
$user = "root"; 
$pwd = ""; 
$db = "pc"; 

try{ 
$conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd); 
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
//echo "Connected successfully"; 
} 
catch(Exception $e){ 
echo ("Internal Login Error, Please Contact Web Site Support");
$error = "Error message: ".$e->getMessage() ." Error at line: ".$e->getLine()."  in a file named :  ".$e->getFile(); 
error_log($error);  
return;
}

?>