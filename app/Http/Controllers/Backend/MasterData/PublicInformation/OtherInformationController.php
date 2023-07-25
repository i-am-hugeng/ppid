<?php

namespace App\Http\Controllers\Backend\MasterData\PublicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherInformation;

class OtherInformationController extends Controller
{
    public function index()
    {
        return view('pages.backend.master-data.public-information-category.other-information');
    }

    public function showOtherInformation()
    {
        $data = OtherInformation::all();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataInformation = new OtherInformation();
        $dataInformation->category = $data['add_other_information'];
        $dataInformation->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = OtherInformation::where('id', $id)->first();

        return response()->json(["dataEdit" => $dataEdit]);
    }

    public function edit(Request $request)
    {
        $data = $request->all();

        OtherInformation::where('id', $data['edit_other_information_id'])->update(['category' => $data['edit_other_information']]);

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = OtherInformation::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = OtherInformation::find($id);
        $data->delete();

        return response()->json([]);
    }
}
