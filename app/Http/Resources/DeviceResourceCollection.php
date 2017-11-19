<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DeviceResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        // ResourceCollection::withoutWrapping();
        // return parent::toArray($request);

        // 'sensor_dt' => $device->currentTempnHumidity()->getSensorDt()->diffForHumans(),

        ResourceCollection::withoutWrapping();
        return
            $this->collection->transform(function ($device) {

                $sensordata = $device->currentTempnHumidity();
                $sarray = null;
                if ($sensordata != null) {
                    $sarray = [
                        'id' => $sensordata->id,
                        'temp' => $sensordata->temp,
                        'humidity' => $sensordata->humidity,
                        'sensor_dt' => $sensordata->getSensorDt()->diffForHumans()
                    ];
                }

                return [
                    'id' => $device->id,
                    'status' => $device->status,
                    'name' => $device->name,
                    'user_id' => $device->user_id,
                    'devicekey' => $device->devicekey,

                    'temp_n_humidity' => $sarray,

                    'metadata' => $sensordata,

                ];
            });

    }
}
