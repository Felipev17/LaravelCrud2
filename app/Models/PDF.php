<?php

namespace App\Models;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class PDF
{
    public static function generatePDF($view, $data = [])
    {
        // Opciones de configuración de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Instanciar Dompdf con las opciones
        $dompdf = new Dompdf($options);

        // Renderizar la vista con los datos proporcionados
        $html = View::make($view, $data)->render();

        // Cargar HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Devolver el PDF generado
        return $dompdf->output();
    }
}
