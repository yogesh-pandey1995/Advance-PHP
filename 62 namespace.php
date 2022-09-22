<?php

namespace Myfile {
    ### Class & Object
    class Emp_details
    {
        ##----- Properties / Data_Member 
        public $emp_name;
        public $emp_department;

        ##----- Methods / Member_Function
        public function empName($name, $department)
        {
            $this->emp_name = $name;
            echo "Employee Name is : $this->emp_name <br>";
            $this->emp_department = $department;
            echo "Employee Department is : $this->emp_department <br>";
        }
    }
    ### Construct
    class Fruit
    {
        public function __construct()
        {
            echo "Hello Constructor <br>";
        }
    }
    ### Inheritance With Constructor
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
    // ### Class & Object
    // $employee_1 = new Emp_details;
    // $employee_1->empName('Yogesh', 'PHP');
    // ### Construct
    // $apple = new Fruit;
    // ### Inheritance With Constructor
    // $skul = new Cls("Yogesh", "Pandey");
}
