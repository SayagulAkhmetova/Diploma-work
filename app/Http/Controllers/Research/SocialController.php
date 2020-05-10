<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResearchSocialResource;
use App\ResearchSocial;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function show($id)
    {
        return new ResearchSocialResource(ResearchSocial::find($id));
    }


    public function update(Request $request, $id)
    {
        $success = false;

        if (ResearchSocial::find($id)->update($request->all())) {
            $success = true;
        }

        return response()->json(['success' => $success]);
    }
}
