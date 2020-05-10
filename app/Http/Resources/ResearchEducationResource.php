<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResearchEducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'one' => [
                'one_title' => $this->one_title,
                'one_number' => $this->one_number,
                'one_language' => $this->one_language,
                'one_date' => $this->one_date,
                'one_execution' => $this->one_execution,
            ],
            'two' => [
                'two_type' => $this->two_type,
                'two_title' => $this->two_title,
                'two_size' => $this->two_size,
                'two_deadline' => $this->two_deadline,
                'two_coauthor' => $this->two_coauthor,
                'two_publishing' => $this->two_publishing,
                'two_execution' => $this->two_execution,
            ],
            'three' => [
                'three_type' => $this->three_type,
                'three_aim' => $this->three_aim,
                'three_period' => $this->three_period,
                'three_execution' => $this->three_execution,
            ],
            'four' => [
                'four_title' => $this->four_title,
                'four_type' => $this->four_type,
                'four_topic' => $this->four_topic,
                'four_group' => $this->four_group,
                'four_date' => $this->four_date,
                'four_execution' => $this->four_execution,
            ],
            'five' => [
                'five_name' => $this->five_name,
                'five_title' => $this->five_title,
                'five_topic' => $this->five_topic,
                'five_date' => $this->five_date,
                'five_assessment' => $this->five_assessment,
                'five_execution' => $this->five_execution,
            ],
        ];
    }
}
