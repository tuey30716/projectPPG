<?php 
function caldiscount($price)
{
    if($price>= 300)
    {
        return ($price*0.05);
    }
    elseif($price>= 500)
    {
        return ($price*0.10);
    }
    elseif($price>= 800)
    {
        return ($price*0.11);
    }
    else
    {
        return 0;
    }
}
?>