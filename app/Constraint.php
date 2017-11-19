<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Constraint extends Model
{

    protected $fillable = ['name', 'min', 'max'];


    public function device()
    {
        return $this->belongsTo(Device::class);
    }


}
