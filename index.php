<?php 

require_once("config.php");

$sql = new Sql();

$user = new Usuario();
$user->loadById(3);

echo $user;

 ?>