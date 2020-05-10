<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\ResearchAdditional;
use App\ResearchEducation;
use App\ResearchResearch;
use App\ResearchSocial;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->userId);
        $reports = $user->researchEducations;

        $reports = $reports->map(function($research) {
            return [
                'id' => $research->user_id,
                'reportId' => $research->id,
                'year' => $research->year,
            ];
        });

        return response()->json($reports) ;
    }

    public function store(Request $request)
    {
        $user = User::find($request->userId);
        $reportId = $user->researchAdditionals()->create(['year' => $request->year])->id;
        $user->researchResearchs()->create(['year' => $request->year]);
        $user->researchEducations()->create(['year' => $request->year]);
        $user->researchSocials()->create(['year' => $request->year]);

        return response()->json(['success' => true, 'reportId' => $reportId]);
    }

    public function delete($id)
    {
        ResearchAdditional::find($id)->delete();
        ResearchResearch::find($id)->delete();
        ResearchEducation::find($id)->delete();
        ResearchSocial::find($id)->delete();

        return response()->json(['success' => true]);
    }
}
