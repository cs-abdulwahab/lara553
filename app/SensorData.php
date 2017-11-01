<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{


    protected function device()
    {
        return $this->belongsTo(Device::class);
    }


}
