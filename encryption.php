<?php
$cipher = "aes-256-cbc";  
$encryption_key = openssl_random_pseudo_bytes(32); 
$iv_size = openssl_cipher_iv_length($cipher); 
$iv = openssl_random_pseudo_bytes($iv_size); 

$data = "Srijan"; 
$encrypted_data = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv); 

echo "Encrypted Text: " . $encrypted_data; 

 echo "<br><BR>";
 echo $encryption_key;
 echo "<br><BR>";
$decrypted_data = openssl_decrypt($encrypted_data, $cipher, $encryption_key, 0, $iv); 
echo "Decrypted Text: " . $decrypted_data; 

?>