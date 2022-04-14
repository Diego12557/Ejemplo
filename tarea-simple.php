<?php

include('db.php');

if (isset($_POST['id'])) {
    
    $id = $_POST['id'];
    $query = "SELECT * FROM tarea WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Error".mysqli_error($conn));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'materia' => $row['materia'],
            'descripcion' => $row['descripcion'],
            'id' => $row['id']
        );
    }

    $jsonString = json_encode($json[0]);
    echo $jsonString;


}




?>