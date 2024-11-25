<?php
include('../conexion_db.php');

if (isset($_POST['flightno']) && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['departure']) && isset($_POST['arrival']) && isset($_POST['airline_id']) && isset($_POST['airplane_id'])) {
    $flightno = $_POST['flightno'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $airline_id = $_POST['airline_id'];
    $airplane_id = $_POST['airplane_id'];

    $query = "INSERT INTO flight (flightno, `from`, `to`, departure, arrival, airline_id, airplane_id) VALUES ('$flightno', '$from', '$to', '$departure', '$arrival', '$airline_id', '$airplane_id')";
    if (mysqli_query($conn, $query)) {
        echo "Vuelo agregado exitosamente.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
