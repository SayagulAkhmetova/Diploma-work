<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $name = $request->name;
        $description = $request->description;

        $rangeStart = $request->datesRange ? $request->datesRange[0] : '1900-01-01';
        $rangeEnd = $request->datesRange ? $request->datesRange[1] : '2200-01-01';

        $countMin = $request->downloadRange[0];
        $countMax = $request->downloadRange[1];


        $documents = Document::when($name, function ($query) use ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        })
            ->when($description, function ($query) use ($description) {
                $query->where('description', 'LIKE', '%' . $description . '%');
            })
            ->when($rangeStart, function ($query) use ($rangeStart, $rangeEnd) {
                $query->where('created_at', '>', $rangeStart . ' 00:00:00')
                    ->where('created_at', '<', $rangeEnd . ' 23:59:59');
            })
            ->when($countMin, function ($query) use ($countMin, $countMax) {
                $query->where('download_count', '>', $countMin)
                    ->where('download_count', '<', $countMax);
            })
            ->get();


        if (empty($request->name)) {
            $documents = [];
        }

        $data = [
            'documents' => $documents,
        ];

        return response()->json($data);
    }
}
