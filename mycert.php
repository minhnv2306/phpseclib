<?php
include('File/X509.php');

// Thử đọc 1 cert cố định, đảm báo cert hợp lệ và public key không đổi

$x509 = new File_X509();
$cert = $x509->loadX509('-----BEGIN CERTIFICATE----- MIIBzDCCATWgAwIBAgIBATANBgkqhkiG9w0BAQUFADAXMRUwEwYDVQQKDAxNaW5o IE5WIENlcnQwHhcNMTcxMjAxMTUyMzIyWhcNMTkwMTAxMTUyMzIyWjAmMQ8wDQYD VQQKDAZNeSB3ZWIxEzARBgNVBAMMCm1pbmhudjIzMDYwgZ8wDQYJKoZIhvcNAQEB BQADgY0AMIGJAoGBAMxd0rosaxBt3mxB89SNZ4CzCjLSHez2tx1ayyId9xIdcsZQ C86nFr4bPXgiNbNUjh5vr9d8tI2eQAKzSIqsLHisWZKIw/4UdlA99+zRi/JeDgvj xZ6fK4YiiZ9eM2P+DF7HY4T3uz1zjefxrld3SqiObciNEGRHPb/o0oKOVTc9AgMB AAGjGTAXMBUGA1UdEQQOMAyCCm1pbmhudjIzMDYwDQYJKoZIhvcNAQEFBQADgYEA jIXk1ga+x1kPIb/Ae7Wccr6KNi5YMbNoZbMe4Uazs+CAHhAF442k6tfhbzzB5RZI AUGv22WF55av5OnfFjqHlK9TCrDhzD6gVU8M6njfSXx79R4ORkoGF3y/Krm7F6zc jT25uazH6SL4ZJBb2EPUWJApIthUZKXCYpIQc3jelq4= -----END CERTIFICATE-----');

print_r($cert['tbsCertificate']['subjectPublicKeyInfo']['subjectPublicKey']);
?>