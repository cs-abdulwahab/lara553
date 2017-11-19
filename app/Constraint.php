<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Constraint extends Model
{

    protected $fillable = ['name', 'min', 'max'];
    public $timestamps = false;

    public function device()
    {
        return $this->belongsTo(Device::class);
    }


}
