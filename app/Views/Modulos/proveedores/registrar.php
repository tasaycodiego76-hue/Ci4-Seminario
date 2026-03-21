<?= $header ?>
<div class="row">
    <div class="col-md-12">
        <h5>Registro de nuevos proveedores</h5>

        <form action="<?= base_url('proveedores/guardar') ?>" method="post" id="form-proveedores" autocomplete="off">

            <div class="form-group">
                <label for="razonsocial">Razón Social</label>
                <input type="text" class="form-control" id="razonsocial" name="razonsocial" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>

            <div class="form-group">
                <label for="ruc">RUC</label>
                <input type="text" class="form-control" id="ruc" name="ruc" minlength="11" maxlength="11" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" minlength="9" maxlength="9"
                    required>
            </div>

            <div class="form-group">
                <label for="representante">Representante</label>
                <input type="text" class="form-control" id="representante" name="representante" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="<?= base_url('proveedores') ?>" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const formulario = document.querySelector("#form-proveedores");

        formulario.addEventListener("submit", (event) => {
            event.preventDefault();

            if (confirm("¿Registramos este proveedor?")) {
                formulario.submit()
            }
        })
    })
</script>
<?= $footer ?>