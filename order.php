<?php
require_once 'vendor/autoload.php';
require_once 'readmenu.php';
require_once 'configqty.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function order($fid,$tablenum)
{   
    while(1)
    {
        echo "\nPlease Input qty: ";
        $qty=trim(fgets(STDIN));
    if (is_numeric($qty))
    {
        break;
    }
    else
    {
        echo "\nError !!! Please Input Again.\n";
    }

    }
    $inputFileName = './currentorder/table'.$tablenum[0].'.xlsx';
    $menu=readmenu();
    //GET INPUT INFO
    foreach($menu as $key=>$val){
            if(in_array($fid, $val))
            {
                $getrows= $key+1;
                $input[0]=$val[0];
                $input[1]=$val[1];
                $input[2]=$val[2];
                $input[3]=$qty;
                $oldqty=$val[3];
                $break;
            }            
    }
    // Creates New Spreadsheet 
    $spreadsheet = new Spreadsheet(); 
    
    if(!file_exists($inputFileName)&&$oldqty>=$input[3])
    {
    $spreadsheet->getActiveSheet()->setCellValue('A1', 'ID')
    ->setCellValue('B1', 'Menu')
    ->setCellValue('C1', 'Price')
    ->setCellValue('D1', 'Qty');
    $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();
    // cell value
    
    $spreadsheet->getActiveSheet()->fromArray($input, null, 'A2');
    foreach(range('A','D') as $columnID) {
        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);    
    }
        $writer = new Xlsx($spreadsheet);
        $writer->save($inputFileName);
    }
    elseif(file_exists($inputFileName)&&$oldqty>=$input[3])
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($inputFileName);
        $num_rows = $spreadsheet->getActiveSheet()->getHighestRow();
        $num_rows++;
        $spreadsheet->getActiveSheet()->insertNewRowBefore($num_rows+1, 1);
        $spreadsheet->getActiveSheet()->fromArray($input, null, 'A'.$num_rows);
        foreach(range('A','D') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);    
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($inputFileName);
    }
    elseif($oldqty<$input[3])
    {
            echo "\n\t   Invalid Quantity!!!\n";
            echo "\tPlease make an order again.\n";
            return 0;
    }

    
    configqty($getrows,$oldqty,$input[3]);
    
    
}