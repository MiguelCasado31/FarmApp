<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo Responsive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .table-xl { display: none; }
        .table-sm { display: block; }
        @media (min-width: 1200px) {
            .table-xl { display: table; }
            .table-sm { display: none; }
        }
    </style>
</head>
<style>
    .overlap-div {
  margin-top: -72px; /* Ajusta la cantidad de superposición */
  z-index: 50;
}
</style>
<body>

<div class=" mt-3">
    <!-- Versión XL (tabla completa) -->
    <table class="table table-bordered table-xl">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Juan Pérez</td>
                <td>30</td>
                <td>Madrid</td>
                <td>123-456-789</td>
            </tr>
        </tbody>
    </table>

    <!-- Versión SM (tabla con botón desplegable) -->
    <div class="table-sm border p-3">
        <table class="table">
            <tbody>
                <tr>
                    <td>Nombre: Juan Pérez</td>
                </tr>
                <tr>
                    <td>
                        <button onclick="toggleInfo()" class="btn btn-primary btn-sm">Más info</button>
                        <div id="infoExtra" style="display: none; margin-top: 10px;">
                            <table class="table">
                                <tr><td>Edad: 30</td></tr>
                                <tr><td>Ciudad: Madrid</td></tr>
                                <tr><td>Teléfono: 123-456-789</td></tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
  <div class="row">
    <div class="col-12 bg-primary text-white text-center p-4">
      DIV Principal (col-12)
    </div>
  </div>
  <div class="row">
    <div class="col-1 bg-danger text-white text-center p-3 overlap-div">
      DIV Superpuesto
    </div>
  </div>
</div>
<script>
    function toggleInfo() {
        var extraInfo = document.getElementById("infoExtra");
        extraInfo.style.display = (extraInfo.style.display === "none") ? "block" : "none";
    }
</script>

</body>
</html>
