<?php

namespace App\Http\Controllers\Backend\MasterData\PublicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PeriodicInformation;

class PeriodicInformationController extends Controller
{
    public function index()
    {
        return view('pages.backend.master-data.public-information-category.periodic-information');
    }

    public function showPeriodicInformation()
    {
        $data = PeriodicInformation::all();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataInformation = new PeriodicInformation();
        $dataInformation->category = $data['add_periodic_information'];
        $dataInformation->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = PeriodicInformation::where('id', $id)->first();

        return response()->json(["dataEdit" => $dataEdit]);
    }

    public function edit(Request $request)
    {
        $data = $request->all();

        PeriodicInformation::where('id', $data['edit_periodic_information_id'])->update(['category' => $data['edit_periodic_information']]);

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = PeriodicInformation::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = PeriodicInformation::find($id);
        $data->delete();

        return response()->json([]);
    }
}
