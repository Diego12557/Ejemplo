<?php
include('db.php');

if (isset($_POST['id'])) {
    
    
    $id = $_POST['id'];
    $query = "DELETE FROM tarea WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error!").mysqli_error($conn);
    }
    echo "Tarea Eliminada";
}








?>