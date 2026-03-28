<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Administrador de XProductos</h5>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-productos">
            Nuevo producto
        </button>

        <table class="table table-sm mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="content-productos">

            </tbody>
        </table>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-productos" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                <form action="" id="formulario-productos" autocomplete="off">

                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <input type="text" class="rounded-0- form-control" id="tipo" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="rounded-0- form-control" id="descripcion" required>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="rounded-0 form-control" id="precio" required>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="rounded-0 form-control" id="stock" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="formulario-productos" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin zona Modal -->

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const tabla = document.querySelector("#content-productos")
        const formulario = document.querySelector("#formulario-productos");

        function notificar(mensaje = '') {
            Swal.fire({
                text: mensaje,
                icon: 'info',
                position: 'top-end',
                timer: 2500,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                background: '#fff'
            })
        }

        async function registrarProducto() {
            try {
                const producto = {
                    tipo:        document.querySelector("#tipo").value,
                    descripcion: document.querySelector("#descripcion").value,
                    precio:      document.querySelector("#precio").value,
                    stock:       document.querySelector("#stock").value,
                }
                const response = await fetch(`<?= base_url('xproductos/registrar') ?>`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(producto)
                })
                const data = await response.json()
                notificar(data.message)

                if (!data.success) { return; }

                $('#modal-productos').modal('hide')
                formulario.reset()
                obtenerProductos()
            } catch (e) {
                console.error("No se logro Registrar:", e)
            }
        }

        async function obtenerProductos() {
            try {
                const response = await fetch(`<?= base_url('xproductos/listar') ?>`)
                const data = await response.json();

                console.log("Datos recibidos:", data)
                if (response.status != 200) { return; }
                if (!data) { return; }

                tabla.innerHTML = ``

                data.forEach(element => {
                    tabla.innerHTML += `
                <tr>
                    <td>${element.id}</td>
                    <td>${element.tipo}</td>
                    <td>${element.descripcion}</td>
                    <td>${element.precio}</td>
                    <td>${element.stock}</td>
                    <td>
                    <a href='#' class='btn btn-sm btn-info '> Editar </a>
                    <a href='#' class='btn btn-sm btn-danger '> Eliminar </a>
                    </td>
                </tr>
                `
                });
            } catch (e) {
                console.error("Error al obtener los datos", e)
            }
        }

        formulario.addEventListener("submit", function (event) {
            event.preventDefault();
            if (!confirm("Registramos este producto?")) { return; }
            registrarProducto();
        })

        obtenerProductos()
    })
</script>
<?= $footer ?>