<?php include('../conexion_db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aviones</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="container">
        <h2>Lista de Aviones</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Capacidad</th>
                    <th>Tipo de Avión</th>
                    <th>ID de Aerolínea</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM airplane";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['airplane_id'] . "</td>";
                    echo "<td>" . $row['capacity'] . "</td>";
                    echo "<td>" . $row['type_id'] . "</td>";
                    echo "<td>" . $row['airline_id'] . "</td>";
                    echo "<td><a href='editar_avion.php?id=" . $row['airplane_id'] . "'>Editar</a> | <a href='eliminar_avion.php?id=" . $row['airplane_id'] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
