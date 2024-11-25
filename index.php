<?php include('includes/header.php'); ?>
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Bienvenido al Sistema de Gestión del Aeropuerto</h1>
        <p class="lead">Utiliza el menú para navegar por las diferentes secciones.</p>
        <hr class="my-4">
        <p>Este sistema te permite gestionar aviones, pasajeros, vuelos y más.</p>
        <a class="btn btn-primary btn-lg" href="crud/listar_aviones.php" role="button">Ver Aviones</a>
        <a class="btn btn-primary btn-lg" href="crud/listar_pasajeros.php" role="button">Ver Pasajeros</a>
        <a class="btn btn-primary btn-lg" href="crud/listar_vuelos.php" role="button">Ver Vuelos</a>
        <a class="btn btn-primary btn-lg" href="consultas/consultar_pasajeros_vuelo.php" role="button">Realizar Consulta</a>
    </div>
</div>
<?php include('includes/footer.php'); ?>
