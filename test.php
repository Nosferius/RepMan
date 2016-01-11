<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$config = parse_ini_file('config.ini');
require_once('lib/Model/composers.php');

$Composer = new composers;
$Composer->setComposerFirstname("Test");
$Composer->add();
$result = $Composer->fetchall();
print_r($result);

echo "<pre>";
echo "hoi";

print_r($Composer);

?>