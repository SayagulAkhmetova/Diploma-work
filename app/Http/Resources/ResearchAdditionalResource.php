<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResearchAdditionalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'one' => [
                'one_type' => $this->one_type,
                'one_country' => $this->one_country,
                'one_event' => $this->one_event,
                'one_position' => $this->one_position,
                'one_date' => $this->one_date,
                'one_execution' => $this->one_execution,
            ],
            'two' => [
                'two_type' => $this->two_type,
                'two_country' => $this->two_country,
                'two_event' => $this->two_event,
                'two_position' => $this->two_position,
                'two_date' => $this->two_date,
                'two_execution' => $this->two_execution,
            ],
            'three' => [
                'three_type' => $this->three_type,
                'three_place' => $this->three_place,
                'three_aim' => $this->three_aim,
                'three_funding' => $this->three_funding,
                'three_execution' => $this->three_execution,
            ]
        ];
    }
}
