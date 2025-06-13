<?php

namespace Modules\Borrow\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBorrowRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // "customer_id" => "required",
            "borrow_date" => "required",
            "used_delivery" => "required",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return auth()->user()->can('admin.access.borrow.create');
        return true;
    }
}
