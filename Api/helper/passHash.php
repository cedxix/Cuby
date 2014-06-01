<?php
/**
 * PassHash class
 * 
 */
class PassHash
{

    private static $_algo = '$2a';
    
    private static $_cost = '$10';
    
    public static function uniqueSalt()
    {
        return substr(sha1(mt_rand()), 0, 22);
    }
    
    public static function hash($string)
    {
        return crypt($string,
                    self::$_algo .
                    self::$_cost .
                    '$' . self::uniqueSalt());
    }
    
    public static function checkHash($hash, $string)
    {
        $fullSalt = substr($hash, 0, 29);
        $newHash = crypt($string, $fullSalt);
        return ($hash == $newHash);
    }

    public static function generateRandomPass($length = 6)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
