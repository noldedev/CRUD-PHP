<?php
require "../conexion/database.php";

$id = $conn->real_escape_string($_POST["id"]);

$sql = "SELECT id, nombre, descripcion, id_genero FROM pelicula WHERE id = $id LIMIT 1";

$resultado = $conn->query($sql);

$rows = $resultado->num_rows;

$pelicua = [];

if ($rows > 0) {
    $pelicua = $resultado->fetch_array();
}

echo json_encode($pelicua, JSON_UNESCAPED_UNICODE);
