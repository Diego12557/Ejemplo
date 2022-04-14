<?php

$conn = mysqli_connect( 
    'localhost',
    'root',
    '',
    'tarea-app'
);

if (mysqli_connect_error()) {
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}







?>