<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\rewriteFormRequestFailValidation;

class announcementUpdateRequest extends rewriteFormRequestFailValidation
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'announcement_title' => 'required|string|max:255',
            'content' => 'required|string', 
            'attachment' => 'nullable|file', 
            'image' => 'nullable|image', 
            'stage' => 'required|boolean',
            'announcement_category_id' => 'required|integer',
            'department' => 'required|string|max:255',
            'publish_date' => 'required|date|before_or_equal:remove_date',
            'remove_date' => 'required|date|after:publish_date',
        ];
    }
    public function messages()
    {
        return [
            'announcement_title.string' => '【標題】需為字串',
            'announcement_title.required' => '【標題】需為必填',
            'content.string' => '【內容】需為字串',
            'content.required' => '【內容】需為必填',
            'attachment.string' => '【附件】需為字串',
            'image.string' => '【圖片】需為字串',
            'stage.required' => '【狀態】需為必填',
            'stage.boolean' => '【狀態】需為布林值',
            'announcement_category_id.required' => '【分類】需為必填',
            'announcement_category_id.integer' => '【分類】需為整數',
            'department.required' => '【單位】需為必填',
            'department.string' => '【單位】需為字串',
            'publish_date.date' => '【發布日】需為日期',
            'publish_date.required' => '【發布日】需為必填',
            'publish_date.before_or_equal:remove_date' => '【發布日】需在預定移除日期之前',
            'remove_date.date' => '【預定移除日】需為日期',
            'remove_date.required' => '【預定移除日】需為必填',
            'remove_date.after:publish_date' => '【預定移除日】需在發布日期之後',  
        ];
    }
}
