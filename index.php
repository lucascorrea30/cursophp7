<?php 

require_once("config.php");

$sql = new Sql();

// Carrega 1 Usuario
// $user = new Usuario();
// $user->loadById(3);
// echo $user;

// Carrega Lista de Usuarios
// $lista = Usuario::getList();
// echo json_encode($lista);

// Busca Usuario pelo login
// $search = Usuario::search("root");
// echo json_encode($search);

// Valida Login
// $user = new Usuario();
// $user->login("root", "qwertysa");
// echo $user;

// Insere
// $aluno = new Usuario("aluno", "@lun0");
// $aluno->insert();
// echo $aluno;

// Update
// $user = new Usuario();
// $user->loadById(6);
// $user->update("professor", "profs");
// echo $user;

// Delete
$user = new Usuario();
$user->loadById(5);
$user->delete();
echo $user;

 ?>