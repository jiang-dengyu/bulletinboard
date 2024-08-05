<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\announcement_model;

class announcementController extends Controller
{
    public function getAllAnnouncements()
    {
        return announcement_model::all();
    }

    public function getAnnouncementById(Request $request, string $id)
    {
        $result = announcement_model::where('id',$id)->get(); 

        // $result = announcement_model::findOrFail($id);
        return response()->json(['message' => 'Get announcement successfully', 'get content'=> $result], 201);
    }

    public function createAnnouncement(Request $request)
    {
        $validatedData = $request->validate([
            'announcement_title' => 'required|string|max:255',
            'content' => 'required|string', 
            'attachment' => 'nullable|string|max:255', 
            'image' => 'nullable|string|max:255', 
            'stage' => 'required|boolean',
            'announcement_category_id' => 'required|integer',
            'department_id' => 'required|integer|',
            'publish_date' => 'required|date|before_or_equal:remove_date',
            'remove_date' => 'required|date|after:publish_date',
        ]);

        $result = announcement_model::create($validatedData);
        return response()->json(['message' => 'Announcement created successfully', 'created content'=> $result], 201);
    }

    public function updateAnnouncement(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'announcement_title' => 'required|string|max:255',
            'content' => 'required|string', 
            'attachment' => 'nullable|string|max:255', 
            'image' => 'nullable|string|max:255', 
            'stage' => 'required|boolean',
            'announcement_category_id' => 'required|integer',
            'department_id' => 'required|integer|',
            'publish_date' => 'required|date|before_or_equal:remove_date',
            'remove_date' => 'required|date|after:publish_date',
        ]);
        announcement_model::where('id', $id)->update($validatedData); 

        $result = announcement_model::findOrFail($id);
        return response()->json(['message' => 'Announcement updated successfully','updated content'=> $result], 201);
    }

    public function deleteAnnouncement(Request $request, string $id)
    {
        announcement_model::where('id',$id)->delete(); 

        // $result = announcement_model::findOrFail($id);
        return response()->json(['message' => 'Announcement deleted successfully'], 201);
    }


}
