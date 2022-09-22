<?php

abstract class Emp
{
    function data()
    {
        echo "Normal Method <br>";
    }
    abstract function value();
}
class Name extends Emp
{
    function value()
    {
        echo "Abstract Method <br>";
    }
}

$obj = new Name;
$obj->data();
$obj->value();
