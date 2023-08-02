<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RegulationList;
use App\Models\AnytimeInformationList;
use App\Models\PeriodicInformationList;
use App\Models\ImmediatelyInformationList;
use App\Models\OtherInformationList;
use App\Models\Faq;

class DashboardController extends Controller
{
    public function index() 
    {
        $regulationTotal = RegulationList::count();

        $publicInformationTotal = AnytimeInformationList::count() + PeriodicInformationList::count() + ImmediatelyInformationList::count() + OtherInformationList::count();

        $faqTotal = Faq::count();

        // Public Information Chart
        $anytimeInformationListCount = AnytimeInformationList::select('id')->count();
        $periodicInformationListCount = PeriodicInformationList::select('id')->count();
        $immediatelyInformationListCount = ImmediatelyInformationList::select('id')->count();
        $otherInformationListCount = OtherInformationList::select('id')->count();

        $regulationChart = DB::table('regulations')
            ->join('regulation_lists','regulations.id', 'regulation_lists.regulation_id')
            ->select('regulations.category')
            ->selectRaw('COUNT(regulation_lists.id) AS regListTotal')
            ->groupBy('regulations.category')
            ->get();

        $anytimeInformationChart = DB::table('anytime_information')
            ->join('anytime_information_lists','anytime_information.id', 'anytime_information_lists.parent_id')
            ->select('anytime_information.category')
            ->selectRaw('COUNT(anytime_information_lists.id) AS informationListTotal')
            ->groupBy('anytime_information.category')
            ->get();

        $periodicInformationChart = DB::table('periodic_information')
            ->join('periodic_information_lists','periodic_information.id', 'periodic_information_lists.parent_id')
            ->select('periodic_information.category')
            ->selectRaw('COUNT(periodic_information_lists.id) AS informationListTotal')
            ->groupBy('periodic_information.category')
            ->get();

        $immediatelyInformationChart = DB::table('immediately_information')
            ->join('immediately_information_lists','immediately_information.id', 'immediately_information_lists.parent_id')
            ->select('immediately_information.category')
            ->selectRaw('COUNT(immediately_information_lists.id) AS informationListTotal')
            ->groupBy('immediately_information.category')
            ->get();

        $otherInformationChart = DB::table('other_information')
            ->join('other_information_lists','other_information.id', 'other_information_lists.parent_id')
            ->select('other_information.category')
            ->selectRaw('COUNT(other_information_lists.id) AS informationListTotal')
            ->groupBy('other_information.category')
            ->get();

        return view('pages.backend.dashboard', compact(
            'regulationTotal', 
            'publicInformationTotal', 
            'faqTotal', 
            'regulationChart',
            'anytimeInformationChart',
            'periodicInformationChart',
            'immediatelyInformationChart',
            'otherInformationChart',
            'anytimeInformationListCount',
            'periodicInformationListCount',
            'immediatelyInformationListCount',
            'otherInformationListCount',
        ));
    }
}
