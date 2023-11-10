<?php
// Function to encrypt the data
function encryptData($data, $secretKey, $cipher = 'AES-128-CBC') {
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encryptedData = openssl_encrypt($data, $cipher, $secretKey, 0, $iv);
    // Return the encrypted data with the IV in front
    return base64_encode($iv . $encryptedData);
}

// Function to decrypt the data
function decryptData($data, $secretKey, $cipher = 'AES-128-CBC') {
    $data = base64_decode($data);
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = substr($data, 0, $ivLength);
    $encryptedData = substr($data, $ivLength);
    // Decrypt the data
    return openssl_decrypt($encryptedData, $cipher, $secretKey, 0, $iv);
}

// Usage example
$secretKey = 'abcderjadgwdon5471218545$$%^&(&^*%cvcv__==sasdf^^%$$*(*()_KL:$456gfghsdf#%#^$#@#@'; 
$originalData = 'Hi how are you'; //(text, integer, decimal)

$encryptedData = encryptData($originalData, $secretKey);
$decryptedData = decryptData($encryptedData, $secretKey);

echo "Original Data: " . $originalData . "<br/>";
echo "Encrypted Data: " . $encryptedData . "<br/>";
echo "Decrypted Data: " . $decryptedData . "<br/>";
?>
