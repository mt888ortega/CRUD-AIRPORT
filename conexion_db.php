<?php
$conn = mysqli_connect(

    'localhost', 
    'root', '', 
    'airportdb'
);

if(isset($conn)){
    echo 'La BD airportdb está conectada';
}

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
