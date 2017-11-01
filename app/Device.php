<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Device extends Model
{

    protected $fillable = ['devicekey', 'name', 'status', 'user_id'];




    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function sensordata()
    {
        return $this->hasMany(SensorData::class);
    }


}
