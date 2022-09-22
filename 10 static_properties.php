<?php

## Static Properties
class Data{
    public static $a;

    function name(){
        echo Self::$a . "<br>";
    }
    // function name($x){
    //     echo Self::$a = $x;
    // }
}
Data:: $a= "YogeshPandey";
$obj = new Data;
$obj->name();
//$obj->name("Yogesh");

## Static Mathed

class Values{
    // static function data(){
    //     echo "Hello Yogesh Pandey";
    // }
    static function data($num){
        echo "Hello Yogesh Pandey" . $num;
    }
}
// Values::data();
Values::data(10);