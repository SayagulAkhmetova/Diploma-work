<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResearchAdditionalResource;
use App\ResearchAdditional;
use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function show($id)
    {
        return new ResearchAdditionalResource(ResearchAdditional::find($id));
    }


    public function update(Request $request, $id)
    {
        $success = false;

        if (ResearchAdditional::find($id)->update($request->all())) {
            $success = true;
        }

        return response()->json(['success' => $success]);
    }
}
