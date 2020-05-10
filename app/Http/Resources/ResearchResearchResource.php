<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResearchResearchResource extends JsonResource
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
                'one' => [
                    'one_one_title' => $this->one_one_title,
                    'one_one_type' => $this->one_one_type,
                    'one_one_language' => $this->one_one_language,
                    'one_one_data' => $this->one_one_data,
                    'one_one_date' => $this->one_one_date,
                    'one_one_execution' => $this->one_one_execution,
                ],
//                'two' => [
//                    'one_one_title' => $this->one_two_title,
//                    'one_one_type' => $this->one_two_type,
//                    'one_one_language' => $this->one_two_language,
//                    'one_one_data' => $this->one_two_data,
//                    'one_one_date' => $this->one_two_date,
//                    'one_one_execution' => $this->one_two_execution,
//                ],
//                'three' => [
//                    'one_one_title' => $this->one_three_title,
//                    'one_one_type' => $this->one_three_type,
//                    'one_one_language' => $this->one_three_language,
//                    'one_one_data' => $this->one_three_data,
//                    'one_one_date' => $this->one_three_date,
//                    'one_one_execution' => $this->one_three_execution,
//                ],
            ],
            'two' => [
                'two_type' => $this->two_type,
                'two_title' => $this->two_title,
                'two_number' => $this->two_number,
                'two_coauthor' => $this->two_coauthor,
                'two_date' => $this->two_date,
                'two_execution' => $this->two_execution,
            ],
            'three' => [
                'three_title' => $this->three_title,
                'three_language' => $this->three_language,
                'three_data' => $this->three_data,
                'three_date' => $this->three_date,
                'three_execution' => $this->three_execution,
            ],
            'four' => [
                'four_university' => $this->four_university,
                'four_country' => $this->four_country,
                'four_title' => $this->four_title,
                'four_date' => $this->four_date,
                'four_execution' => $this->four_execution,
            ],
            'five' => [
                'five_direction' => $this->five_direction,
                'five_title' => $this->five_title,
                'five_position' => $this->five_position,
                'five_funding' => $this->five_funding,
                'five_budget' => $this->five_budget,
                'five_date' => $this->five_date,
                'five_execution' => $this->five_execution,
            ],
            'six' => [
                'six_name' => $this->six_name,
                'six_course' => $this->six_course,
                'six_type' => $this->six_type,
                'six_date' => $this->six_date,
                'six_city' => $this->six_city,
                'six_result' => $this->six_result,
                'six_execution' => $this->six_execution,
            ],
            'seven' => [
                'seven_name' => $this->seven_name,
                'seven_date' => $this->seven_date,
                'seven_place' => $this->seven_place,
                'seven_execution' => $this->seven_execution,
            ],
            'eight' => [
                'one' => [
                    'eight_one_title' => $this->eight_one_title,
                    'eight_one_place' => $this->eight_one_place,
                    'eight_one_form' => $this->eight_one_form,
                    'eight_one_execution' => $this->eight_one_execution,
                ],
//                'two' => [
//                    'eight_one_title' => $this->eight_two_title,
//                    'eight_one_place' => $this->eight_two_place,
//                    'eight_one_form' => $this->eight_two_form,
//                    'eight_one_execution' => $this->eight_two_execution,
//                ]
            ]
        ];
    }
}
