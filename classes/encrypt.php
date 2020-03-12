<?php

class Encrypt 
{
    public function __contruct()
    {}

    public function GetEncrypt($list, $key)
    {
    $element = array();
    $length = count($list);
    for ($i = 0; $i < $length; $i++)
    {
        $x = $length - $key;
        if ($i < $x)
        {
            $element[$i] = $list[$i+$key];
            
        }
        
        if($i >= $x)
        {
            $element[$i] = $list[$i-$x];
        }
    }
    return $element;
    }
}
