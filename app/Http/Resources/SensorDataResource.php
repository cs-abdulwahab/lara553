<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SensorDataResource extends Resource
{
    /**
     * SensorDataResource constructor.
     */

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */


    public function toArray($request)
    {
        Resource::wrap(null);
        return parent::toArray($request);
    }
}
