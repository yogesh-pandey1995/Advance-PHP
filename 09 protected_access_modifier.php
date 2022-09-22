<?php

class Student
{
    protected $name;

    public function stuName()
    {
        echo "Student Name is " . $this->name . "<br>";
    }
}
class Roll_no extends Student
{
    protected $roll_no;
}
class Values extends Roll_no
{
    public function stuValue($x, $y)
    {
        $this->name = $x;
        $this->roll_no = $y;
        $this->stuName($x);
        echo "Student Roll No is : $this->roll_no";
    }
}

$data = new Values;
$data->stuValue("Yogesh", 10);
