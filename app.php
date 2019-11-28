<?php 
require_once 'showerror.php';
require_once 'showitem.php';
require_once 'menuhelp.php';
require_once 'order.php';
require_once 'showfoodmenu.php';
require_once 'showpromotion.php';
require_once 'checkout.php';

$input = $_SERVER['argv'];

$optind = NULL;
$shortopts  = "hm::o:tc:p";
$longopts  = array('help','menu::','order:','item','checkout:','promotion');
$opts = getopt($shortopts, $longopts,$optind );
$args = array_slice($_SERVER['argv'], $optind); 
$checkerr=0;

//Help-------------------------------------------------------------
if(array_key_exists('help', $opts) || array_key_exists('h', $opts))
{
    if(count($args)>=1)
    {
        error($input[0]);
    }
    else
    {
    echohelp($input[0]);
    }
    $checkerr++;
}

//Menu-------------------------------------------------------------
if(array_key_exists('m', $opts) || array_key_exists('menu', $opts))
{
    if(count($args)>=1)
    {
        error($input[0]);
    }
    else
    {
    if(!isset($opts['menu']))
    {
        $opts['menu'] = $opts['m']; 
    }
    else
    {
        $opts['m'] = $opts['menu']; 
    }
    if($opts['m']=='F'||$opts['m']=='f')
    {
        showmenu('F');
    }
    elseif($opts['m']=='D'||$opts['m']=='d')
    {
        showmenu('D');
    }
    elseif($opts['m']=='I'||$opts['m']=='i')
    {
        showmenu('I');
    }
    elseif($opts['m']=='')
    {
        showmenu('');
    }
    else
    {
        error($input[0]);
    }

    }
    $checkerr++;
}

//Order-------------------------------------------------------------
if(array_key_exists('order', $opts) || array_key_exists('o', $opts))
{
    if(count($args)>=1)
    {
        if(!isset($opts['order']))
        {
            $opts['order'] = $opts['o']; 
        }
        else
        {
            $opts['o'] = $opts['order']; 
        }
    
        order($opts['o'],$args);
        
    }
    else
    {
        error($input[0]);
    }
    $checkerr++;
}

//Current Item------------------------------------------------------
if(array_key_exists('item', $opts) || array_key_exists('i', $opts))
{
    if(count($args)>=1)
    {
        if(!isset($opts['item']))
        {
            $opts['item'] = $opts['i']; 
        }
        else
        {
            $opts['i'] = $opts['item']; 
        }
        currentitem($args);
        
    }
    else
    {
        error($input[0]);
    }
    $checkerr++;
}

//Promotion---------------------------------------------------------
if(array_key_exists('promotion', $opts) || array_key_exists('p', $opts))
{
    if(count($args)>=1)
    {
        error($input[0]);
    }
    else
    {
    echopromotion();
    }
    $checkerr++;
}

//CheckOut----------------------------------------------------------
if(array_key_exists('checkout', $opts) || array_key_exists('c', $opts))
{
    if(count($args)>=1)
    {
        checkout($args);
        
    }
    else
    {
        error($input[0]);
    }
    $checkerr++;
}
if($checkerr==0){
    error($input[0]);
  
}

?>