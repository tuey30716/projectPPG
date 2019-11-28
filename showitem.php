<?php 

require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

function currentitem($tablenum)
{

    $inputFileName = './currentorder/table'.$tablenum[0].'.xlsx';
    $inputFileType = 'Xlsx';

    if(file_exists($inputFileName))
    {
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    
    $reader->setReadDataOnly(true);

    $worksheetData = $reader->listWorksheetInfo($inputFileName);

    foreach ($worksheetData as $worksheet) {

    $spreadsheet = $reader->load($inputFileName);

    $worksheet = $spreadsheet->getActiveSheet();
    $menu=$worksheet->toArray();
    //print_r($menu);
    echo "\n Current Item List\n";
    echo str_repeat("-",55)."\n";
    echo " ".$menu[0][0]."\t\t".$menu[0][1]."\t\t".$menu[0][2]."\t\t".$menu[0][3]."\n";
    }
    foreach($menu as $key=>$val){
        if($key>0)
        {
        foreach($val as $k=>$v){ 

            echo str_pad($v, 16, " ", STR_PAD_RIGHT);
 
           }
           echo "\n";
            }
        }
    }
    else
    {
        echo "\nThis Table is not exist!!!\n";
    }
}

?>