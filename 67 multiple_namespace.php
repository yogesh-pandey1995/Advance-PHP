<?php

namespace Product1 {
    abstract class Emp
    {
        function data()
        {
            echo "<b>Product1</b> Normal Method <br>";
        }
        abstract function value();
    }
    class Name extends Emp
    {
        function value()
        {
            echo "<b>Product1</b> Abstract Method <br>";
        }
    }
    // $obj = new Name;
    // $obj->data();
    // $obj->value();
}

namespace Product2 {
    abstract class Emp
    {
        function data()
        {
            echo "<b>Product2</b> Normal Method <br>";
        }
        abstract function value();
    }
    class Name extends Emp
    {
        function value()
        {
            echo "<b>Product2</b> Abstract Method <br>";
        }
    }
    // $obj = new \Product1\Name;         // Multipul Namespace
    // $obj->data();
    // $obj->value();
    // $obj = new Name;
    // $obj->data();
    // $obj->value();
}
