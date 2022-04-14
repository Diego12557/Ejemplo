<?php
include('db.php');
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM tarea WHERE materia LIKE '$search%'";
    
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Error! ".mysqli_error($conn));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'materia' => $row['materia'],
            'descripcion' => $row['descripcion']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;

}



?>