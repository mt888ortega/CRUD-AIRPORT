<?php
include('../conexion_db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM passenger WHERE passenger_id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $passportno = $row['passportno'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $passportno = $_POST['passportno'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $query = "UPDATE passenger SET passportno = '$passportno', firstname = '$firstname', lastname = '$lastname' WHERE passenger_id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Pasajero actualizado exitosamente.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pasajero</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Editar Pasajero</h2>
        <form action="editar_pasajero.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <label for="passportno">Número de Pasaporte:</label>
                <input type="text" class="form-control" id="passportno" name="passportno" value="<?php echo $passportno; ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">Nombre:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Apellido:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Actualizar Pasajero</button>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
