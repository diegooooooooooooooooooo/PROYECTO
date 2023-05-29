<?php
include "abrirBBDD.php";

// Verificar la conexión
if ($con->connect_error) {
    die("Error al conectar a la base de datos: " . $con->connect_error);
}

// Cargar el archivo SQL de restauración
$sql = file_get_contents('Pokemondb.sql');

// Ejecutar el archivo SQL
if ($con->multi_query($sql)) {
    echo "La restauración de la base de datos se ha completado correctamente.";
} else {
    echo "Error al restaurar la base de datos: " . $con->error;
    echo "Detalles del error: " . $con->errno;
}