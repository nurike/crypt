<?php
require_once('classes\crypt.php');
$list = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$options = getopt("t:k:");
$text = preg_split('//u',$options['t'], NULL, PREG_SPLIT_NO_EMPTY);
$key = $options['k'];
$crt = new Crypt();
$result = $crt->CheckAndDecrypt($text, $list, $key);
foreach($result as $value)
{
    echo $value;
}
?>