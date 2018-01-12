<?php
include('File/X509.php');

// Thử đọc 1 cert cố định, đảm báo cert hợp lệ và public key không đổi

$x509 = new File_X509();
$cert = $x509->loadX509('-----BEGIN CERTIFICATE----- MIIBxjCCAS+gAwIBAgIBATANBgkqhkiG9w0BAQUFADAXMRUwEwYDVQQKDAxNaW5o IE5WIENlcnQwHhcNMTgwMTAxMDAwMDAwWhcNMTkwMTAxMDAwMDAwWjAjMQ8wDQYD VQQKDAZNeSB3ZWIxEDAOBgNVBAMMB21pbmhudjEwgZ8wDQYJKoZIhvcNAQEBBQAD gY0AMIGJAoGBAJ/gsMAwmr7r7jhUJ2xxnKVKl01tO535QfdMjhzhm0jPidv4mNAb QOzrj/8tJH/2lEaeUxUkr5u9Fs3wvBa/p/avqZlmmwmzT8OlH4KukOrB4AMFt6Br qN6M7/ES3Aj/GSRHyWGhkSatK62QQHZM9KsF+EXuJPkmiuNsz+OzNPeVAgMBAAGj FjAUMBIGA1UdEQQLMAmCB21pbmhudjEwDQYJKoZIhvcNAQEFBQADgYEASZwU33tN N58hYG/oeXBK4jubvQgGf/jmpceAHN/3ildejPV/pBxDzwWq7mCMauAAcHwDn7GK eoHhYAqSagr6a8QG7EfD6fZNwgxwGDk+1TdfUnFUWIBdVlwjdF6b/g7qzyQRwRu+ eM6MttSftgfDMtXUZ6GOD+VU3AqbYbqDuFk= -----END CERTIFICATE-----');

print_r($cert['tbsCertificate']['subjectPublicKeyInfo']['subjectPublicKey']);
?>

echo "<br/>";
$file = 'H:\test.txt';
$current = file_get_contents($file);
echo $current;