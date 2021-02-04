<?php

namespace FiltrosDinamicos\Models;

class Person // extends Model
{
    protected $fillable = ['id', 'name', 'birthDate', 'status'];

    public static function convertFiltersToWhere(array $filters): array
    {
        $filtersToArray = [];

        if($filters['id']) $filtersToArray[] = ['id', '=', $filters['id']];
        if($filters['name']) $filtersToArray[] = ['name', 'like', "%{$filters['name']}%"];
        if($filters['birthDateFrom']) $filtersToArray[] = ['birthDateFrom', '>=', "DATE({$filters['birthDateFrom']})"];
        if($filters['birthDateTo']) $filtersToArray[] = ['birthDateTo', '<=', "DATE({$filters['birthDateTo']})"];

        if($filters['status'] && self::statusIsValid($filters['status'])) {
            $filtersToArray[] = ['status', '=', $filters['status']];
        }

        return $filtersToArray;
    }

    public static function statusIsValid(string $status) {
        if(!$status) return false;

        if(in_array($status, ['Active', 'Inactive'])) return true; 
    }

    public function getPersons(array $filters) {
        $whereArray = self::convertFiltersToWhere($filters);

        return Person::where($whereArray)->get();
    }
}
