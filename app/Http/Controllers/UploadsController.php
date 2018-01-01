<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Upload;

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
		dd($request);
	}
}
