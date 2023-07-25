<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.backend.profile');
    }

    public function showProfiles()
    {
        $dataProfile = Profile::all();

        return response()->json(["dataProfile" => $dataProfile]);
    }

    public function read($id)
    {
        $data = Profile::where('id', $id)->first();

        return response()->json(["data" => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $dataProfile = new Profile();
        $dataProfile->title = $data['add_title'];
        $dataProfile->description = nl2br($data['add_description']);
        if ($request->add_img) {
            $image = $data['add_img'];
            $image_name = date('YmdHis') . ' - ' . $data['add_title'] . '.' . $image->extension();

            $img = Image::make($image->path());

            $img->save(public_path('uploaded-images/') . $image_name, 80);

            $dataProfile->img = $image_name;
        }
        $dataProfile->save();

        return response()->json([]);
    }

    public function modalEdit($id)
    {
        $dataEdit = Profile::where('id', $id)->first();

        return response()->json(['dataEdit' => $dataEdit]);
    }

    public function edit(Request $request, $id)
    {
        $data = Profile::find($id);

        $data->title = $request->input('edit_title');
        $data->description = nl2br($request->input('edit_description'));

        if ($request->hasFile('edit_img')) {
            $path = public_path('uploaded-images/') . $data->img;
            if (File::exists($path)) {
                File::delete($path);
            }

            //save image
            $img = $request->file('edit_img');
            $img_name = $request->input('edit_title') . ' - ' . date('YmdHis') . '.' . $img->extension();

            $img = Image::make($img->path());

            $img->save(public_path('uploaded-images/') . $img_name, 80);

            $data->img = $img_name;
        }

        $data->update();

        return response()->json([]);
    }

    public function modalDelete($id)
    {
        $dataDelete = Profile::where('id', $id)->first();

        return response()->json(["dataDelete" => $dataDelete]);
    }

    public function delete($id)
    {
        $data = Profile::find($id);
        $data->delete();

        return response()->json([]);
    }
}
