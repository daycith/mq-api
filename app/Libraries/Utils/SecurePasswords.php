<?php
namespace App\Libraries\Utils;


class SecurePasswords {

    static function minLenght(){
        return 8;
    }
    public static function passwordPattern(){
        return '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*['.self::allowedCharacters().']).*$/';
    }

    public static function passwordRule(){
        return 'required|min:'.self::minLenght().'|max:255|regex:' . self::passwordPattern();
    }

    public static function generatePassword($_len = 8) {

        if($_len < self::minLenght()){
            $_len = self::minLenght();
        }

        $_alphaSmall = 'abcdefghijklmnopqrstuvwxyz';            
        $_alphaCaps  = strtoupper($_alphaSmall);                
        $_numerics   = '1234567890';                            
        $_specialChars = self::allowedCharacters();

        $_container = $_alphaSmall.$_alphaCaps.$_numerics.$_specialChars;   
        $password = '';
        
        $randomNumberPosition = rand(0,$_len-1);
        $randomUpperPosition = rand(0,$_len-1);
        $randomCharacterPosition = rand(0,$_len-1);

        for($i = 0; $i < $_len; $i++) { 
            
            if($i == $randomNumberPosition){
                $_rand = rand(0, strlen($_numerics) - 1);                 
            }
            else if($i == $randomCharacterPosition){
                $_rand = rand(0, strlen($_specialChars) - 1);                 
            }
            else if($i == $randomUpperPosition){
                $_rand = rand(0, strlen($_alphaCaps) - 1);                 
            }
            else{
                $_rand = rand(0, strlen($_container) - 1);   
            }
   
            $password .= substr($_container, $_rand, 1);               
        }

        return $password;
    }

    public static function allowedCharacters(){
        return '$@$!%*#?&';
    }
}