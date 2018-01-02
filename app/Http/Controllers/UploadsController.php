<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

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

        //$file = request()->file('file');

		$file = request()->file('file');
		$upload = new Upload();
//dd($file);
		/*$name = request()->file('file')->getClientOriginalName();
        $extn = request()->file('file')->getClientOriginalExtension();
        $mime = request()->file('file')->getMimeType();
        $size = request()->file('file')->getClientSize();*/

        //$stored = $file->store($storage_dir_path);
dd($request);
        $saved = new Files;

        $saved->name        = $name;
        $saved->location    = $stored;
        $saved->mime        = $mime;
        $saved->extension   = $extn;
        $saved->size        = $size;
        $saved->uid         = $request->user()->id;

        $saved->save();

        return redirect('user/uploads/' . $request->user()->id);


	}
}
