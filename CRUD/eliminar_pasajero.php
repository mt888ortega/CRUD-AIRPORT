<?php
include('../conexion_db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM passenger WHERE passenger_id = $id";
    if (mysqli_query($conn, $query)) {
        echo "\nPasajero eliminado exitosamente.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
