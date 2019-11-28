<?php 

function echopromotion()
{
    echo "\nPromotion: Date-".date("Y/m/d")."\n\n";
    
    echo "\t Discount ".str_pad("5%", 4, " ", STR_PAD_LEFT)." for Total Price >= 300 baht.\n";
    echo "\t Discount ".str_pad("10%", 4, " ", STR_PAD_LEFT)." for Total Price >= 500 baht.\n";
    echo "\t Discount ".str_pad("15%", 4, " ", STR_PAD_LEFT)." for Total Price >= 800 baht.\n";
    
}

?>