<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Administrador de vehiculos</h5>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-vehiculos">
            Nuevo vehiculo
        </button>

        <table class="table table-sm mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="contend-vehiculos">

            </tbody>
        </table>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-vehiculos" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Complete el formulario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formulario-vehiculos" autocomplete="off">

                    <div class="form-group">
                        <label for="">Marca:</label>
                        <select name="marcas" class="rounded-0- form-control" id="marcas" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="rounded-0- form-control" id="modelo" required>
                    </div>

                    <div class="form-group">
                        <label for="anio">Año:</label>
                        <input type="text" class="rounded-0- form-control" id="modelo" required minlength="4"
                            maxlength="4" required>
                    </div>

                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input type="text" class="rounded-0- form-control" id="color" required>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" class="rounded-0- form-control" id="precio" required>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="formulario-vehiculos" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin zona Modal -->

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const tabla = document.querySelector("#contend-vehiculos")
        async function obtenerVehiculos() {
            try {
                const response = await fetch(`<?= base_url('vehiculos/listar') ?>`)
                const data = await response.json();


                if (response.status != 200) { return; }

                if (!data) { return; }


                tabla.innerHTML = ``

                data.forEach(element => {
                    tabla.innerHTML += `
                <tr>
                    <th>${element.id}</th>
                    <th>${element.marca}</th>
                    <th>${element.modelo}</th>
                    <th>${element.anio}</th>
                    <th>${element.color}</th>
                    <th>${element.precio}</th>
                    <th>
                    <a href='#' class='btn btn-sm btn-info '> Editar </a>
                    <a href='#' class='btn btn-sm btn-danger '> Eliminar </a>
                    </th>
                </tr>

                `
                });
            } catch (e) {
                console.error("Error al obtener los datos", e)
            }
        }

        obtenerVehiculos()
    })
</script>
<?= $footer ?>