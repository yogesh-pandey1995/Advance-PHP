<?php

class Stdnt
{
    private $name;
    public function stuName($x)
    {
        $this->name = $x;
        echo "Student Name is " . $this->name . "<br>";
    }
    
}
$data = new Stdnt;
$data->stuName("Yogesh");
