<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $sensordata
 * @property mixed $user
 * @property mixed status
 */
class Device extends Model
{


    protected $fillable = ['devicekey', 'name', 'status', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * is Active  [ inactive , lost , inprocess ]
     * @return bool
     */
    public function isActive()
    {
        if ($this->status === 'active') {
            return true;
        }
        return false;
    }

    /**
     * There are two types of devices  sensor and non sensor
     * @return bool
     */
    public function isSensor()
    {
        if ($this->devicetype() == 0) {
            return true;
        }
        return false;
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
