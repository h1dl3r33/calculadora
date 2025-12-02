<?php
$servidor = "mysql:dbname=velzon-php;host=127.0.0.1";
$usuario = "root";
$password = "";



try {

    $pdo = new PDO($servidor, $usuario, $password);
    echo "";


} catch (PDOException $e) {
    echo "No hay conexion :(" . $e->getMessage();
}
?>