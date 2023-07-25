<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regulation;
use App\Models\RegulationList;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class RegulationListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('regulation_lists')
                ->join('regulations', 'regulation_lists.regulation_id', '=', 'regulations.id')
                ->select('regulation_lists.id', 'regulations.category', 'regulation_lists.regulation_number', 'regulation_lists.regulation_about', 'regulation_lists.regulation_url')
                ->get();

            return DataTables::of($data)
                ->addColumn('aksi', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="edit btn bg-gradient-warning btn-sm" title="edit" data-toggle="modal" data-target="#modal-edit-regulation-list"><i class="fa fa-pencil-alt"></i></button>
                           &nbsp;
                           <button type="button" id="' . $data->id . '" class="delete btn bg-gradient-danger btn-sm" title="hapus" data-toggle="modal" data-target="#modal-delete-regulation-list"><i class="fa fa-trash"></i></button>';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
        }

        $items = Regulation::all();

        return view('pages.backend.regulation-list', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataRegulationList = new RegulationList();
        $dataRegulationList->regulation_id = $data['add_regulation_category'];
        $dataRegulationList->regulation_number = $data['add_regulation_number'];
        $dataRegulationList->regulation_about = $data['add_regulation_about'];
        $dataRegulationList->regulation_url = $data['add_regulation_url'];
        $dataRegulationList->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = RegulationList::find($id);

        return response()->json(['dataEdit' => $dataEdit]);
    }

    public function edit(Request $request, $id)
    {
        $data = RegulationList::find($id);

        $data->regulation_id = $request->input('edit_regulation_category');
        $data->regulation_number = $request->input('edit_regulation_number');
        $data->regulation_about = $request->input('edit_regulation_about');
        $data->regulation_url = $request->input('edit_regulation_url');
        $data->update();

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = RegulationList::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = RegulationList::find($id);
        $data->delete();

        return response()->json([]);
    }
}
