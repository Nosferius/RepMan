<?php
// Errors to browser
error_reporting(E_ALL);
ini_set('display_errors', 'on');

// Load libraries
$config = parse_ini_file('config.ini');
require_once('lib/Model/composers.php');
require_once('lib/Model/songs.php');
require_once('lib/Model/musicalForms.php');
require_once('lib/Controller/controller.php');
require_once('lib/Controller/postHandler.php');

$postHandler = new postHandler();
$postHandler->run();
$Controller = new controller();
$action = "";
if(isset($_GET["action"])){
    $action = $_GET["action"];
}
$Controller->setAction($action);
// $Controller->setAction("addSong");
echo $Controller->run();
?>