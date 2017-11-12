<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed sensor_dt
 */
class SensorData extends Model
{


    protected $fillable = ['temp', 'humidity', 'sensor_dt'];


    public function device()
    {
        return $this->belongsTo(Device::class);
    }


    /**
     * @return mixed
     */
    public function getSensorDt()
    {
        return Carbon::parse($this->sensor_dt);
    }

    /**
     * @param mixed $sensor_dt
     */
    public function setSensorDt($sensor_dt)
    {
        $this->sensor_dt = $sensor_dt;
    }


}
