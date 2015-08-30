<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Inbox;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HelperController extends Controller {
    
    //get the last portion of the url //it has to be changed
    public static function getPage() {

        $page_id = substr($_SERVER["REQUEST_URI"], strrpos($_SERVER["REQUEST_URI"], "/") + 1);
        return urldecode($page_id);
    }
    
    
    /*
     * explode the date ;e.g: 14-08-2015 will be converted to 14082015 
     *      
     */

    public static function explodeDate($date) {

        $explode_date = explode('-', $date);
        $explode_date = $explode_date[0] . $explode_date[1] . $explode_date[2];

        return $explode_date;
    }

    /*
     * explode the file name and file's extension and retrieve only file name ;
     * 
     * e.g: filename.txt will show only filename after using this function
     *
     */

    public static function explodefile($data) {

        $explode_file = explode('.', $data);
        //$explode_data=$explode_file[0];

        return $explode_file[0];
    }

    //it will convert current date(22-09-2015) to like as 22092015
    public static function convertCurrentTime() {

        $date = date('d-m-y');
        $PresentDate = HelperController::explodeDate($date);
        return $PresentDate;
    }

    //check extension of file for unique file extenstion

    public static function checkExtension($data) {

        $var = \App\Extension::where('file_extenstion', '=', $data)->first();

        if ($var) {
            $var = $var->file_extenstion;
            return $var;
        }
    }

    //find out the extension id of file
    public static function getExtensionId($data) {

        $var = \App\Extension::where('file_extenstion', '=', $data)->first();

        if ($var) {
            $var = $var->id;
            return $var;
        }
    }

    //check file name in database
    public static function checkFileName($data) {

        $var = \App\File::where('file_name', '=', $data)->first();

        if ($var) {
            $var = $var->file_name;
            return $var;
        }
    }

    //check file path in database
    public static function checkFilePath($data) {

        $var = \App\File::where('file_path', '=', $data)->first();

        if ($var) {
            $var = $var->file_path;
            return $var;
        }
    }

    //convert time with a.m /p.m e.g:24-08-2015 3:51:10 to 24 Aug 2015 03:51 AM 
    
    
    public static function convertTimeWithAMPM($data) {
 
        
                
            $time= date_format($data,'d M Y h:i A');
           
            return $time;  
        }
    
       
        
        
    
    
    

}
