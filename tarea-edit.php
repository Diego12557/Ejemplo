<?php 
include('db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $materia = $_POST['materia'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE tarea SET materia = '$materia', descripcion = '$descripcion' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Error".mysqli_error($conn));
    }
    echo 'Tarea Actualizada';
}


?>