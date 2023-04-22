<?php

class Validator{
    //method naming : string
    public static function string($value , $min = 1 , $max = INF ){
        //remove the white space
        $value = trim($value);

        //return the false or true condition
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}