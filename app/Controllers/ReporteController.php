<?php
namespace App\Controllers; //Donde estara el controlador?
use App\Controllers\BaseController;//super clase controlador
use App\Models\VehiculoModel;//Modelo del vehiculo
use Spipu\Html2Pdf\Html2Pdf;//generar pdf
use Spipu\Html2Pdf\Exception\Html2PdfException;//manejar excepciones del pdf
class ReporteController extends BaseController{

    public function generarReportePrueba(){
        $listapersonas =[
    ["apellidos"=> "Torres", "nombres"=>"Carlos","telefono"=>"987654321","Genero"=>"M", "Sueldo"=>"5000"],
    ["apellidos"=> "Flore", "nombres"=>"Martin","telefono"=>"987654444","Genero"=>"M", "Sueldo"=>"4000"],
    ["apellidos"=> "Sanchez", "nombres"=>"Carol","telefono"=>"987654333","Genero"=>"F", "Sueldo"=>"3000"],
    ["apellidos"=> "Levano", "nombres"=>"Sofia","telefono"=>"987654222","Genero"=>"F", "Sueldo"=>"2000"],
    ["apellidos"=> "Garcia", "nombres"=>"Vanessa","telefono"=>"987654111","Genero"=>"F", "Sueldo"=>"1000"],
        ];

        $estilos = view('Reports/estilos');
        $html = view('Reports/prueba',['personas'=>$listapersonas,
        'estilos'=>$estilos]);

        try{

        $html2pdf = new Html2Pdf('P', 'A4', 'es',true, 'UFT-8',[20,15,15,15]);
        $html2pdf ->setDefaultFont('Arial');
        $html2pdf ->writeHTML($html);
        $html2pdf ->output('Reports-prueba.pdf');
        $this->response->setHeader('Content-Type', 'application/pdf');
        }
        catch(Html2PdfException $e){
            $html2pdf->clean();
            throw new \RuntimeException($e->getMessage());
        }
    }
    public function generarReporteVehiculos(){

    $vehiculo = new VehiculoModel();
    $listaVehiculos = $vehiculo->obtenerVehiculos();

    //Enviar datos a la plantilla (contenedor) views\reports\vehiculos-todos.php

    $html = view('Reports/vehiculos-todos', ['vehiculos'=>$listaVehiculos]);

    //3. generar pdf

    try{
        //4.objeto html2pdf = P = PORTRAIT, L= LANDSCAPE
        $html2pdf = new html2pdf('P','A4','es');

        //5. Estableciendo fuente prdeterminada (opcional)
        $html2pdf->setDefaultFont('Arial');
        //6.Sincronizar los datos
        $html2pdf->writeHtml($html);
        //7.Mostar PDF
        //I = Vista previa, D= Descargar , F= guardar servidos, S= retornar como cadena
        $html2pdf->output('Reporte.pdf','I');
        //Forma A- Especificar "cabeceras de binario"

        //Forma B:
        exit();

    }catch(Html2PdfException $e){
        $html2pdf->clean();
        throw new \RuntimeException($e->getMessage());
    }
    }
}