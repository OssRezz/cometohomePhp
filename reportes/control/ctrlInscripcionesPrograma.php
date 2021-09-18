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

$reporte->setTitle('Inscripciones por programa');


//Posicion del titulo
$reporte->setCellValue('A1', 'Inscripciones por programa');
$reporte->setCellValue('C1', 'Fecha de reporte: ');
$reporte->setCellValue('D1',  $date);




//Estilo del titulo
$spreadsheet->getActiveSheet()->mergeCells("A1:B1");
$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight(30);

//Campos de la cabecera
$reporte->setCellValue('A2', 'Programa');
$reporte->setCellValue('B2', 'numero de inscrpciones');



//Tamaño de las columnas 
$spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(50);
$spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(27);
$spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(15);



//Estilo negrilla, tamaño de letra, y fila
$spreadsheet->getActiveSheet()->getStyle('A2:D2')->getFont()->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A2:D2')->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getRowDimension("2")->setRowHeight(30);

//Aplicamos nuestros colores del arreglo
$spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($tableStyle);
$spreadsheet->getActiveSheet()->getStyle('A2:D2')->applyFromArray($tableStyle);


$count = 3;
$Reporte = $reporteClases->incripcionesPorPrograma();


if ($Reporte != null) {
    foreach ($Reporte as $rows) {
        $reporte->setCellValue('A' . $count, $rows['programa']);
        $reporte->setCellValue('B' . $count, $rows['numInscripciones']);
        $count++;
    }
} else {
    $reporte->setCellValue('A4', "No hay registros en las fechas seleccionadas");
}

//autofilter
//define first row and last row
$firstRow = 2;
$lasRow = $count - 1;
$spreadsheet->getActiveSheet()->setAutoFilter("A" . $firstRow . ":B" . $lasRow);




header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="inscripciones-Programa-' . $date . '.xls"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
exit();
