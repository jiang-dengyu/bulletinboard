<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class announcementService
{
    public function fileUploadProcessing( $paramA, $paramB=null )
    {
        //get the string of uploaded filename and extension
        $getParamAName = pathinfo( $paramA->getClientOriginalName(),PATHINFO_FILENAME);
        $getParamAExtesion = pathinfo($paramA->getClientOriginalName(),PATHINFO_EXTENSION);
        //Concatenate variable above with Carbon date for new imagename and imagepath
        $newParamAName = $getParamAName . Carbon::now('Asia/Taipei')->format('_YmdHis') . '.' . $getParamAExtesion;
        $newParamAPath = $paramB . Carbon::now('Asia/Taipei')->format('/Y/m/d');

        //Storage into storage\app\public\announcementInage director
        Storage::disk('public')->putFileAs($newParamAPath, $paramA, $newParamAName);
        //Concatenate a new path string for storage into database 
        return  $newParamAPath.'/'.$newParamAName ;
    
    }
}
