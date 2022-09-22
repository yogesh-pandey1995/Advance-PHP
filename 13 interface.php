<?php

// Simple Interface ----------------------------------------------------------------------1
interface GrandFather
{
    const gfname = "Chander Mani";
    public function display0();
}

interface Father
{
    const fname = "Girish";
    public function display1();
    public function blankValue();   // Point 1
}

// Extends Interface Extends---------------------------------------------------------------2
interface Mother extends Father
{
    const mname = "sunita";
    public function display2();
}

// More Than One Interface Extends---------------------------------------------------------3
interface Son extends Father, Mother
{
    const sname = "yogesh";
    public function display3();
}

// Interface Declared Inside Class---------------------------------------------------------4
class Names implements Father
{
    public $value;
    public function display1()
    {
        echo "Father Name Is <b>" . Father::fname . "</b><br>";
        echo $this->value . "<br>";
    }
    public function blankValue() {} // Point 1
}
$obj = new Names;
$obj->value = "101";
$obj->display1();

// More Than One Interface Declared Inside Class-------------------------------------------5
class Second implements GrandFather, Father
{
    public function display0()
    {
        echo "GrandFather Name Is <b>" . GrandFather::gfname . "</b><br>";
        echo "Father Name Is <b>" . Father::fname . "</b><br>";
    }
    public function display1(){}
    public function blankValue(){}
}
$obj1 = new Second;
$obj1->display0();

// Multi Inheritance using Interface-------------------------------------------------------6

class Emp{
	public $name = "Yogesh";
}
interface ID{
	const id = 01;
    function data();
}
class Data_file extends Emp implements ID{
	function data(){
    	echo "Employee Name is <b>" .$this->name . "</b><br>";
    	echo "Employee ID is <b>" . ID::id ."</b>";
    }
}
$obj= new Data_file;
$obj->data();
?>
