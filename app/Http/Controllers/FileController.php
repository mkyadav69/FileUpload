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
            # View File
            $num = 0;
            return view('upload.file_upload', compact('num'));
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }

    public function storeFile(Request $request){
        try {
            # Validation
            $fileObject = $request->all();
            $rules = array(
                'file_upload' => 'required|mimes:pdf|max:2000'
            );
            $customeMesage =  [
                'file_upload.max' => 'File size limit excedeed.',
            ];
    
            $validator = Validator::make($fileObject, $rules, $customeMesage);
            if($validator->fails()){
                return $validator->errors()->first();
            }

            # File Store
            $fileName = $fileObject['file_upload']->getClientOriginalName();
            $uniqueFile = Str::random(10).'_'.strtolower(trim($fileName));
            $path = public_path('uploads');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $fileObject['file_upload']->move($path, $uniqueFile);

            # File Save
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
            # URL Check
            if(empty($file_name) || empty($file_name)){
                return back()->with([
                    'message' =>'File Not Found !'
                ]); 
            }
            # Path Return
            $path = asset('uploads/'.$file_name);
            return view('upload.file_upload', compact('file_name','num', 'path'));
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }
}
