<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    protected $fillable = ['name', 'startdatetime', 'enddatetime'];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }


}
