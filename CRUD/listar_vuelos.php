<?php include('../conexion_db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vuelos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Lista de Vuelos</h2>
        <table class="table table-striped">
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM flight";
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
                    echo "<td><a href='editar_vuelo.php?id=" . $row['flight_id'] . "' class='btn btn-warning btn-sm'>Editar</a> <a href='eliminar_vuelo.php?id=" . $row['flight_id'] . "' class='btn btn-danger btn-sm'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include('../includes/footer.php'); ?>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>