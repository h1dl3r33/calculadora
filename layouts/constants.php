<?php
// SELECCIONAR DATOS WELCOME-BIENVENIDA
$sentencia = $pdo->prepare('SELECT * FROM welcome WHERE  id_welcome = 14');
$sentencia->execute();

$welcome = $sentencia->fetch(PDO::FETCH_LAZY);
$id_welcome = $welcome['id_welcome'];
$wsmall_title = $welcome['wsmall_title'];
$wtitle = $welcome['wtitle'];
$wsubtitle = $welcome['wsubtitle'];
$wfoto = $welcome['wfoto'];



// ACERCA DE NOSOTROS
$sentencia_about = $pdo->prepare('SELECT * FROM welcome WHERE  id_welcome = 15');
$sentencia_about->execute();

$about = $sentencia_about->fetch(PDO::FETCH_LAZY);
$id_about = $about['id_welcome'];
$wsmall_title_about = $about['wsmall_title'];
$wtitle_about = $about['wtitle'];
$wsubtitle_about = $about['wsubtitle'];
$wfoto_about = $about['wfoto'];





$sentencia = $pdo->prepare('SELECT * FROM welcome');
$sentencia->execute();
$listado_contenido = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>