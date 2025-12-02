<?php
// SELECCIONAR DATOS BCV
$sentencia = $pdo->prepare('SELECT * FROM cambios WHERE id_cambio= 1');
$sentencia->execute();

$BCV = $sentencia->fetch(PDO::FETCH_LAZY);
$id_BCV = $BCV['id_cambio'];
$cambio_BCV = $BCV['nombre_cambio'];
$valor_BCV = $BCV['valor_cambio'];

// SELECCIONAR DATOS BS-COP
$sentencia = $pdo->prepare('SELECT * FROM cambios WHERE id_cambio= 5');
$sentencia->execute();

$BSCOP = $sentencia->fetch(PDO::FETCH_LAZY);
$id_BSCOP = $BSCOP['id_cambio'];
$cambio_BSCOP = $BSCOP['nombre_cambio'];
$valor_BSCOP = $BSCOP['valor_cambio'];


// SELECCIONAR DATOS COP-DOLAR
$sentencia = $pdo->prepare('SELECT * FROM cambios WHERE id_cambio= 6');
$sentencia->execute();

$COPDOLAR = $sentencia->fetch(PDO::FETCH_LAZY);
$id_COPDOLAR = $COPDOLAR['id_cambio'];
$cambio_COPDOLAR = $COPDOLAR['nombre_cambio'];
$valor_COPDOLAR = $COPDOLAR['valor_cambio'];


// SELECCIONAR DATOS COP-BS
$sentencia = $pdo->prepare('SELECT * FROM cambios WHERE id_cambio= 7');
$sentencia->execute();

$COPBS = $sentencia->fetch(PDO::FETCH_LAZY);
$id_COPBS = $COPBS['id_cambio'];
$cambio_COPBS = $COPBS['nombre_cambio'];
$valor_COPBS = $COPBS['valor_cambio'];









$sentencia = $pdo->prepare('SELECT * FROM cambios');
$sentencia->execute();
$listado_cambios = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>