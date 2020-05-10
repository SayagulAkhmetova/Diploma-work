<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResearchEducationResource;
use App\ResearchEducation;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function show($id)
    {
        return new ResearchEducationResource(ResearchEducation::find($id));
    }


    public function update(Request $request, $id)
    {
        $success = false;

        if (ResearchEducation::find($id)->update($request->all())) {
            $success = true;
        }

        return response()->json(['success' => $success]);
    }
}

