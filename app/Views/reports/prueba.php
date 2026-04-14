<style>
    .mt-1{ margin-top: 5px;}
    .mt-2{ margin-top: 10px;}
    .mt-3{ margin-top: 15px;}
    .mt-4{ margin-top: 20px;}
    .mt-5{ margin-top: 25px;}

    .mb-1 {margin-bottom: 5px;}
    .mb-2 {margin-bottom: 10px;}
    .mb-3 {margin-bottom: 15px;}
    .mb-4 {margin-bottom: 20px;}
    .mb-5 {margin-bottom: 25px;}

    .center {text-align: center; }
    .end{text-align: right; }
    .start{text-align: left; }
    .justify{text-align: justify;}



    .cabecera{
        font-style: italic;
        border-bottom: .5px solid black;
    }
    .pie{
        font-style: italic;
        text-align: right;
        border-top: .5 solid black;
    }
    .table{
        width: 100%;
        border-collapse: collapse;
    }

    .table th{
        background-color: #2c3e50;
        color: #fff;
        padding: 8px;
        text-align: left;
    }
    .table td{
        border: 1px solid #ccc;
        padding: 6px;
    }


</style>
<?php
    $total = 0;
    $hombres = 0;
    $mujeres = 0;
    $sumaSueldos = 0;

    foreach($personas as $persona){
        $total++;
        if($persona['Genero'] === 'M') $hombres++;
        if($persona['Genero'] === 'F') $mujeres++;
        $sumaSueldos += $persona['Sueldo'];
    }

    $total    = $total * 10;
    $hombres  = $hombres * 10;
    $mujeres  = $mujeres * 10;
    $promedio = $sumaSueldos / count($personas);
?>

<page backtop="5mm" backbottom="5mm">
    <page_header>
        <div class="cabecera">Reporte de trabajadores</div>
    </page_header>
    <page_footer>
        <div class="pie">Pagina: [[page_cu]] </div>
    </page_footer>
    
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10%" class="center">#</th>
                <th style="width: 15%">Apellidos</th>
                <th style="width: 15%">Nombres</th>
                <th style="width: 25%">Telefono</th>
                <th style="width: 15%">Genero</th>
                <th style="width: 15%">Sueldo</th>
            </tr>
        </thead>
        <tbody>

            <?php $j = 1; ?>
        <?php for($i = 1; $i <= 10; $i++): ?>


            <?php foreach($personas as $persona): ?>
            <tr>
                <td class="center"><?= $j ?></td>
                <td><?= $persona['apellidos']?></td>
                <td><?= $persona['nombres']?></td>
                <td class="center"><?= $persona['telefono']?></td>
                <td class="center"><?= $persona['Genero']?></td>
                <td class="center"><?= $persona['Sueldo']?></td>
            </tr>
            <?php $j ++;?>
            <?php endforeach; ?>

             <?php endfor;?>
        </tbody>
    </table>
</page>

<page pageset="old">
    <h3 class="center">RESUMEN</h3>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50%">Indicador</th>
                <th style="width: 50%">Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total</td>
                <td class="center"><?= $total ?></td>
            </tr>
            <tr>
                <td>Hombres</td>
                <td class="center"><?= $hombres ?></td>
            </tr>
            <tr>
                <td>Mujeres</td>
                <td class="center"><?= $mujeres ?></td>
            </tr>
            <tr>
                <td>Promedio Sueldo</td>
                <td class="center">S/. <?= $promedio ?></td>
            </tr>
        </tbody>
    </table>
</page>
