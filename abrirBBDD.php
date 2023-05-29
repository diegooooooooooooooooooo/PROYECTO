<?php
$host = "172.17.0.2";
$usuario = "root";
$contrasena = "123456";
$db = "pokemondb";

// Crear la conexión
$con = new mysqli($host, $usuario, $contrasena, $db);

// Verificar si la conexión fue exitosa
if ($con->connect_errno) {
    die('CONEXIÓN FALLIDA ' . $con->connect_error);
}
?>