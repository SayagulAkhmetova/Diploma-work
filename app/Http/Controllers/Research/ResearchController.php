<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResearchResearchResource;
use App\ResearchResearch;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function show($id)
    {
        return new ResearchResearchResource(ResearchResearch::find($id));
    }

    public function update(Request $request, $id)
    {
        $success = false;

        if (ResearchResearch::find($id)->update($request->all())) {
            $success = true;
        }

        return response()->json(['success' => $success]);
    }
}
