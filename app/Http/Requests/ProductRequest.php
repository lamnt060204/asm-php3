<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name"=>"required|string|max:255",
            "price"=>"required|integer|min:1",
            "quantity"=>"required|integer|min:1",
            "category_id" =>"required|exists:categories,id",
            // "image" => "image|max:10000|mimes:jpg,png",
        ];
    }
    public function messages() {
        return [
        "name.required" => "Tên không được bỏ trống",
        "name.string" => "Tên phải là chuỗi ký tự",
        "name.max" => "Tên không quá 255 ký tự",
        "category_id.required" => "Vui lòng chọn danh mục.",
        "category_id.exists" => "Danh mục không hợp lệ.",
        "price.required" => "Giá không được bỏ trống",
        "price.integer" => "Giá phải là số",
        "price.min" => "Giá phải trên 1",

        ];
    }
}
