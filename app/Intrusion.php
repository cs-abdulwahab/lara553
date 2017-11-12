<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intrusion extends Model
{
    protected $fillable = ['alert', 'device_id'];

}
