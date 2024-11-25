<?php include('../conexion_db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Avión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container">
        <h2>Agregar Avión</h2>
        <form action="guardar_avion.php" method="POST">
            <div class="form-group">
                <label for="capacity">Capacidad:</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <div class="form-group">
                <label for="type_id">Tipo de Avión:</label>
                <input type="number" class="form-control" id="type_id" name="type_id" required>
            </div>
            <div class="form-group">
                <label for="airline_id">ID de Aerolínea:</label>
                <input type="number" class="form-control" id="airline_id" name="airline_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Avión</button>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
