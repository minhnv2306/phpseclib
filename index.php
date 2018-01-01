<?php

// Chương trình này giữ các public key, private key của CA, sau đó dùng nó để ký cho các subject
include('File/X509.php');
include('Crypt/RSA.php');

// create private key for CA cert
// (you should probably print it out if you want to reuse it)
$CAPrivKey = new Crypt_RSA();
$CAPrivKey->loadKey('-----BEGIN RSA PRIVATE KEY----- MIICXQIBAAKBgQDG0s64mm9ZLHcCa+IFFYYvcap0xmri9hytJx1O+rI0JFF23bAp K//sWAWgeEvbEBAUGLBKibsJ50iIq+hALoK5O1qy6CIXMoVfiIVqNdA/L3ZWW0yC qNh/uR5IDkoMd2VzWlWa2Ue8ExV1T0AZ2OVu0AYLfS7nF1Uk549BSJNoaQIDAQAB AoGAX9k8ww3gZBLlhItRuLW5rKGVVRpaaPPQu0DCBlMhGbXwd+dDh3WouN1uSP/1 QbQqrCWCx0xCmPGgrBKDsn05kwx6zLKcHtzp/ezWkGTLCJ8oSEH5/zRosnAKIxpc +wNDYKNlXt8/nTNtM2484res2MoqFWJqtywROJcNMAqNZAECQQDzitFa/lyZLOF8 5lfIJlmuzn6ILt9aZ2VO8AqfgOcifCHA+XvL3geULzG/za+pK+pvQQaqxL0mHkBX ACvOnyopAkEA0P5l163Bn7UiDj4i4dzNlN93J/dd7Uo8OtsH92X4+ZbySaDQkEkU XBIDGVaAQQDd23BhbtSW4t6I1rb9TLqUQQJAOoZgexJnJDQh18buz11P7e8Xfxhs eiggs1CB7QSoBqR35AzQEBTCE30n4mTGUswH4UZqGL2Aitl4MrAK1vNuyQJBAMJu Cf0u71VPRBGQCQ+rRa7cfpQ187IQQBxZLP4iZhB9N4b8D0xMUJ6fOzbVXJgc4EmI MXzUVlNVyGRI9Tnu0oECQQDx/DmwAv6dldipvaHX3xwdtNA4yAztmq9o0It4LO0H rh3Wd4ZOXfRdG91jP5XIVVNE2oyu8FYsPXRxazKQRbWU -----END RSA PRIVATE KEY-----');

$pubKey = new Crypt_RSA();
$pubKey->loadKey('-----BEGIN PUBLIC KEY----- MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDG0s64mm9ZLHcCa+IFFYYvcap0 xmri9hytJx1O+rI0JFF23bApK//sWAWgeEvbEBAUGLBKibsJ50iIq+hALoK5O1qy 6CIXMoVfiIVqNdA/L3ZWW0yCqNh/uR5IDkoMd2VzWlWa2Ue8ExV1T0AZ2OVu0AYL fS7nF1Uk549BSJNoaQIDAQAB -----END PUBLIC KEY-----');

echo "the private key for the CA cert (can be discarded):\r\n\r\n";
echo $CAPrivKey;
echo "\r\n\r\n";
echo $pubKey;







// create a self-signed cert that'll serve as the CA

// Chua biết load luôn CA cert vào như thế nào @@
$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp('id-at-organizationName', 'Minh NV Cert');

$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDN($CASubject = $subject->getDN());

$x509 = new File_X509();
$x509->setStartDate('1/1/2018');
$x509->setEndDate('2/1/2028');
$x509->setSerialNumber(chr(1));
$x509->makeCA();

$result = $x509->sign($issuer, $subject);
echo "the CA cert to be imported into the browser is as follows:\r\n\r\n";
echo $x509->saveX509($result);
echo "\r\n\r\n";
echo "<br>";
echo "<br>";








// create private key / x.509 cert for stunnel / website
// Ký cho các đối tượng nào
$privKey = new Crypt_RSA();
extract($privKey->createKey());
$privKey->loadKey($privatekey);

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp('id-at-organizationName', 'My web');
$subject->setDomain('minhnv2306');

$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDN($CASubject);

$x509 = new File_X509();
$x509->setStartDate('-1 month');
$x509->setEndDate('+1 year');
$x509->setSerialNumber(chr(1));

$result = $x509->sign($issuer, $subject);
echo "the stunnel.pem contents are as follows:\r\n\r\n";
echo $privKey->getPrivateKey();
echo "\r\n";
echo $x509->saveX509($result);
echo "\r\n";