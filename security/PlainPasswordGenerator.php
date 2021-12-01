<?php 
require_once __DIR__ . "/IPasswordGenerator.php";

class PlainPasswordGenerator implements IPasswordGenerator{

    public static function encrypt(string $plainPassword): string
    {
        return $plainPassword;
    }
    public static function passwordVerify($password, $hash): bool
    {
        return ($password == $hash);
    }
}