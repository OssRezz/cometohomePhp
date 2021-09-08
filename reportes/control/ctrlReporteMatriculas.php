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

$reporte->setTitle("Reporte de matricula");


//Posicion del titulo
$reporte->setCellValue('A1', 'Reporte de matriculas');
$reporte->setCellValue('F1', 'Fecha de reporte: ');
$reporte->setCellValue('G1',  $date);



//Estilo del titulo
$spreadsheet->getActiveSheet()->mergeCells("A1:C1");
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight(30);

//Campos de la cabecera
$reporte->setCellValue('A2', 'Clase');
$reporte->setCellValue('B2', 'ID profesor');
$reporte->setCellValue('C2', 'Profesor');
$reporte->setCellValue('D2', 'ID Estudiante');
$reporte->setCellValue('E2', 'Estudiante');
$reporte->setCellValue('F2', 'Fecha matricula');
$reporte->setCellValue('G2', 'Valor de pago');


//Tamaño de las columnas 
$spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension("F")->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension("G")->setWidth(20);


//Estilo negrilla, tamaño de letra, y fila
$spreadsheet->getActiveSheet()->getStyle('A2:G2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A2:G2')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getRowDimension("2")->setRowHeight(30);

//Aplicamos nuestros colores del arreglo
$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($tableStyle);
$spreadsheet->getActiveSheet()->getStyle('A2:G2')->applyFromArray($tableStyle);


$count = 3;
$Reporte = $reporteClases->reporteDeMatriculas();


if ($Reporte != null) {
    foreach ($Reporte as $rows) {
        $reporte->setCellValue('A' . $count, $rows['clase']);
        $reporte->setCellValue('B' . $count, $rows['cc_profesor']);
        $reporte->setCellValue('C' . $count, $rows['profesor']);
        $reporte->setCellValue('D' . $count, $rows['cc_estudiante']);
        $reporte->setCellValue('E' . $count, $rows['estudiante']);
        $reporte->setCellValue('F' . $count, $rows['fechamatricula']);
        $reporte->setCellValue('G' . $count, $rows['valorpago']);
        $count++;
    }
} else {
    $reporte->setCellValue('A' . $count + 1, "No hay registro en la base de datos");
}

//autofilter
//define first row and last row
$firstRow = 2;
$lasRow = $count - 1;
$spreadsheet->getActiveSheet()->setAutoFilter("A" . $firstRow . ":G" . $lasRow);




header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte-Matricula-' . $date . '.xls"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
exit();
