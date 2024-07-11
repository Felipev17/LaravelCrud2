<?php

require 'vendor/autoload.php'; // Carga el autoload de Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Obtener datos del formulario
$productos = $_POST['productos']; // Suponiendo que los productos llegan como un array

// Crear una instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();

// Obtener la hoja activa
$sheet = $spreadsheet->getActiveSheet();

// Escribir encabezados
$sheet->setCellValue('A1', 'cod');
$sheet->setCellValue('B1', 'nombre');
$sheet->setCellValue('C1', 'stock_minimo');
$sheet->setCellValue('D1', 'stock_maximo');
$sheet->setCellValue('E1', 'fecha_vencimiento');
$sheet->setCellValue('F1', 'cod_tipo');
$sheet->setCellValue('G1', 'ubicacion');
$sheet->setCellValue('H1', 'cod_umedida');
$sheet->setCellValue('I1', 'precio_venta');
$sheet->setCellValue('J1', 'existencia');
$sheet->setCellValue('K1', 'IVA');


// Escribir datos de los productos en la hoja de cálculo
$fila = 2; // Comenzar desde la fila 2
foreach ($productos as $producto) {
    $sheet->setCellValue('A1'. $fila, $producto['cod']);
    $sheet->setCellValue('B1'. $fila, $producto['nombre']);
    $sheet->setCellValue('C1'. $fila, $producto['stock_minimo']); 
    $sheet->setCellValue('D1'. $fila, $producto['stock_maximo']); 
    $sheet->setCellValue('E1'. $fila, $producto['fecha_vencimiento']);
    $sheet->setCellValue('F1'. $fila, $producto['cod_tipo']);
    $sheet->setCellValue('G1'. $fila, $producto['ubicacion']); 
    $sheet->setCellValue('H1'. $fila, $producto['cod_umedida']);
    $sheet->setCellValue('I1'.  $fila, $producto['precio_venta']);
    $sheet->setCellValue('J1'.  $fila, $producto['existencia']);
    $sheet->setCellValue('K1'.  $fila, $producto['IVA']);
    $fila++; // Mover a la siguiente fila
}

// Configurar el nombre del archivo
$nombreArchivo = 'productos.xlsx';

// Configurar encabezados para descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreArchivo . '"');
header('Cache-Control: max-age=0');

// Guardar la hoja de cálculo en la salida
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
