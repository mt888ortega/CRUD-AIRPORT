document.addEventListener("DOMContentLoaded", function() {
    const btnAviones = document.getElementById('btnAviones');
    const btnPasajeros = document.getElementById('btnPasajeros');
    const btnVuelos = document.getElementById('btnVuelos');
    const btnConsulta = document.getElementById('btnConsulta');
    const content = document.getElementById('content');

    // Función para cargar los datos de los aviones
    btnAviones.addEventListener('click', function() {
        fetch('/api/aviones')
            .then(response => response.json())
            .then(data => {
                content.innerHTML = '<h2>Aviones</h2><table class="table table-striped"><thead><tr><th>ID</th><th>Capacidad</th><th>Tipo</th><th>Aerolínea</th></tr></thead><tbody>';
                data.forEach(avion => {
                    content.innerHTML += `<tr><td>${avion.airplane_id}</td><td>${avion.capacity}</td><td>${avion.type_id}</td><td>${avion.airline_id}</td></tr>`;
                });
                content.innerHTML += '</tbody></table>';
            });
    });

    // Función para cargar los datos de los pasajeros
    btnPasajeros.addEventListener('click', function() {
        fetch('/api/pasajeros')
            .then(response => response.json())
            .then(data => {
                content.innerHTML = '<h2>Pasajeros</h2><table class="table table-striped"><thead><tr><th>ID</th><th>Nombre</th><th>Edad</th></tr></thead><tbody>';
                data.forEach(pasajero => {
                    content.innerHTML += `<tr><td>${pasajero.pasajero_id}</td><td>${pasajero.nombre}</td><td>${pasajero.edad}</td></tr>`;
                });
                content.innerHTML += '</tbody></table>';
            });
    });

    // Función para cargar los datos de los vuelos
    btnVuelos.addEventListener('click', function() {
        fetch('/api/vuelos')
            .then(response => response.json())
            .then(data => {
                content.innerHTML = '<h2>Vuelos</h2><table class="table table-striped"><thead><tr><th>ID</th><th>Origen</th><th>Destino</th><th>Fecha</th></tr></thead><tbody>';
                data.forEach(vuelo => {
                    content.innerHTML += `<tr><td>${vuelo.vuelo_id}</td><td>${vuelo.origen}</td><td>${vuelo.destino}</td><td>${vuelo.fecha}</td></tr>`;
                });
                content.innerHTML += '</tbody></table>';
            });
    });

    // Función para realizar consultas
    btnConsulta.addEventListener('click', function() {
        const consulta = prompt("Ingrese su consulta:");
        fetch(`/api/consulta?query=${encodeURIComponent(consulta)}`)
            .then(response => response.json())
            .then(data => {
                content.innerHTML = `<h2>Resultados de la consulta</h2><pre class="bg-light p-3">${JSON.stringify(data, null, 2)}</pre>`;
            });
    });
});
