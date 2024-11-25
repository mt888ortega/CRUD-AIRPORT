<?php
include('../conexion_db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM airplane WHERE airplane_id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $capacity = $row['capacity'];
        $type_id = $row['type_id'];
        $airline_id = $row['airline_id'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $capacity = $_POST['capacity'];
    $type_id = $_POST['type_id'];
    $airline_id = $_POST['airline_id'];

    $query = "UPDATE airplane SET capacity = '$capacity', type_id = '$type_id', airline_id = '$airline_id' WHERE airplane_id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Avión actualizado exitosamente.";
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
    <title>Editar Avión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container">
        <h2>Editar Avión</h2>
        <form action="editar_avion.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
                <label for="capacity">Capacidad:</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo $capacity; ?>" required>
            </div>
            <div class="form-group">
                <label for="type_id">Tipo de Avión:</label>
                <input type="number" class="form-control" id="type_id" name="type_id" value="<?php echo $type_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="airline_id">ID de Aerolínea:</label>
                <input type="number" class="form-control" id="airline_id" name="airline_id" value="<?php echo $airline_id; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Actualizar Avión</button>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
