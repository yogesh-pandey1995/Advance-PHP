<?php

class Student
{
    public $name;
    public $roll_no;
    public function stuName()
    {
        echo "Student Name is " . $this->name . "<br>";
    }
}
class Roll_no extends Student
{
    public function stuRoll($x, $y)
    {
        $this->name = $x;
        $this->roll_no = $y;
        $this->stuName($x);
        echo "Student Roll No is : $this->roll_no";
    }
}

$data = new Roll_no;
$data->stuRoll("Yogesh", 10);

