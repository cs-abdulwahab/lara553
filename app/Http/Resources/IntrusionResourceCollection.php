<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IntrusionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        //ResourceCollection::withoutWrapping();

/*
        return [
            'id' => $this->id,
            'alert' => $this->alert,
        ];*/


        return [
            'data' => $this->collection->transform(function($intrusion){
                return [
                    'id' => $intrusion->id,
                    'alert' => $intrusion->alert,

                ];
            }),
        ];


//        return parent::toArray($request);
    }
}
