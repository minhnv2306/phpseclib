<?php
include('File/X509.php');
include('Crypt/RSA.php');

// create private key / x.509 cert for stunnel / website
$privKey = new Crypt_RSA();
extract($privKey->createKey());
$privKey->loadKey($privatekey);

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp('id-at-organizationName', 'Minh NV cert');
$subject->setDomain('minhnv.com');

$issuer = new File_X509();
$issuer->setPrivateKey($privKey);
$issuer->setDN($subject->getDN());

$x509 = new File_X509();
$x509->setStartDate('-1 month'); // default: now
$x509->setEndDate('+1 year'); // default: +1 year
$x509->setSerialNumber(chr(1)); // default: 0

$result = $x509->sign($issuer, $subject);
echo "the stunnel.pem contents are as follows:\r\n\r\n";
echo "<br>";
echo $privKey->getPrivateKey();
echo "<br>";
echo "\r\n";
echo $x509->saveX509($result);
echo "\r\n";