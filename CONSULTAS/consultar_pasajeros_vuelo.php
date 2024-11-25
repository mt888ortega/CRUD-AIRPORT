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
    <style>
        body {
            font-size: 0.9rem; /* Reduce el tamaño de la fuente */
        }
        .footer-space {
            height: 100px; /* Espacio adicional al final de la página */
        }
    </style>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container mt-5">
        <h2>Consultas</h2>

        <!-- Consultar Información de vuelos, aerolíneas y tipos de aviones -->
        <div class="card mb-4">
            <div class="card-header">
                Consultar Información de vuelos, aerolíneas y tipos de aviones


            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="flight_id">ID de Vuelo (opcional):</label>
                        <input type="number" class="form-control" id="flight_id" name="flight_id">
                    </div>
                    <button type="submit" name="consultar_combinada" class="btn btn-primary">Consultar</button>
                </form>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Vuelo</th>
                            <th>Salida</th>
                            <th>Llegada</th>
                            <th>Aerolínea</th>
                            <th>Tipo de Avión</th>
                            <th>Descripción del Avión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['consultar_combinada'])) {
                            $flight_id = $_POST['flight_id'];
                            $query = "SELECT
                                        f.flightno AS Vuelo,
                                        f.departure AS Salida,
                                        f.arrival AS Llegada,
                                        al.airlinename AS Aerolinea,
                                        at.identifier AS Tipo_Avion,
                                        at.description AS Descripcion_Avion
                                      FROM
                                        flight f
                                      JOIN
                                        airline al ON f.airline_id = al.airline_id
                                      JOIN
                                        airplane ap ON f.airplane_id = ap.airplane_id
                                      JOIN
                                        airplane_type at ON ap.type_id = at.type_id";
                            if ($flight_id) {
                                $query .= " WHERE f.flight_id = $flight_id";
                            }
                            $query .= " ORDER BY f.flightno, al.airlinename";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['Vuelo'] . "</td>";
                                echo "<td>" . $row['Salida'] . "</td>";
                                echo "<td>" . $row['Llegada'] . "</td>";
                                echo "<td>" . $row['Aerolinea'] . "</td>";
                                echo "<td>" . $row['Tipo_Avion'] . "</td>";
                                echo "<td>" . $row['Descripcion_Avion'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Consultar Información Detallada de Vuelos y Pasajeros -->
        <div class="card mb-4">
            <div class="card-header">
                Consultar Información Detallada de Vuelos y Pasajeros
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="flight_id_detail">ID de Vuelo (opcional):</label>
                        <input type="number" class="form-control" id="flight_id_detail" name="flight_id_detail">
                    </div>
                    <button type="submit" name="consultar_detallada" class="btn btn-primary">Consultar</button>
                </form>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Vuelo</th>
                            <th>Salida</th>
                            <th>Llegada</th>
                            <th>Aeropuerto Origen</th>
                            <th>Aeropuerto Destino</th>
                            <th>Nombre Pasajero</th>
                            <th>Apellido Pasajero</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['consultar_detallada'])) {
                            $flight_id_detail = $_POST['flight_id_detail'];
                            $query = "SELECT 
                                        f.flightno AS Vuelo, 
                                        f.departure AS Salida, 
                                        f.arrival AS Llegada, 
                                        a.name AS Aeropuerto_Origen, 
                                        a2.name AS Aeropuerto_Destino, 
                                        p.firstname AS Nombre_Pasajero, 
                                        p.lastname AS Apellido_Pasajero
                                      FROM 
                                        flight f
                                      JOIN 
                                        airport a ON f.from = a.airport_id
                                      JOIN 
                                        airport a2 ON f.to = a2.airport_id
                                      JOIN 
                                        booking b ON f.flight_id = b.flight_id
                                      JOIN 
                                        passenger p ON b.passenger_id = p.passenger_id";
                            if ($flight_id_detail) {
                                $query .= " WHERE f.flight_id = $flight_id_detail";
                            }
                            $query .= " ORDER BY f.flightno, p.lastname";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['Vuelo'] . "</td>";
                                echo "<td>" . $row['Salida'] . "</td>";
                                echo "<td>" . $row['Llegada'] . "</td>";
                                echo "<td>" . $row['Aeropuerto_Origen'] . "</td>";
                                echo "<td>" . $row['Aeropuerto_Destino'] . "</td>";
                                echo "<td>" . $row['Nombre_Pasajero'] . "</td>";
                                echo "<td>" . $row['Apellido_Pasajero'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Consultar Información de Empleados y sus Vuelos Asignados -->
        <div class="card mb-4">
            <div class="card-header">
                Consultar Información de Empleados y sus Vuelos Asignados
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="employee_id">ID de Empleado (opcional):</label>
                        <input type="number" class="form-control" id="employee_id" name="employee_id">
                    </div>
                    <button type="submit" name="consultar_empleados" class="btn btn-primary">Consultar</button>
                </form>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Nombre Empleado</th>
                            <th>Apellido Empleado</th>
                            <th>Departamento</th>
                            <th>Vuelo</th>
                            <th>Salida</th>
                            <th>Llegada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['consultar_empleados'])) {
                            $employee_id = $_POST['employee_id'];
                            $query = "SELECT 
                                        e.firstname AS Nombre_Empleado, 
                                        e.lastname AS Apellido_Empleado, 
                                        e.department AS Departamento, 
                                        f.flightno AS Vuelo, 
                                        f.departure AS Salida, 
                                        f.arrival AS Llegada
                                      FROM 
                                        employee e
                                      JOIN 
                                        flight_log fl ON e.username = fl.user
                                      JOIN 
                                        flight f ON fl.flight_id = f.flight_id";
                            if ($employee_id) {
                                $query .= " WHERE e.employee_id = $employee_id";
                            }
                            $query .= " ORDER BY e.lastname, f.flightno";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['Nombre_Empleado'] . "</td>";
                                echo "<td>" . $row['Apellido_Empleado'] . "</td>";
                                echo "<td>" . $row['Departamento'] . "</td>";
                                echo "<td>" . $row['Vuelo'] . "</td>";
                                echo "<td>" . $row['Salida'] . "</td>";
                                echo "<td>" . $row['Llegada'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer-space"></div> <!-- Espacio adicional al final de la página[_{{{CITATION{{{_1{](https://github.com/samir04m/SistemaVotacionWeb2018_NoDB/tree/075ab38aafabc453bdfafc1b5e9ca54354cb54d9/views%2Ftemplate.php)[_{{{CITATION{{{_2{](https://github.com/AdrianoLimberger/BellaVista/tree/43cdd0df39f07a7642440f098c5e112554d2b00d/consultas.php)