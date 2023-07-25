<?php

namespace App\Http\Controllers\Backend\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regulation;

class RegulationController extends Controller
{
    public function index()
    {
        return view('pages.backend.master-data.regulation');
    }

    public function showRegulations()
    {
        $data = Regulation::all();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataRegulation = new Regulation();
        $dataRegulation->category = $data['add_regulation'];
        $dataRegulation->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = Regulation::where('id', $id)->first();

        return response()->json(["dataEdit" => $dataEdit]);
    }

    public function edit(Request $request)
    {
        $data = $request->all();

        Regulation::where('id', $data['edit_regulation_id'])->update(['category' => $data['edit_regulation']]);

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = Regulation::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = Regulation::find($id);
        $data->delete();

        return response()->json([]);
    }
}
