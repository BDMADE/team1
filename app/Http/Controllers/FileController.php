<?php

namespace App\Http\Controllers;

use App\User;
use App\Member;
use App\File;
use App\Extension;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller {

    public $file;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //$id = Auth::id();
        //$member = Member::find($id);
        //$files = $member->files;
        $files=File::all();
        return view('vendor/flatAdmin/allFiles', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('vendor/flatAdmin/addFile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function handleCreate() {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user_name = $user->name;
        $date = HelperController::convertCurrentTime();


        $file = Input::file('file');
        $extension = $file->getClientOriginalExtension(); // getting file extension
        $fileName = $file->getClientOriginalName();
        $path = '/files/' . $user_name . '/' . $date . '/' . $extension;

        $destinationPath = public_path().$path; // upload path



        $upload_success = $file->move($destinationPath, $fileName); // uploading file to given path

        if ($upload_success) {


            $file_name_from_db = HelperController::checkFileName($fileName);
            $file_path_from_db = HelperController::checkFilePath($path);

            if (($fileName != $file_name_from_db) && ($path != $file_path_from_db)) {
                /*
                 * file data is stored in database
                 * 
                 */
                $db_file = new File;
                $db_file->file_name = $fileName;
                $db_file->file_path = 'files/' . $user_name . '/' . $date . '/' . $extension;
                $db_file->save();

                $db_file->members()->attach($user_id);


                //check file extension from extension collection 


                $ext_from_db = HelperController::checkExtension($extension);

                if ($extension != $ext_from_db) {

                    $db_file_extension = new Extension;
                    $db_file_extension->file_extension = $extension;
                    $db_file_extension->save();
                    $db_file_extension->files()->attach($db_file);
                } elseif ($extension == $ext_from_db) {
                    //$old_extension=  Extension::where('file_extension','=',$extension)->first();
                    //$extension_id=$old_extension->id;

                    $ext_id = HelperController::getExtensionId($extension);
                    $db_file->extensions()->attach($ext_id);
                }
            }



            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }




        //echo $file;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function test() {
       //$files=File::find(4);
       //
       $files=File::all();
       foreach($files as $file){
       //echo $files->file_name;          
                  
       foreach ($file->members as $value) {
           echo $value->name;
       }
       
       foreach ($file->extensions as $value) {
           echo $value->id;
       }
      
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete() {
        //
    }

    public function handleDelete(Request $r) {
        
    }

   

}
