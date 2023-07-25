<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.backend.contact');
    }

    public function showContacts()
    {
        $dataContact = Contact::all();

        return response()->json(["dataContact" => $dataContact]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataContact = new Contact();
        $dataContact->title = $data['add_title'];
        $dataContact->description = nl2br($data['add_description']);
        $dataContact->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = Contact::where('id', $id)->first();

        return response()->json(['dataEdit' => $dataEdit]);
    }

    public function edit(Request $request, $id)
    {
        $data = Contact::find($id);

        $data->title = $request->input('edit_title');
        $data->description = nl2br($request->input('edit_description'));
        $data->update();

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = Contact::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = Contact::find($id);
        $data->delete();

        return response()->json([]);
    }
}
