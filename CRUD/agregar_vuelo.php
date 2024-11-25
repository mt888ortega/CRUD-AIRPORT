<?php include('../conexion_db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vuelo</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Agregar Vuelo</h2>
        <form action="guardar_vuelo.php" method="POST">
            <div class="form-group">
                <label for="flightno">Número de Vuelo:</label>
                <input type="text" class="form-control" id="flightno" name="flightno" required>
            </div>
            <div class="form-group">
                <label for="from">Desde (ID Aeropuerto):</label>
                <input type="number" class="form-control" id="from" name="from" required>
            </div>
            <div class="form-group">
                <label for="to">Hasta (ID Aeropuerto):</label>
                <input type="number" class="form-control" id="to" name="to" required>
            </div>
            <div class="form-group">
                <label for="departure">Hora de Salida:</label>
                <input type="datetime-local" class="form-control" id="departure" name="departure" required>
            </div>
            <div class="form-group">
                <label for="arrival">Hora de Llegada:</label>
                <input type="datetime-local" class="form-control" id="arrival" name="arrival" required>
            </div>
            <div class="form-group">
                <label for="airline_id">ID de Aerolínea:</label>
                <input type="number" class="form-control" id="airline_id" name="airline_id" required>
            </div>
            <div class="form-group">
                <label for="airplane_id">ID de Avión:</label>
                <input type="number" class="form-control" id="airplane_id" name="airplane_id" required>
            </div>
            <!-- Botones -->
            <button type="submit" class="btn btn-primary">Guardar Vuelo</button>
            <button type="submit" name="guardar_otro" class="btn btn-secondary">Guardar Otro Vuelo</button>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>