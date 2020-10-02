<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "location_id" => ['required'],
            "connote_id" => ['required', 'exists:connotes,_id'],
            "organization_id" => ['required', 'numeric'],
            "transaction_id" => ['required'],
            "customer_name" => ['required'],
            "customer_code" => ['required', 'numeric'],
            "transaction_amount" => ['required', 'numeric'],
            "transaction_discount" => ['sometimes', 'numeric'],
            "transaction_additional_field" => ['sometimes'],
            "transaction_payment_type" => ['required', 'numeric'],
            "transaction_state" => ['required'],
            "transaction_code" => ['required'],
            "transaction_order" => ['required', 'numeric'],
            "transaction_cash_amount" => ['required', 'numeric'],
            "transaction_cash_change" => ['required', 'numeric'],
            "transaction_payment_type_name" => ['required'],
            'destination_data' => ['required'],
            'origin_data' => ['required'],
        ];
    }
}
