<?php
require_once("64 sub_namespace1.php");
require_once("65 sub_namespace2.php");

$id_01 = new State\Punjab\Department;
$id_01->setId(01);
$id_01->setName("Yogesh Pandey");
$id_01->setDepartment("PHP");

$value_1 = new State\haryana\Add;
$value_2 = new State\haryana\Multi;

$value_1->Values(10, 15);
$value_1->Addition();
$value_2->Multiply(5, 6);
