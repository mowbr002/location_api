<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UploadsController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
    }

    public function upload(Request $request){
		$data = new Data();
		$data->template = 'uploads.upload';
		$data->form_action = '/upload/file';

		return view($data->template, ['data'	=> $data]);
    }

	public function store(Request $request){
		$storage_dir_path = 'uploads/' . date("Y") . '/' . date("m");

        Storage::makeDirectory($storage_dir_path);

        //$file = $request->request->file;

		$file = request()->file('file');
		$upload = new Upload();

		$name = request()->file('file')->getClientOriginalName();
        $extn = request()->file('file')->getClientOriginalExtension();
        $mime = request()->file('file')->getMimeType();
        $size = request()->file('file')->getClientSize();

        $stored = $file->store($storage_dir_path);
//dd($request);
        //$saved = new Files;

        $upload->name        = $name;
        $upload->location    = $stored;
        $upload->mime        = $mime;
        $upload->extension   = $extn;
        $upload->size        = $size;
        $upload->uid         = Auth::user()->uid;

        $upload->save();

        return redirect('/');


	}
}
