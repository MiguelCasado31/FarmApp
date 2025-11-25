<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Actividad</title>
    <link rel="shortcut icon" href="../images/farm-app1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7093f3be1.js" crossorigin="anonymous"></script>
</head>

<?php
require_once "../modelo/modelo_tierras.php";
?>

<body class="imagen">
    <div class="container">

        <div class="bg-white container text-center card mt-5">
            <h2 class="mt-3 lead" style="font-size: xx-large;"><strong>Nueva Actividad</strong></h2>
            <form action="../controlador/controlador_actividades.php" method="POST">
                <input type="hidden" name="accion" value="alta">

                <div class="d-flex mt-3">
                    <label class="col-md-2 lead" for="trabajo"><strong>Trabajo:</strong></label>
                    <select name="trabajo" id="trabajo" class="form-control w-75">
                        <option value="">Seleccione...</option>
                        <option value="Arado">Arado</option>
                        <option value="Siembra">Siembra</option>
                        <option value="Tto. Fitosanitario">Tto. Fitosanitario</option>
                        <option value="Cosecha">Cosecha</option>
                    </select>
                </div>

                <!-- Campos específicos para tratamientos fitosanitarios (ocultos por defecto) -->
                <div id="fitosanitario-campos" style="display:none;" class="form-group mt-3">
                    <div id="productos-container" class="w-100">
                        <!-- Fila plantilla inicial -->
                        <div class="product-row d-flex justify-content-center align-items-end m-2">
                            <div class="col-md-5 m-2">
                                <label class="lead" for="producto"><strong>Producto:</strong></label>
                                <input type="text" name="producto[]" class="form-control producto-input" placeholder="Nombre del producto">
                            </div>
                            <div class="col-md-3 m-2">
                                <label class="lead" for="dosis"><strong>Dosis (L/ha):</strong></label>
                                <input type="text" name="dosis[]" class="form-control dosis-input" placeholder="Ej. 1.5">
                            </div>
                            <div class="col-md-2 m-2">
                                <label class="lead" for="cantidad_ha"><strong>Cantidad (L/ha):</strong></label>
                                <input type="number" name="cantidad_ha[]" class="form-control cantidad-input" step="0.01" min="0" placeholder="Ej. 2.5">
                            </div>
                            <div class="col-md-1 m-2">
                                <button type="button" class="btn btn-danger btn-sm remove-product" style="height:38px; margin-left:8px; display:none;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-2">
                        <div class="col-md-4">
                            <button id="add-product-btn" type="button" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-plus"></i> Añadir producto
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6 required">
                        <label class="lead" for="fecha"><strong>Fecha:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha">
                    </div>
                </div>
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                        <label class="lead" for="duracion"><strong>Duracion:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <input type="time"
                            id="duracion"
                            name="duracion"
                            class="form-control"
                            value="00:00"
                            min="00:00"
                            max="23:59"
                            step="600">
                    </div>
                </div>
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                        <label class="lead" for="parcela"><strong>Parcela:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <select name="parcela" class="form-control">
                            <?php

                            $parcelas = obtener_parcelas();
                            foreach ($parcelas as $parcela) :
                                echo '<option value="' . $parcela['nombre'] . '">' . $parcela['nombre'] . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex mt-3">
                    <div class="col-xl-2 col-md-4 col-sm-6 col-6">
                        <label class="lead" for="maquinaria"><strong>Maquinaria:</strong></label>
                    </div>
                    <div class="col-xl-10 col-md-8 col-sm-6 col-6">
                        <select name="maquinaria" id="maquinaria" class="form-control">
                            <?php

                            $maquinarias = obtener_maquinaria();
                            foreach ($maquinarias as $maquinaria) :
                                echo '<option value="' . $maquinaria['Marca'] . ' ' . $maquinaria['Modelo'] . '">' . $maquinaria['Marca'] . ' ' . $maquinaria['Modelo'] . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="row">
                        <label class="lead" for="comentario"><strong>Comentarios:</strong></label>
                    </div>
                    <div class="row justify-content-center">
                        <textarea class="form-control w-75" rows="5" id="comentario" name="comentario"></textarea>
                    </div>
                </div>


                <div class="pb-3">
                    <button type="submit" class="btn btn-primary btn-block mt-4">
                        <i class="fa-regular fa-paper-plane"></i> Enviar</button>
                </div>

            </form>
        </div>
        <div class="text-center mt-5">
            <a href="listado_actividades.php"><button class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left"></i> Inicio</button></a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const trabajoSelect = document.getElementById('trabajo');
            const fitosCampos = document.getElementById('fitosanitario-campos');
            const addBtn = document.getElementById('add-product-btn');
            const productosContainer = document.getElementById('productos-container');

            function setRequiredForProductos(required) {
                productosContainer.querySelectorAll('.producto-input').forEach(i => {
                    if (required) i.setAttribute('required', 'required'); else i.removeAttribute('required');
                });
                productosContainer.querySelectorAll('.dosis-input').forEach(i => {
                    if (required) i.setAttribute('required', 'required'); else i.removeAttribute('required');
                });
                productosContainer.querySelectorAll('.cantidad-input').forEach(i => {
                    if (required) i.setAttribute('required', 'required'); else i.removeAttribute('required');
                });
                // Mostrar/ocultar botones eliminar según filas (>1)
                const rows = productosContainer.querySelectorAll('.product-row');
                rows.forEach((r, idx) => {
                    const btn = r.querySelector('.remove-product');
                    if (btn) btn.style.display = (rows.length > 1) ? 'inline-block' : 'none';
                });
            }

            function toggleFitos() {
                if (trabajoSelect && trabajoSelect.value === 'Tto. Fitosanitario') {
                    fitosCampos.style.display = 'block';
                    setRequiredForProductos(true);
                } else {
                    fitosCampos.style.display = 'none';
                    setRequiredForProductos(false);
                }
            }

            function addProductRow(product='', dosis='', cantidad='') {
                const row = document.createElement('div');
                row.className = 'product-row d-flex justify-content-center align-items-end m-2';
                row.innerHTML = `
                    <div class="col-md-5 m-2">
                        <input type="text" name="producto[]" class="form-control producto-input" placeholder="Nombre del producto" value="${escapeHtml(product)}">
                    </div>
                    <div class="col-md-3 m-2">
                        <input type="text" name="dosis[]" class="form-control dosis-input" placeholder="Ej. 1.5" value="${escapeHtml(dosis)}">
                    </div>
                    <div class="col-md-2 m-2">
                        <input type="number" name="cantidad_ha[]" class="form-control cantidad-input" step="0.01" min="0" placeholder="Ej. 2.5" value="${escapeHtml(cantidad)}">
                    </div>
                    <div class="col-md-1 m-2">
                        <button type="button" class="btn btn-danger btn-sm remove-product" style="height:38px; margin-left:8px;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                `;
                productosContainer.appendChild(row);

                // evento eliminar
                const btn = row.querySelector('.remove-product');
                btn.addEventListener('click', function() {
                    row.remove();
                    setRequiredForProductos(trabajoSelect.value === 'Tto. Fitosanitario');
                });

                setRequiredForProductos(trabajoSelect.value === 'Tto. Fitosanitario');
            }

            // escapar para evitar inyección en el value html
            function escapeHtml(text) {
                if (!text && text !== 0) return '';
                return String(text).replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/'/g, '&#039;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            }

            // inicializa estado
            toggleFitos();

            addBtn.addEventListener('click', function() {
                addProductRow();
            });

            // añadir comportamiento al botón remove de la fila inicial (si se convierte en visible y hay >1)
            productosContainer.querySelectorAll('.remove-product').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    const row = e.currentTarget.closest('.product-row');
                    if (row) { row.remove(); setRequiredForProductos(trabajoSelect.value === 'Tto. Fitosanitario'); }
                });
            });

            trabajoSelect.addEventListener('change', toggleFitos);
        });
    </script>
</body>

</html>