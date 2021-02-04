<?php

use FiltrosDinamicos\Models\Person;

require_once "vendor/autoload.php";

$filters = [
    "id" => '1',
    "name" => 'Jose',
    "birthDateFrom" => '2001-10-01',
    "birthDateTo" => '2020-10-01',
    "status" => 'Active'
];

$filtersArray = Person::convertFiltersToWhere($filters);

var_dump($filtersArray);