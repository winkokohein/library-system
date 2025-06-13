<?php

namespace Modules\DeliveryFee\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDeliveryFeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // "township_id" => [
            //     'required',
            //     Rule::unique('delivery_fees', 'township_id'),
            // ],
            "township_id" => "required",
            "amount" => "required"
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('admin.access.deliveryfee.edit');
    }
}
