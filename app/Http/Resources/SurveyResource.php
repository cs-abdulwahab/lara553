<?php

namespace App\Http\Resources;

use App\Question;
use Illuminate\Http\Resources\Json\Resource;

class SurveyResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        // Resource::withoutWrapping();

        return [
            'id' => $this->id,
            'name' => $this->name,
            //'questions' => optional($this->questions()),

            // 'questions' => Question::collection($this->whenLoaded('questions')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }

    public function with($request)
    {
        return [

            'version'=>2,


        ];
    }


}
