<?php

// Default Constructor
class Fruit
{
    public function __construct()
    {
        echo "Hello Constructor <br>";
    }
}
$apple = new Fruit;


// Parameterized Constructor
class Student
{
    public $stu_roll_no;
    public $usty_roll_no;

    public function __construct($colz_roll_no, $unisty_roll_no)
    {
        $this->stu_roll_no = $colz_roll_no;
        $this->usty_roll_no = $unisty_roll_no;
        echo "Student College Roll no is : $this->stu_roll_no and University Roll no is : $this->usty_roll_no <br>";
    }
    // Destructor
    public function __destruct()
    {
        echo "<strong>End Of This Program(OBJECT TRASHED)</strong>";
    }
}
$stu_no = new Student(55, 145);
