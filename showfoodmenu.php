<?php
require_once 'vendor/autoload.php';
require_once 'readmenu.php';

function showmenu($option)
{
    $menu=readmenu();
    //print_r($menu);
    echo "\n Menu\n";
    echo str_repeat("-",55)."\n";
echo " ".$menu[0][0]."\t\t".$menu[0][1]."\t\t".$menu[0][2]."\t\t".$menu[0][3]."\n";
if($option=="")
{

    foreach($menu as $key=>$val){
        if($key>0)
        {
        foreach($val as $k=>$v){
            if($val[2]!=$v){
                echo str_pad($v, 16, " ", STR_PAD_RIGHT);
            }
            else
            {
                echo str_pad(number_format($v, 2, '.', ','), 16, " ", STR_PAD_RIGHT);
            }
           }
           echo "\n";
        }
    }
    }

elseif($option=="F")
{
    foreach($menu as $key=>$val){
        if($key>0)
        {
        foreach($val as $k=>$v){
           
            if(preg_match('/F/', $val[0])==1)
            {
                if($val[2]!=$v){
                    echo str_pad($v, 16, " ", STR_PAD_RIGHT);
                }
                else
                {
                    echo str_pad(number_format($v, 2, '.', ','), 16, " ", STR_PAD_RIGHT);
                }
            }
            else
            {
            break;
            }
            
           }
           if(preg_match('/F/', $val[0])==1)
           {
           echo "\n";
            }
        }
    }
}
elseif($option=="D")
{
    foreach($menu as $key=>$val){
        if($key>0)
        {
        foreach($val as $k=>$v){
           
            if(preg_match('/D/', $val[0])==1)
            {
                if($val[2]!=$v){
                    echo str_pad($v, 16, " ", STR_PAD_RIGHT);
                }
                else
                {
                    echo str_pad(number_format($v, 2, '.', ','), 16, " ", STR_PAD_RIGHT);
                }
            }
            else
            {
            break;
            }
            
           }
           if(preg_match('/D/', $val[0])==1)
           {
           echo "\n";
            }
        }
    }   }
elseif($option=="I")
{
    foreach($menu as $key=>$val){
        if($key>0)
        {
        foreach($val as $k=>$v){
           
            if(preg_match('/I/', $val[0])==1)
            {
                if($val[2]!=$v){
                    echo str_pad($v, 16, " ", STR_PAD_RIGHT);
                }
                else
                {
                    echo str_pad(number_format($v, 2, '.', ','), 16, " ", STR_PAD_RIGHT);
                }
            }
            else
            {
            break;
            }
            
           }
           if(preg_match('/I/', $val[0])==1)
           {
           echo "\n";
            }
        }
    }
}
}
    




