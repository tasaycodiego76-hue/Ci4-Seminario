<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Lista de Clientes</h5>
        <a href="<?= base_url('clientes/registrar') ?>" class="btn btn-sm btn-primary">Registrar</a>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody id="content-table">
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['id'] ?></td>
                    <td><?= $cliente['apellidos'] ?></td>
                    <td><?= $cliente['nombres'] ?></td>
                    <td><?= $cliente['dni'] ?></td>
                    <td><?= $cliente['telefono'] ?></td>
                    <td>
                        <!-- Eliminación directa -->
                        <a href="<?= base_url('clientes/eliminar/' . $cliente['id']) ?>"
                            class="btn btn-sm btn-secondary">Eliminar</a>
                        <!-- eliminacion previa confirmacion -->
                        <a href="#" class="btn btn-sm btn-danger btn-eliminar" data-idcliente="<?= $cliente['id'] ?>"
                            data-nombres="<?= $cliente['nombres'] ?>">
                            Eliminar</a>
                        <!-- Si deseamos tener control sobre un grupo especifico de elementos, debemos agregarle un valor diferenciardor  -->
                        <a href="<?= base_url('clientes/buscar/' . $cliente['id']) ?>"
                            class="btn btn-sm btn-info">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        //Referencia
        const dataTable = document.querySelector("#content-table");

        dataTable.addEventListener("click", function (event) {

            //Detectar os botones eliminacion
            if (event.target.classList.contains('btn-eliminar')) {
                const nombres = event.target.getAttribute("data-nombres");

                //recuperamos el data id-cliente
                const idCliente = event.target.getAttribute("data-idcliente");

                if (confirm(`¿Deseas eliminar el cliente: ${nombres}?`)) {

                    //proceder a eliminar
                    window.location.href = "<?= base_url('clientes/eliminar/') ?>" + idCliente
                }
            }

        })
    })
</script>
<?= $footer ?>