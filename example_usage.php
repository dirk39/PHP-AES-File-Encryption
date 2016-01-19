<?php


//Include an AES256 Implementation
require_once 'aes256'.DIRECTORY_SEPARATOR.'AES256Implementation.php';
require_once 'aes256'.DIRECTORY_SEPARATOR.'MCryptAES256Implementation.php';
//Include the library
require_once 'AESCryptFileLib.php';

//Construct the implementation
$mcrypt = new aes256\MCryptAES256Implementation();

//Use this to instantiate the encryption library class
$lib = new AESCryptFileLib($mcrypt);

//This example encrypts and decrypts the README.md file
$file_to_encrypt = "README.md";
$encrypted_file = "README.md.aes";
$decrypted_file = "README.decrypted.txt";

//Ensure target file does not exist
@unlink($encrypted_file);
//Encrypt a file
$lib->encryptFile($file_to_encrypt, "1234", $encrypted_file);

//Ensure file does not exist
@unlink($decrypted_file);
//Decrypt using same password
$lib->decryptFile($encrypted_file, "1234", $decrypted_file);

echo "Done";