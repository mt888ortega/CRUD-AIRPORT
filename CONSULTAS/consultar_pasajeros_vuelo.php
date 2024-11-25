<?php include('../conexion_db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Consultas</h2>

        <!-- Consultar Aviones -->
        <div class="card mb-4">
            <div class="card-header">
                Consultar Aviones
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="airplane_id">ID de Avión:</label>
                        <input type="number" class="form-control" id="airplane_id" name="airplane_id">
                    </div>
                    <button type="submit" name="consultar_aviones" class="btn btn-primary">Consultar</button>
                </form>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Capacidad</th>
                            <th>Tipo de Avión</th>
                            <th>ID de Aerolínea</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['consultar_aviones'])) {
                            $airplane_id = $_POST['airplane_id'];
                            $query = "SELECT * FROM airplane";
                            if ($airplane_id) {
                                $query .= " WHERE airplane_id = $airplane_id";
                            }
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['airplane_id'] . "</td>";
                                echo "<td>" . $row['capacity'] . "</td>";
                                echo "<td>" . $row['type_id'] . "</td>";
                                echo "<td>" . $row['airline_id'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Consultar Pasajeros -->
        <div class="card mb-4">
            <div class="card-header">
                Consultar Pasajeros
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="passenger_id">ID de Pasajero:</label>
                        <input type="number" class="form-control" id="passenger_id" name="passenger_id">
                    </div>
                    <button type="submit" name="consultar_pasajeros" class="btn btn-primary">Consultar</button>
                </form>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pasaporte</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['consultar_pasajeros'])) {
                            $passenger_id = $_POST['passenger_id'];
                            $query = "SELECT * FROM passenger";
                            if ($passenger_id) {
                                $query .= " WHERE passenger_id = $passenger_id";
                            }
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['passenger_id'] . "</td>";
                                echo "<td>" . $row['passportno'] . "</td>";
                                echo "<td>" . $row['firstname'] . "</td>";
                                echo "<td>" . $row['lastname'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Consultar Vuelos -->
        <div class="card mb-4">
            <div class="card-header">
                Consultar Vuelos
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="flight_id">ID de Vuelo:</label>
                        <input type="number" class="form-control" id="flight_id" name="flight_id">
                    </div>
                    <button type="submit" name="consultar_vuelos" class="btn btn-primary">Consultar</button>
                </form>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número de Vuelo</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Salida</th>
                            <th>Llegada</th>
                            <th>ID de Aerolínea</th>
                            <th>ID de Avión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['consultar_vuelos'])) {
                            $flight_id = $_POST['flight_id'];
                            $query = "SELECT * FROM flight";
                            if ($flight_id) {
                                $query .= " WHERE flight_id = $flight_id";
                            }
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['flight_id'] . "</td>";
                                echo "<td>" . $row['flightno'] . "</td>";
                                echo "<td>" . $row['from'] . "</td>";
                                echo "<td>" . $row['to'] . "</td>";
                                echo "<td>" . $row['departure'] . "</td>";
                                echo "<td>" . $row['arrival'] . "</td>";
                                echo "<td>" . $row['airline_id'] . "</td>";
                                echo "<td>" . $row['airplane_id'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include('../includes/footer.php'); ?>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
