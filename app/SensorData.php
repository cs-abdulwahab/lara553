<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{

    protected $fillable = ['temp','humidity','device_id','sensor_dt'];


    protected function device()
    {
        return $this->belongsTo(Device::class);
    }




}
