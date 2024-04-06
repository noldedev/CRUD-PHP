<?php
require "../conexion/database.php";

session_start();

$sqlPeliculas = "SELECT p.id, p.nombre, p.descripcion, g.nombre AS genero FROM pelicula AS p 
    INNER JOIN genero AS g 
    ON p.id_genero = g.id";
$peliculas = $conn->query($sqlPeliculas);
$dir = "poster/";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container py-3">
    <h2 class="text-center">Peliculas</h2>
    <hr>

    <?php if (isset($_SESSION["msg"])) { ?>

        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            <?= $_SESSION["msg"]; ?>
            <button type="button" class="btn  btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php }
    unset($_SESSION["msg"]);
    ?>
    <div class="row justify-content-end">
        <div class="col-auto">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">Nuevo Registro <i class="fa-solid fa-circle-plus"></i></a>
        </div>

    </div>
    <table class="table table-sm table-striped table-hover mt-4 ">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Género</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row_pelicula = $peliculas->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row_pelicula["id"] ?></td>
                    <td><?= $row_pelicula["nombre"] ?></td>
                    <td><?= $row_pelicula["descripcion"] ?></td>
                    <td><?= $row_pelicula["genero"] ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-id="<?= $row_pelicula["id"] ?>"><i class="fa-solid fa-pen"></i>Editar</a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal" data-bs-id="<?= $row_pelicula["id"] ?>"><i class="fa-solid fa-trash"></i>Eliminar</a>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

<?php
$sqlGenero = "SELECT id, nombre FROM genero";
$generos = $conn->query($sqlGenero);
?>

<?php include "nuevoModal.php"; ?>

<?php $generos->data_seek(0); ?>

<?php include "eliminarModal.php"; ?>

<?php include "editarModal.php"; ?>

<script>
    let editarModal = document.getElementById("editarModal");
    let eliminaModal = document.getElementById("eliminarModal");

    editarModal.addEventListener("shown.bs.modal", event => {
        let button = event.relatedTarget;
        let id = button.getAttribute("data-bs-id");

        let inputId = editarModal.querySelector(".modal-body #id");
        let inputNombre = editarModal.querySelector(".modal-body #nombre");
        let inputDescripcion = editarModal.querySelector(".modal-body #descripcion");
        let inputGenero = editarModal.querySelector(".modal-body #genero");

        let url = "getPelicula.php";
        let formData = new FormData();
        formData.append("id", id);

        fetch(url, {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                inputId.value = data.id;
                inputNombre.value = data.nombre;
                inputDescripcion.value = data.descripcion;
                inputGenero.value = data.id_genero;
            })
            .catch(err => console.log(err));
    });

    eliminaModal.addEventListener("show.bs.modal", event => {
        let button = event.relatedTarget;
        let id = button.getAttribute("data-bs-id");
        eliminaModal.querySelector(".modal-footer #id").value = id;
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>