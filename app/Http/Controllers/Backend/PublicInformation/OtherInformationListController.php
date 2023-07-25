<?php

namespace App\Http\Controllers\Backend\PublicInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherInformation;
use App\Models\OtherInformationList;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class OtherInformationListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('other_information')
                ->join('other_information_lists', 'other_information.id', '=', 'other_information_lists.parent_id')
                ->select('other_information_lists.id', 'other_information_lists.description', 'other_information.category', 'other_information_lists.url')
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

        $items = OtherInformation::all();

        return view('pages.backend.public-information.other-information-list', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataInformation = new OtherInformationList();
        $dataInformation->parent_id = $data['add_category'];
        $dataInformation->description = $data['add_description'];
        $dataInformation->url = $data['add_url'];
        $dataInformation->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = OtherInformationList::find($id);

        return response()->json(['dataEdit' => $dataEdit]);
    }

    public function edit(Request $request, $id)
    {
        $data = OtherInformationList::find($id);

        $data->parent_id = $request->input('edit_category');
        $data->description = $request->input('edit_description');
        $data->url = $request->input('edit_url');
        $data->update();

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = OtherInformationList::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = OtherInformationList::find($id);
        $data->delete();

        return response()->json([]);
    }
}
