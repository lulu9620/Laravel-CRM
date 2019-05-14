<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded =[];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function addEmployee($employee)
    {
        $this->employees()->create($employee);
    }
}
