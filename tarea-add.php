<?php
include('db.php');
if (isset($_POST['guardar'])) {
    $materia = $_POST['materia']; 
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO tarea (materia, descripcion)VALUES('$materia','$descripcion')";
    $result= mysqli_query($conn,$query);

    if (!$result) {
        die("Query Error").mysqli_error($conn);
    }

    


}





?>