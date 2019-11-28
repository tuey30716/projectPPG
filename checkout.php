<?php 
require_once 'vendor/autoload.php';
require 'caldis.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;

function checkout($tablenum)
{
    $spreadsheet = new Spreadsheet();

    $inputFileType = 'Xlsx';

    $inputFileName = './currentorder/table'.$tablenum[0].'.xlsx';
    if(file_exists($inputFileName))
    {
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
        //print_r ($menu);
        
        echo "\n Check Out\n";
        echo str_repeat("-",72)."\n";
        $subtotal=0;
        foreach($menu as $key=>$val){
            if($key==0)
            {
                
                echo " ".$menu[0][0]."\t\t".$menu[0][1]."\t\t".$menu[0][2]."\t\t".$menu[0][3]."\t   Total Price\n";
            }
            else
            {
                    $price=$val[2]*$val[3];
            
            foreach($val as $k=>$v){
                if($val[2]!=$v){
                    echo str_pad($v, 16, " ", STR_PAD_RIGHT);
                }
                else
                {
                    echo str_pad(number_format($v, 2, '.', ','), 16, " ", STR_PAD_RIGHT);
                }
            }
            echo str_pad(number_format($price, 2, '.', ','), 6, " ", STR_PAD_LEFT);
            echo "\n";
            $subtotal+=$price;
            }
            
        }
        echo str_pad("Sub Total", 56, " ", STR_PAD_LEFT).str_pad(number_format($subtotal, 2, '.', ','), 14, " ", STR_PAD_LEFT)."\n";
        $discount=caldiscount($subtotal);
        echo str_pad("Discount", 55, " ", STR_PAD_LEFT).str_pad(number_format($discount, 2, '.', ','), 15, " ", STR_PAD_LEFT)."\n";
        $nettotal=$subtotal-$discount;
        echo str_pad("Net Total", 56, " ", STR_PAD_LEFT).str_pad(number_format($nettotal, 2, '.', ','), 14, " ", STR_PAD_LEFT)."\n\n";

        while(1)
        {
            echo "\t Input amount money : ";
            $money=trim(fgets(STDIN));
        if (is_numeric($money)&&$money>=$nettotal)
        {
            break;
        }
        else
        {
            echo "\n\t Error !!! Please Input Again.\n\n";
        }
        }
        $change=$money-$nettotal;
        echo "\t Change ".str_pad(":", 13, " ", STR_PAD_LEFT)." ".number_format($change, 2, '.', ',')."\n";
        
        echo "\n\t Thank you ".str_pad(":", 13, " ", STR_PAD_LEFT);
        unlink($inputFileName);
    }
    else
    {
            echo "\n\t   Invalid Table number!!!\n";
            echo "\tPlease make choose other table.\n";
            return 0;
    }
    
}
?>