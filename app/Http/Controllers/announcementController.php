<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\announcement_model;

class announcementController extends Controller
{
    //取得所有資料
    public function getAllAnnouncements()
    {
        try{
            $result_announcement = announcement_model::with('category')->get();
            
            return response()->json(['message' => 'Get announcement successfully', 'get result_announcement content'=> $result_announcement], 201);
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
    public function createAnnouncement(Request $request)
    {
        $validatedData = $request->validate([
            'announcement_title' => 'required|string|max:255',
            'content' => 'required|string', 
            'attachment' => 'nullable|string|max:255', 
            'image' => 'nullable|string|max:255', 
            'stage' => 'required|boolean',
            'announcement_category_id' => 'required|integer',
            'department' => 'required|string|max:255',
            'publish_date' => 'required|date|before_or_equal:remove_date',
            'remove_date' => 'required|date|after:publish_date',
        ]);

        try{
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
    public function updateAnnouncement(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'announcement_title' => 'required|string|max:255',
            'content' => 'required|string', 
            'attachment' => 'nullable|string|max:255', 
            'image' => 'nullable|string|max:255', 
            'stage' => 'required|boolean',
            'announcement_category_id' => 'required|integer',
            'department' => 'required|string|max:255',
            'publish_date' => 'required|date|before_or_equal:remove_date',
            'remove_date' => 'required|date|after:publish_date',
        ]);

        try{
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
            announcement_model::where('id',$id)->delete(); 
            return response()->json(['message' => 'Announcement deleted successfully'], 201);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
