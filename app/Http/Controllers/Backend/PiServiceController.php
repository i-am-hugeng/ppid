<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PiService;

class PiServiceController extends Controller
{
    public function index()
    {
        return view('pages.backend.public-information-service');
    }
    public function showPiServices()
    {
        $dataPiService = PiService::all();

        return response()->json(["dataPiService" => $dataPiService]);
    }

    public function read($id)
    {
        $data = PiService::where('id', $id)->first();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataPiService = new PiService();
        $dataPiService->title = $data['add_title'];
        $dataPiService->description = nl2br($data['add_description']);
        $dataPiService->url = $data['add_url'];
        $dataPiService->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = PiService::where('id', $id)->first();

        return response()->json(['dataEdit' => $dataEdit]);
    }

    public function edit(Request $request, $id)
    {
        $data = PiService::find($id);

        $data->title = $request->input('edit_title');
        $data->description = $request->input('edit_description');
        $data->url = $request->input('edit_url');
        $data->update();

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = PiService::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = PiService::find($id);
        $data->delete();

        return response()->json([]);
    }
}
