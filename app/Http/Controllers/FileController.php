<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Exception, Log, Cache, View;
use App\Models\FileUpload;
use Illuminate\Support\Str;
class FileController extends Controller
{
    public function uploadFile(Request $request){
        try {
            $num = 0;
            return view('upload.file_upload', compact('num'));
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }

    public function storeFile(Request $request){
        try {
            $fileObject = $request->all();
            $rules = array(
                'file_upload' => 'required|mimes:pdf|max:2048'
            );
    
            $validator = Validator::make($fileObject,$rules);
            if($validator->fails()){
                return $validator->errors();
            }

            $fileName = $fileObject['file_upload']->getClientOriginalName();
            $uniqueFile = Str::random(10).'_'.strtolower(trim($fileName));
            $path = public_path().'/uploads';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $filePath = $fileObject['file_upload']->storeAs('uploads', $uniqueFile, 'public');
            $status = FileUpload::create([
                'file_name'=>$uniqueFile
            ]);
            return response()->json(['code'=>200, 'success' => 'File uploaded successfully']);
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }

    public function showFile(Request $request, $file_name, $num){
        try {
            if(empty($file_name) || empty($file_name)){
                return back()->with([
                    'message' =>'File Not Found !'
                ]); 
            }
            return view('upload.file_upload', compact('file_name','num'));
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }
}
