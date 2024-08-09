<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\announcement_model;
use App\Http\Services\announcementService;
use App\Http\Requests\announcementCreateRequest;
use App\Http\Requests\announcementUpdateRequest;

class announcementController extends Controller
{
    //dependency injection : announcementService
    protected $announcementService;
    public function __construct(announcementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    //取得所有資料
    public function getAllAnnouncements()
    {
        try{
            $result_announcement = announcement_model::with('category')->get();
            return $result_announcement;
            // return response()->json(['message' => 'Get announcement successfully', 'get result_announcement content'=> $result_announcement], 201);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    //查詢一筆資料
    public function getAnnouncementById(Request $request, string $id)
    {
        try{
            $result = announcement_model::with('category')->findOrFail($id); 

            $output = [
                'id' => $result->id,
                'announcement_title' => $result->announcement_title,
                'content' => $result->content,
                'attachment' => $result->attachment,
                'image' => $result->image,
                'stage' => $result->stage,
                'department' => $result->department,
                'publish_date' => $result->publish_date,
                'remove_date' => $result->remove_date,
                'created_at' => $result->created_at,
                'updated_at' => $result->updated_at,
                'announcement_category_id' => $result->category->category_name 
            ];
            return response()->json(['message' => 'Get announcement successfully', 'get content'=> $output], 201);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }
        
    }
    //新建一筆資料
    public function createAnnouncement(announcementCreateRequest $request)
    {
        //Request validation has been fracotied into app\http\request announcementCreateRequest.php
        try{
            //Extract input from request body for following file storaging and final data creating.
            // First, get the validated data form validator instance.
            $validatedData=[
                'announcement_title' => $request->announcement_title,
                'content' => $request->content,
                'attachment' => $request->attachment,
                'image' => $request->image,
                'stage' => $request->stage,
                'announcement_category_id' => $request->announcement_category_id,
                'department' => $request->department,
                'publish_date' => $request->publish_date,
                'remove_date' => $request->remove_date,
            ];
            //Storage the path into validated array from announcementService.
            if ($request->hasFile('attachment')) {
                $validatedData['attachment'] = $this->announcementService->fileUploadProcessing($request->file('attachment'), 'announcementAttachment');  
            }
            if ($request->hasFile('image')) {
                $validatedData['image'] = $this->announcementService->fileUploadProcessing($request->file('image'), 'announcementImage');        
            }

            $result = announcement_model::create($validatedData);
            return response()->json(['message' => 'Announcement created successfully', 'created content'=> $result], 201);
        }catch (\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    //更新一筆資料
    public function updateAnnouncement(announcementUpdateRequest $request, string $id)
    {
        try{
            $validatedData=[
                'announcement_title' => $request->announcement_title,
                'content' => $request->content,
                'attachment' => $request->attachment,
                'image' => $request->image,
                'stage' => $request->stage,
                'announcement_category_id' => $request->announcement_category_id,
                'department' => $request->department,
                'publish_date' => $request->publish_date,
                'remove_date' => $request->remove_date,
            ];
            //Storage the path into validated array from announcementService.
            if ($request->hasFile('attachment')) {
                $validatedData['attachment'] = $this->announcementService->fileUploadProcessing($request->file('attachment'), 'announcementAttachment');  
            }
            if ($request->hasFile('image')) {
                $validatedData['image'] = $this->announcementService->fileUploadProcessing($request->file('image'), 'announcementImage');        
            }
            //update
            announcement_model::where('id', $id)->update($validatedData); 
            $result = announcement_model::findOrFail($id);
            return response()->json(['message' => 'Announcement updated successfully','updated content'=> $result], 201);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    //刪除一筆資料
    public function deleteAnnouncement(Request $request, string $id)
    {
        try{
            // $announcement = announcement_model::where('id',$id)->delete();            
            $announcement = announcement_model::find($id);
            $announcement->delete(); 
            return response()->json(['message' => 'Announcement deleted successfully','deleted_announcement' => $announcement], 201);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
