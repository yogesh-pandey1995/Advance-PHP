<?php

class Father{
    public function display(){
        echo "Method Overriding <br>";
    }
    final public function dis(){
        echo "You don't Override this Method <br>";
    }
}
class Son extends Father{
    public function display(){
        echo "Override Method <br>";
    }
    public function dis(){
        echo "don't Override<br>";
    }
}
$obj = new Son;
$obj-> display();
$obj-> dis();
