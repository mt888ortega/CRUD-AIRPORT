<?php
include('../conexion_db.php');

if (isset($_POST['passportno']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {
    $passportno = $_POST['passportno'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $query = "INSERT INTO passenger (passportno, firstname, lastname) VALUES ('$passportno', '$firstname', '$lastname')";
    if (mysqli_query($conn, $query)) {
        echo "Pasajero agregado exitosamente.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
