<?php

namespace App\Http\Controllers\Backend\MasterData\PublicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnytimeInformation;

class AnytimeInformationController extends Controller
{
    public function index()
    {
        return view('pages.backend.master-data.public-information-category.anytime-information');
    }

    public function showAnytimeInformation()
    {
        $data = AnytimeInformation::all();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataRegulation = new AnytimeInformation();
        $dataRegulation->category = $data['add_anytime_information'];
        $dataRegulation->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = AnytimeInformation::where('id', $id)->first();

        return response()->json(["dataEdit" => $dataEdit]);
    }

    public function edit(Request $request)
    {
        $data = $request->all();

        AnytimeInformation::where('id', $data['edit_anytime_information_id'])->update(['category' => $data['edit_anytime_information']]);

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = AnytimeInformation::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = AnytimeInformation::find($id);
        $data->delete();

        return response()->json([]);
    }
}
