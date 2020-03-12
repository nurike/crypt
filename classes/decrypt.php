<?php
class Decrypt 
{
    public function __contruct()
    {}

    public function GetDecrypt($list, $key)
    {
    $element = array();
    $length = count($list);
    
    for ($i = 0; $i < $length; $i++)
    {
        $x = $length - $key;
        if ($i < $x)
        {
            if($i >= $key)
            {
                $element[$i] = $list[$i-$key];
            }
        }
        
        if($i >= $x)
        {
            $element[$i] = $list[$i-$key];
            $element[$i-$x] = $list[$i];
        }
    }
    return $element;
    }
}
?>