<?php

require_once("config.php");

/*
$sql = new Sql();

$parameters = array();

$usuarios = $sql->select("SELECT * FROM tb_usuarios", $parameters);

echo json_encode($usuarios);
*/


//  busca um usuario pelo id e exibe
/*
$usuario = new Usuario();
$usuario->loadById(1);

echo $usuario;
*/

//  carrega uma lista de usuarios
/*
$lista = Usuario::getList();

echo json_encode($lista);
*/
 
//busca e exibe um usuario pelo login

//$usuario = Usuario::search("margareth");
//echo json_encode($usuario);

//  busca um usuario pelo login e senha e exibe

$usuario = new Usuario();
$usuario->login('admin', '12345xxx');
if ($usuario->getDeslogin() != NULL) {
	echo $usuario;
}

?>