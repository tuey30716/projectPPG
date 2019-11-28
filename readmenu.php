<?php 

require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
function readmenu()
{
    $spreadsheet = new Spreadsheet();

    $inputFileType = 'Xlsx';

        $inputFileName = './MEMENUNU.xlsx';

    /**  Create a new Reader of the type defined in $inputFileType  **/
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    /**  Advise the Reader that we only want to load cell data  **/
    $reader->setReadDataOnly(true);

    $worksheetData = $reader->listWorksheetInfo($inputFileName);

    foreach ($worksheetData as $worksheet) {

    $sheetName = $worksheet['worksheetName'];
    /**  Load $inputFileName to a Spreadsheet Object  **/
    $reader->setLoadSheetsOnly($sheetName);
    $spreadsheet = $reader->load($inputFileName);

    $worksheet = $spreadsheet->getActiveSheet();
    $menu=$worksheet->toArray();
    
    }
    return $menu;
}
?>