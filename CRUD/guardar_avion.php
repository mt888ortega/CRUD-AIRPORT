<?php
include('../conexion_db.php');

if (isset($_POST['capacity']) && isset($_POST['type_id']) && isset($_POST['airline_id'])) {
    $capacity = $_POST['capacity'];
    $type_id = $_POST['type_id'];
    $airline_id = $_POST['airline_id'];

    $query = "INSERT INTO airplane (capacity, type_id, airline_id) VALUES ('$capacity', '$type_id', '$airline_id')";
    if (mysqli_query($conn, $query)) {
        echo "Avión agregado exitosamente.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
