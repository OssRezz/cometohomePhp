<?php
require '../Modelo/ModeloReportes.php';
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//Style
$tableStyle = [
    'font' => [
        'color' => [
            'rgb' => 'FFFFFF'
        ],
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '238340'
        ]
    ],
];

$date = date('Y-m-d');
$reporteClases = new Reportes();
$spreadsheet = new Spreadsheet();
$reporte = $spreadsheet->getActiveSheet();

$reporte->setTitle('Lista de alumnos');


//Posicion del titulo
$reporte->setCellValue('A1', 'Lista de alumnos');
$reporte->setCellValue('F1', 'Fecha de reporte: ');
$reporte->setCellValue('I1',  $date);




//Estilo del titulo
$spreadsheet->getActiveSheet()->mergeCells("A1:C1");
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight(30);

//Campos de la cabecera
$reporte->setCellValue('A2', 'Identificación');
$reporte->setCellValue('B2', 'Estudiante');
$reporte->setCellValue('C2', 'Nacimiento');
$reporte->setCellValue('D2', 'Correo');
$reporte->setCellValue('E2', 'Dirección');
$reporte->setCellValue('F2', 'Teléfono');
$reporte->setCellValue('G2', 'Sisben');
$reporte->setCellValue('H2', 'Genero');
$reporte->setCellValue('I2', 'Poblacion');


//Tamaño de las columnas 
$spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("F")->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension("G")->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension("H")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("I")->setWidth(35);


//Estilo negrilla, tamaño de letra, y fila
$spreadsheet->getActiveSheet()->getStyle('A2:I2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A2:I2')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getRowDimension("2")->setRowHeight(30);

//Aplicamos nuestros colores del arreglo
$spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($tableStyle);
$spreadsheet->getActiveSheet()->getStyle('A2:I2')->applyFromArray($tableStyle);


$count = 3;
$Reporte = $reporteClases->listaAlumnos();


if ($Reporte != null) {
    foreach ($Reporte as $rows) {
        $reporte->setCellValue('A' . $count, $rows['cc_estudiante']);
        $reporte->setCellValue('B' . $count, $rows['nombre']);
        $reporte->setCellValue('C' . $count, $rows['fechanaci']);
        $reporte->setCellValue('D' . $count, $rows['email']);
        $reporte->setCellValue('E' . $count, $rows['direccion']);
        $reporte->setCellValue('F' . $count, $rows['telefono']);
        $reporte->setCellValue('G' . $count, $rows['sisben']);
        $reporte->setCellValue('H' . $count, $rows['genero']);
        $reporte->setCellValue('I' . $count, $rows['poblacion']);
        $count++;
    }
} else {
    $reporte->setCellValue('A' . $count + 1, "No hay registro en la base de datos");
}

//autofilter
//define first row and last row
$firstRow = 2;
$lasRow = $count - 1;
$spreadsheet->getActiveSheet()->setAutoFilter("A" . $firstRow . ":I" . $lasRow);




header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="asisntecia-Alumnos-' . $date . '.xls"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
exit();
