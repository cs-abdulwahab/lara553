<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $teacher
 */
class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = ['registeration','teacher_id'];

    // protected $touches = ['teacher'];

    public function Teacher()
    {


        // var_dump($this);
        //var_dump($this->belongsTo(Teacher::class, 'teacher_id' , 'id'));


        return $this->belongsTo(Teacher::class);
    }
}
