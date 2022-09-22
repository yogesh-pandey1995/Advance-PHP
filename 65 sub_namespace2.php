<?php

namespace State\Haryana {
    class Value                                             // Parent Class
    {
        public $num1;
        public $num2;

        public function Values($a, $b)
        {
            $this->num1 = $a;
            $this->num2 = $b;
        }
    }
    class Add extends Value                                 // Child-One Class
    {
        public function Addition()
        {
            echo "value of \$num1 is : $this->num1 <br>";
            echo "value of \$num2 is : $this->num2 <br>";
            echo "Sum of \$num1 and \$num2 is : ";
            echo $this->num1 + $this->num2  . "<br>";
        }
    }

    class Multi extends Value
    {
        public function Multiply($val1, $val2)
        {
            $this->num1 = $val1;
            $this->num2 = $val2;
            echo "Value of \$num1 is : $this->num1 <br>";
            echo "Value of \$num2 is : $this->num2 <br>";
            echo "Multiply of \$num1 and \$num2 is : ";
            echo $this->num1 * $this->num2  . "<br>";
        }
    }

    // $value_1 = new Add;
    // $value_2 = new Multi;

    // $value_1->Values(10, 15);
    // $value_1->Addition();
    // $value_2->Multiply(5, 6);
}
