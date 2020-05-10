<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResearchSocialResource extends JsonResource
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
                'one_position' => $this->one_position,
                'one_execution' => $this->one_execution,
            ],
            'two' => [
                'two_type' => $this->two_type,
                'two_position' => $this->two_position,
                'two_execution' => $this->two_execution,
            ],
            'three' => [
                'three_title' => $this->three_title,
                'three_author' => $this->three_author,
                'three_institution' => $this->three_institution,
                'three_execution' => $this->three_execution,
            ],
            'four' => [
                'four_type' => $this->four_type,
                'four_result' => $this->four_result,
                'four_place' => $this->four_place,
            ],
            'five' => [
                'five_type' => $this->five_type,
                'five_result' => $this->five_result,
                'five_place' => $this->five_place,
            ],
        ];
    }
}
