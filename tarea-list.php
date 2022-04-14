<?php
include('db.php');

$query = "SELECT * FROM tarea";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error").mysqli_error($conn);
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'id' => $row['id'],
        'materia' => $row['materia'],
        'descripcion' => $row['descripcion']
    );
}
$jsonString = json_encode($json);
echo $jsonString;

?>