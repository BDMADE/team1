<?php namespace App\Http\Controllers;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class HelperController extends Controller{
    
    
    public static function explodeDate($date){
        
        $explode_date=  explode('-', $date);
        $explode_date=$explode_date[0].$explode_date[1].$explode_date[2];
        
        return $explode_date;
    }
    
     public static function convertCurrentTime(){
        
        $date=date('d-m-y');
        $PresentDate=HelperController::explodeDate($date);
        return $PresentDate;
        
        
    }
    
    
    
    //check extension of file for unique file extenstion
    
     public static function checkExtension($data) {
       
        $var = \App\Extension::where('file_extenstion','=',$data)->first();

        if ($var) {
            $var = $var->file_extenstion;
            return $var;
        }
    }
    
    //find out the extension id of file
    public static function getExtensionId($data) {
       
        $var = \App\Extension::where('file_extenstion','=',$data)->first();

        if ($var) {
            $var = $var->id;
            return $var;
        }
    }
    
    
    //check file name in database
    public static function checkFileName($data) {
       
        $var = \App\File::where('file_name','=',$data)->first();

        if ($var) {
            $var = $var->file_name;
            return $var;
        }
    }
    
    //check file path in database
    public static function checkFilePath($data) {
       
        $var = \App\File::where('file_path','=',$data)->first();

        if ($var) {
            $var = $var->file_path;
            return $var;
        }
    }
    
    
    
}

