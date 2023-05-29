<?php
// Configuración de la base de datos
$servername = "nombre_servidor";
$username = "usuario";
$password = "contraseña";
$database = "nombre_base_de_datos";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Aquí puedes realizar operaciones con la base de datos...

// Cerrar la conexión
$conn->close();
?>