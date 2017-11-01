<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table='teachers';

    protected $fillable = ['name', 'email', 'designation', 'status'];


    public function cars()
    {

        return $this->hasMany(Car::class , 'teacher_id');

    }


}
