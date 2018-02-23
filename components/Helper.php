<?php 
namespace app\components;

class Helper {
	
    public static function makePassword($password)
    {
        $tempPass = md5(trim($password));
        $finalPass = sha1($tempPass.substr($tempPass, 4,10));
        return $finalPass;
    }

    public static function makeTokenUjian($initial)
    {
    	return sha1($initial);
    }
}
 ?>