<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use App\Models\Productos;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Opciones de configuración de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Instanciar Dompdf con las opciones
        $dompdf = new Dompdf($options);

        // Obtener todos los productos
        $productos = Productos::all();

        // Renderizar la vista "pdf.productos" con los datos proporcionados
        $html = View::make('pdf.productos_pdf', compact('productos'))->render();

        // Cargar HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Devolver el PDF generado
        return $dompdf->output();
    }

    public function exportarPDF()
    {
        // Generar el PDF
        $pdfContent = $this->generatePDF();

        // Devolver una respuesta HTTP con el PDF para descargar
        return new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="productos.pdf"',
        ]);
    }
}
