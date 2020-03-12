<?php
require_once('classes\encrypt.php');
require_once('classes\decrypt.php');

class Crypt
{

    public function __contruct()
    {
        
    }

    public function CheckAndEncrypt($input, $list, $key)
    {
        $crt = new Encrypt();
        $result = array();
        $query = $crt->GetEncrypt($list, $key);

        foreach($input as $ikey=>$ivalue)
        {
            foreach($list as $key=>$value)
            {
                if($ivalue == $value)
                {
                    $result[$ikey] = $query[$key];
                } 
                
                if($ivalue == strtoupper($value)) {
                    $result[$ikey] = strtoupper($query[$key]);
                }

                if(preg_match('/^\d+[\.,]?\d*$/', $ivalue) != 0)
                {
                    $result[$ikey] = $input[$ikey];
                }
            }
        }
        
        return $result;
    }

    public function CheckAndDecrypt($input, $list, $key)
    {
        $dcrt = new Decrypt();
        $crt = new Encrypt();
        $result = array();
        $encrypt = $crt->GetEncrypt($list,$key);
        $decrypt = $dcrt->GetDecrypt($encrypt, $key);

        foreach($input as $ikey=>$ivalue)
        {
            foreach($encrypt as $key=>$value)
            {
                if($value == $ivalue)
                {
                    $result[$ikey] = $decrypt[$key];
                }

                if($ivalue == strtoupper($value)) 
                {
                    $result[$ikey] = strtoupper($decrypt[$key]);
                }

                if(preg_match('/^\d+[\.,]?\d*$/', $ivalue) != 0)
                {
                    $result[$ikey] = $input[$ikey];
                }
            }
        }

        return $result;
    }
}
?>