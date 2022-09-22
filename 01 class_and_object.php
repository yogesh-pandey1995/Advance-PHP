<?php

// ###___CLASS___### //
class Emp_details
{
    ##----- Properties / Data_Member 
    public $emp_name;
    public $emp_department;

    ##----- Methods / Member_Function
    public function empName($name)
    {
        $this->emp_name = $name;
        echo "Employee Name is : $this->emp_name <br>";
    }
    public function empDepartment($department)
    {
        $this->emp_department = $department;
        echo "Employee Department is : $this->emp_department <br>";
    }
}

// ###___OBJECT___### //

$employee_1 = new Emp_details;
$employee_1->empName('Yogesh');
$employee_1->empDepartment('PHP');

$employee_2 = new Emp_details;
$employee_2->empName('Neeraj');
$employee_2->empDepartment('Android');


// $employee_1 = new Emp_details;
// $employee_1->emp_name= "yogesh";
// $employee_1->empName(); 