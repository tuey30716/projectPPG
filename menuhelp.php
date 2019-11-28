<?php
function echohelp($input)
{
    echo "\nUsage: ".$input." [options] [--] tablenumber\n";
    echo "\nOptions:\n -m|--menu = foodType \t\tlist show menu.\n";
    echo "\t\t\t\t 'F' for Meat.\n";
    echo "\t\t\t\t 'D' for Drink.\n";
    echo "\t\t\t\t 'I' for Ice Cream.\n";
    echo " -o|--order = foodId\t\torder food. \n";
    echo " -t|--item  \t\t\tshow current order list.\n";
    echo " -p|--promotion \t\tshow promotion.  \n";
    echo " -c|--checkout \t\t\tcheck out. \n";
    echo " -h|--help\t\t\tprint this manual.\n";
    echo "\nArguments:\n";
    echo " Table number \t\t\tinput when use Option= \n";
    echo "\t\t\t\t  -o,--order\n";
    echo "\t\t\t\t  -t,--item\n";
    echo "\t\t\t\t  -c,--check out\n";
}

?>