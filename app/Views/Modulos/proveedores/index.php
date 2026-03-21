<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Lista de Proveedores</h5>
        <a href="<?= base_url('proveedores/registrar') ?>" class="btn btn-sm btn-primary">Registrar</a>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Razón Social</th>
                <th>Dirección</th>
                <th>RUC</th>
                <th>Teléfono</th>
                <th>Representante</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody id="content-table">
            <?php foreach ($proveedores as $proveedor): ?>
                <tr>
                    <td><?= $proveedor['id'] ?></td>
                    <td><?= $proveedor['razonsocial'] ?></td>
                    <td><?= $proveedor['direccion'] ?></td>
                    <td><?= $proveedor['ruc'] ?></td>
                    <td><?= $proveedor['telefono'] ?></td>
                    <td><?= $proveedor['representante'] ?></td>
                    <td>
                        <!-- Eliminación directa -->
                        <a href="<?= base_url('proveedores/eliminar/' . $proveedor['id']) ?>"
                            class="btn btn-sm btn-secondary">Eliminar</a>
                        <!-- eliminacion previa confirmacion -->
                        <a href="#" class="btn btn-sm btn-danger btn-eliminar" data-idproveedor="<?= $proveedor['id'] ?>"
                            data-razonsocial="<?= $proveedor['razonsocial'] ?>">
                            Eliminar</a>
                        <!-- Si deseamos tener control sobre un grupo especifico de elementos, debemos agregarle un valor diferenciardor  -->
                        <a href="<?= base_url('proveedores/buscar/' . $proveedor['id']) ?>"
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
                const razonsocial = event.target.getAttribute("data-razonsocial");

                //recuperamos el data id-proveedor
                const idProveedores = event.target.getAttribute("data-idproveedor");

                if (confirm(`¿Deseas eliminar el proveedor: ${razonsocial}?`)) {

                    //proceder a eliminar
                    window.location.href = "<?= base_url('proveedores/eliminar/') ?>" + idProveedores
                }
            }

        })
    })
</script>
<?= $footer ?>