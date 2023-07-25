<?php

namespace App\Http\Controllers\Backend\PublicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnytimeInformation;
use App\Models\AnytimeInformationList;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AnytimeInformationListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('anytime_information')
                ->join('anytime_information_lists', 'anytime_information.id', '=', 'anytime_information_lists.parent_id')
                ->select('anytime_information_lists.id', 'anytime_information_lists.description', 'anytime_information.category', 'anytime_information_lists.url')
                ->get();

            return DataTables::of($data)
                ->addColumn('aksi', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="edit btn bg-gradient-warning btn-sm" title="edit" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil-alt"></i></button>
                           &nbsp;
                           <button type="button" id="' . $data->id . '" class="delete btn bg-gradient-danger btn-sm" title="hapus" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></button>';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
        }

        $items = AnytimeInformation::all();

        return view('pages.backend.public-information.anytime-information-list', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataInformation = new AnytimeInformationList();
        $dataInformation->parent_id = $data['add_category'];
        $dataInformation->description = $data['add_description'];
        $dataInformation->url = $data['add_url'];
        $dataInformation->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = AnytimeInformationList::find($id);

        return response()->json(['dataEdit' => $dataEdit]);
    }

    public function edit(Request $request, $id)
    {
        $data = AnytimeInformationList::find($id);

        $data->parent_id = $request->input('edit_category');
        $data->description = $request->input('edit_description');
        $data->url = $request->input('edit_url');
        $data->update();

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = AnytimeInformationList::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = AnytimeInformationList::find($id);
        $data->delete();

        return response()->json([]);
    }
}
