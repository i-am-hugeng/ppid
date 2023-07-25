<?php

namespace App\Http\Controllers\Backend\MasterData\PublicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImmediatelyInformation;

class ImmediatelyInformationController extends Controller
{
    public function index()
    {
        return view('pages.backend.master-data.public-information-category.Immediately-information');
    }

    public function showImmediatelyInformation()
    {
        $data = ImmediatelyInformation::all();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataInformation = new ImmediatelyInformation();
        $dataInformation->category = $data['add_immediately_information'];
        $dataInformation->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = ImmediatelyInformation::where('id', $id)->first();

        return response()->json(["dataEdit" => $dataEdit]);
    }

    public function edit(Request $request)
    {
        $data = $request->all();

        ImmediatelyInformation::where('id', $data['edit_immediately_information_id'])->update(['category' => $data['edit_immediately_information']]);

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = ImmediatelyInformation::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = ImmediatelyInformation::find($id);
        $data->delete();

        return response()->json([]);
    }
}
