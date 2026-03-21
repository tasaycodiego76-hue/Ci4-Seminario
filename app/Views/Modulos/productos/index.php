<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Lista de Productos</h5>
        <a href="<?= base_url('productos/registrar') ?>" class="btn btn-sm btn-primary">Registrar</a>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody id="content-table">
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><?= $producto['tipo'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td>S/. <?= number_format($producto['precio'], 2) ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td>
                        <!-- Eliminación directa -->
                        <a href="<?= base_url('productos/eliminar/' . $producto['id']) ?>"
                            class="btn btn-sm btn-secondary">Eliminar</a>
                        <!-- eliminacion previa confirmacion -->
                        <a href="#" class="btn btn-sm btn-danger btn-eliminar" data-idproducto="<?= $producto['id'] ?>"
                            data-descripcion="<?= $producto['descripcion'] ?>">
                            Eliminar</a>
                        <!-- Si deseamos tener control sobre un grupo especifico de elementos, debemos agregarle un valor diferenciardor  -->
                        <a href="<?= base_url('productos/buscar/' . $producto['id']) ?>"
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
                const descripcion = event.target.getAttribute("data-descripcion");

                //recuperamos el data id-productos
                const idProducto = event.target.getAttribute("data-idproducto");

                if (confirm(`¿Deseas eliminar el producto: ${descripcion}?`)) {

                    //proceder a eliminar
                    window.location.href = "<?= base_url('productos/eliminar/') ?>" + idProducto
                }
            }

        })
    })
</script>
<?= $footer ?>