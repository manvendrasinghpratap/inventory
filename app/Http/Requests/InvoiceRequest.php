<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'state_id' => 'required',
            'bank_id' => 'required',
            'branch_name' => 'required',
            'invoice' => 'required',
            'invoice_date' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'state_id.required' =>  'State Name is required',
            'bank_id.required' =>   'Bank Name is required',
            'branch_name.required' =>  'Branch Name is required',
            'invoice.required' => 'Invoice Number is required',
            'invoice_date.required' => 'Invoice Date is required',
        ];
    }
}
