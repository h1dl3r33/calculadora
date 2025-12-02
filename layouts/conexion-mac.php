<?php
$servidor = "mysql:dbname=velzon-php;host=127.0.0.1:8889";
$usuario = "root";
$password = "root";



try {

    $pdo = new PDO($servidor, $usuario, $password);
    echo "Conectado";


} catch (PDOException $e) {
    echo "No hay conexion :(" . $e->getMessage();
}
?>