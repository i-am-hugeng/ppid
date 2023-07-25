<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Contact;
use App\Models\Regulation;
use App\Models\RegulationList;
use App\Models\Faq;
use App\Models\PiService;
use App\Models\ParentPiList;
use App\Models\PiList;
use App\Models\AnytimeInformation;
use App\Models\AnytimeInformationList;
use App\Models\PeriodicInformation;
use App\Models\PeriodicInformationList;
use App\Models\ImmediatelyInformation;
use App\Models\ImmediatelyInformationList;
use App\Models\OtherInformation;
use App\Models\OtherInformationList;

class FrontendController extends Controller
{
    public function index()
    {
        $profileContents = Profile::all();
        $contactContents = Contact::all();
        $regulationContents = Regulation::all();
        $piServiceContents = PiService::all();
        $faqContents = Faq::all();
        $anytimeInformationContents = AnytimeInformation::all();
        $periodicInformationContents = PeriodicInformation::all();
        $immediatelyInformationContents = ImmediatelyInformation::all();
        $otherInformationContents = OtherInformation::all();


        return view('layouts.frontend', compact(
            'profileContents',
            'faqContents',
            'contactContents',
            'regulationContents',
            'piServiceContents',
            'anytimeInformationContents',
            'periodicInformationContents',
            'immediatelyInformationContents',
            'otherInformationContents',
        ));
    }

    public function modalRegulationList($id)
    {
        $category = Regulation::where('id', $id)->first();

        $regulation = RegulationList::where('regulation_id', $id)->get();

        return response()->json([
            "category" => $category,
            "regulation" => $regulation,
        ]);
    }

    public function modalAnytimeInformationList($id)
    {
        $category = AnytimeInformation::where('id', $id)->first();

        $items = AnytimeInformationList::where('parent_id', $id)->get();

        return response()->json([
            "category" => $category,
            "items" => $items,
        ]);
    }

    public function modalPeriodicInformationList($id)
    {
        $category = PeriodicInformation::where('id', $id)->first();

        $items = PeriodicInformationList::where('parent_id', $id)->get();

        return response()->json([
            "category" => $category,
            "items" => $items,
        ]);
    }

    public function modalImmediatelyInformationList($id)
    {
        $category = ImmediatelyInformation::where('id', $id)->first();

        $items = ImmediatelyInformationList::where('parent_id', $id)->get();

        return response()->json([
            "category" => $category,
            "items" => $items,
        ]);
    }

    public function modalOtherInformationList($id)
    {
        $category = OtherInformation::where('id', $id)->first();

        $items = OtherInformationList::where('parent_id', $id)->get();

        return response()->json([
            "category" => $category,
            "items" => $items,
        ]);
    }
}
