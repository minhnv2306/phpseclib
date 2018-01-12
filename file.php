<?php
$myfile = fopen("CA.cer", "r") or die("Unable to open file!");
echo fread($myfile,filesize("CA.cer"));
fclose($myfile);

$file = '/Users/Nguyen Van Minh/Desktop/CA.cer';
$current = file_get_contents($file);
echo $current;

/*
echo "<br/>";
$file = 'H:\test.txt';
$current = file_get_contents($file);
echo $current;
*/
$myfile = fopen("/Users/Nguyen Van Minh/Desktop/newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

?>