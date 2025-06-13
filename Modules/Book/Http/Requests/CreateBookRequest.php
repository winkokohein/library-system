<?php

namespace Modules\Book\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "book_name" => "required",
            "author_id" => "required",
            "book_category_id" => "required",
            "published_year" => "required",
            "publisher" => "required",
            "quantity" => "required",
            "summary" => "required",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('admin.access.book.create');
    }
}
