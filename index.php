<?php

require_once("config.php");

/*
$sql = new Sql();

$parameters = array();

$usuarios = $sql->select("SELECT * FROM tb_usuarios", $parameters);

echo json_encode($usuarios);
*/

$usuario = new Usuario();
$usuario->loadById(1);

echo $usuario;

?>