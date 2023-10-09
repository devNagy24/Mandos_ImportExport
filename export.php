<?php
//require 'vendor/autoload.php';
//
//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//
//session_start();
//
//// Check if there is data to export
//if (!isset($_SESSION['players_data'])) {
//    echo "No data available to export.";
//    exit;
//}
//
//// Create a new Spreadsheet
//$spreadsheet = new Spreadsheet();
//$sheet = $spreadsheet->getActiveSheet();
//
//// Retrieve the data from session
//$data = $_SESSION['players_data'];
//
//// Fill the spreadsheet with data
//foreach ($data as $rowIndex => $row) {
//    $colIndex = 1; // Initialize column index
//    foreach ($row as $cellValue) {
//        $sheet->setCellValueByColumnAndRow($colIndex, $rowIndex + 1, $cellValue);
//        $colIndex++; // Increment column index
//    }
//}
//
//// Set headers to trigger download of xlsx file
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Disposition: attachment;filename="players_data.xlsx"');
//header('Cache-Control: max-age=0');
//
//// Write the spreadsheet to a file and output it to the browser
//$writer = new Xlsx($spreadsheet);
//$writer->save('php://output');
//exit;


require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

session_start();

if (!isset($_SESSION['players_data'])) {
    echo "No data available to export.";
    exit;
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$data = $_SESSION['players_data'];

// Define the style for the header row
$headerStyle = [
    'font' => [
        'bold' => true,
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'argb' => 'FFD9D9D9', // Light gray fill
        ],
    ],
    'borders' => [
        'bottom' => [
            'borderStyle' => Border::BORDER_THIN,
        ],
    ],
];

// Assuming headers are in the first row of $data array
$headers = array_shift($data);
$colIndex = 1;

// Write headers
foreach ($headers as $header) {
    $sheet->setCellValueByColumnAndRow($colIndex, 1, $header);
    $colIndex++;
}

// Apply header style
$sheet->getStyle('A1:' . chr(64 + $colIndex) . '1')->applyFromArray($headerStyle);

// Write data
foreach ($data as $rowIndex => $row) {
    $colIndex = 1;
    foreach ($row as $cellValue) {
        $sheet->setCellValueByColumnAndRow($colIndex, $rowIndex + 2, $cellValue); // +2 because data starts from row 2
        $colIndex++;
    }
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="players_data.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
