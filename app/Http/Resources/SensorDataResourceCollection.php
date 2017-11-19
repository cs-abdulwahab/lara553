<?php

namespace App\Http\Resources;

use App\SensorData;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SensorDataResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        ResourceCollection::withoutWrapping();

        return

            // TODO :   SensorData $sensorData   should be injected   so that   $sensordata->device()->getId()  could be called

            $this->collection->transform(function ($sensordata) {

                return [
                    'id' => $sensordata->id,
                    'temp' => $sensordata->temp,
                    'humidity' => $sensordata->humidity,
                    'sensor_dt' => $sensordata->getSensorDt()->diffForHumans(),
                    'created_at' => Carbon::parse($sensordata->created_at)->toDateTimeString(),
                    'updated_at' => Carbon::parse($sensordata->updated_at)->toDateTimeString(),
                    'deviceid' => $sensordata->device_id,
                ];
            });

        // return parent::toArray($request);
    }
}
