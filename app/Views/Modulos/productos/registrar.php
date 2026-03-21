<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Registro de nuevos productos</h5>

        <form action="<?= base_url('productos/guardar') ?>" method="post" id="form-productos" autocomplete="off">

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="<?= base_url('productos') ?>" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const formulario = document.querySelector("#form-productos");

        formulario.addEventListener("submit", (event) => {
            event.preventDefault();

            if (confirm("¿Registramos este producto?")) {
                formulario.submit()
            }
        })
    })
</script>
<?= $footer ?>