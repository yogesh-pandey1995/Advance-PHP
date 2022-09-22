<?php

require_once("67 multiple_namespace.php");

$obj = new Product1\Name;         // Multipul Namespace
$obj->data();
$obj->value();

$obj = new Product2\Name;
$obj->data();
$obj->value();