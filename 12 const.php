<?php

class Student
{
    public const stuMark = 67;
    public function mark()
    {
        echo "Student Mark : " . self::stuMark . "<br>";
    }
}
$obj =  new Student;
$obj->mark();

echo Student::stuMark;
