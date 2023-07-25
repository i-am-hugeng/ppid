<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('faqs')
                ->select('id', 'question')
                ->selectRaw('REPLACE(answer, "<br />", "") AS answer')
                ->get();

            return DataTables::of($data)
                ->addColumn('aksi', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="read btn bg-gradient-info btn-sm" title="lihat" data-toggle="modal" data-target="#modal-read-faq"><i class="fa fa-eye"></i></button>
                           &nbsp;
                           <button type="button" id="' . $data->id . '" class="edit btn bg-gradient-warning btn-sm" title="edit" data-toggle="modal" data-target="#modal-edit-faq"><i class="fa fa-pencil-alt"></i></button>
                           &nbsp;
                           <button type="button" id="' . $data->id . '" class="delete btn bg-gradient-danger btn-sm" title="hapus" data-toggle="modal" data-target="#modal-delete-faq"><i class="fa fa-trash"></i></button>';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.backend.faq');
    }

    public function read($id)
    {
        $data = Faq::where('id', $id)->first();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $dataFaq = new Faq();
        $dataFaq->question = nl2br($data['add_question']);
        $dataFaq->answer = nl2br($data['add_answer']);
        $dataFaq->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = Faq::where('id', $id)->first();

        return response()->json(['dataEdit' => $dataEdit]);
    }

    public function edit(Request $request, $id)
    {
        $data = Faq::find($id);

        $data->question = nl2br($request->input('edit_question'));
        $data->answer = nl2br($request->input('edit_answer'));
        $data->update();

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = Faq::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = Faq::find($id);
        $data->delete();

        return response()->json([]);
    }
}
