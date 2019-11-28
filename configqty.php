<?php 
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet; 

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
function configqty($configrow,$oldqty,$decqty)
{
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $inputFileName = './MEMENUNU.xlsx';
    $spreadsheet = $reader->load($inputFileName);
    $num_rows = $configrow;
    $newqty=$oldqty-$decqty;
    $spreadsheet->getActiveSheet()->setCellValue('D'.$num_rows,$newqty);


    foreach(range('A','D') as $columnID) {
        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);    
}
    $writer = new Xlsx($spreadsheet);
    $writer->save($inputFileName);
}

?>