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

$reporte->setTitle('Reporte de eventos');


//Posicion del titulo
$reporte->setCellValue('A1', 'Reporte de eventos');
$reporte->setCellValue('E1', 'Fecha de reporte: ');
$reporte->setCellValue('F1',  $date);




//Estilo del titulo
$spreadsheet->getActiveSheet()->mergeCells("A1:C1");
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight(30);

//Campos de la cabecera
$reporte->setCellValue('A2', 'ID');
$reporte->setCellValue('B2', 'nombre evento');
$reporte->setCellValue('C2', 'Descripcion');
$reporte->setCellValue('D2', 'Fecha');
$reporte->setCellValue('E2', 'Hora inicio');
$reporte->setCellValue('F2', 'Hora fin');

//Tamaño de las columnas 
$spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(27);
$spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(30);
$spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension("F")->setWidth(15);

$spreadsheet->getActiveSheet()->getStyle("A")->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle("B")->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle("C")->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle("D")->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle("E")->getAlignment()->setWrapText(true);
$spreadsheet->getActiveSheet()->getStyle("F")->getAlignment()->setWrapText(true);


//Estilo negrilla, tamaño de letra, y fila
$spreadsheet->getActiveSheet()->getStyle('A2:F2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A2:F2')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getRowDimension("2")->setRowHeight(30);

//Aplicamos nuestros colores del arreglo
$spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($tableStyle);
$spreadsheet->getActiveSheet()->getStyle('A2:F2')->applyFromArray($tableStyle);


$count = 3;
$Reporte = $reporteClases->reporteEvento();


if ($Reporte != null) {
    foreach ($Reporte as $rows) {
        $reporte->setCellValue('A' . $count, $rows['id_evento']);
        $reporte->setCellValue('B' . $count, $rows['nombre']);
        $reporte->setCellValue('C' . $count, $rows['descripcion']);
        $reporte->setCellValue('D' . $count, $rows['fecha']);
        $reporte->setCellValue('E' . $count, $rows['horainicio']);
        $reporte->setCellValue('F' . $count, $rows['horafin']);
        $count++;
    }
} else {
    $reporte->setCellValue('A4', "No hay registros en las fechas seleccionadas");
}

//autofilter
//define first row and last row
$firstRow = 2;
$lasRow = $count - 1;
$spreadsheet->getActiveSheet()->setAutoFilter("A" . $firstRow . ":F" . $lasRow);




header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Reporte-Eventos-' . $date . '.xls"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
exit();
