<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $sensordata
 * @property mixed $user
 */
class Device extends Model
{

    protected $fillable = ['devicekey', 'name', 'status', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sensordata()
    {
        return $this->hasMany(SensorData::class);
    }

    public function currentTempnHumidity()
    {
        return optional($this->sensordata)->last();
    }


}
