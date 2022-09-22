<?php

class Student
{
    public $val1;
    public function __construct($x)
    {
        echo "Hello Student Constructor ";
        echo "<b>" . $this->val1 = $x . "</b>";
    }
}

class Cls extends Student
{
    public $val2;
    public function __construct($x, $y)
    {
        parent::__construct($x);
        echo "<br>Hello Class Constructor ";
        echo "<b>" . $this->val2 = $y . "</b>";
    }
}

$skul = new Cls("Yogesh", "Pandey");
