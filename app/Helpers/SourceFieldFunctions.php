<?php 
namespace App\Helpers;

class SourceFieldFunctions {
    private static $final = array();

    public static function recursive($data = [], $parent = "") {        
        //$return = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = self::recursive($value,$parent . $key . "/");
            } else {
                //$return[] = $parent . $key; 
                self::$final[] = $parent . $key; 
            }
        }
        //self::$final[] = $return;
        return  self::$final;
    }
}
?>