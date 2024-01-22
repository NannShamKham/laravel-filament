<?php

namespace App\Http\Requests;

use App\Dto\EmployeeData;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            "first_name" => "required|string",
            "last_name" => "required|string",
            "address" => "required|string",
            "country_id" => "required",
            "state_id" => "required|string",
            "country_id" => "required|string",
            "city_id" => "required|string",
            "department_id" => "required|string",
            "zip_code" => "required|string",
            "birthday" => "required|string",
            "date_hired" => "required|string",
        ];
    }

    public function payload(): EmployeeData
    {
        return EmployeeData::of([
            'first_name' => $this->first_name,
            "last_name" => $this->last_name,
            'address' => $this->address,
            "country_id" => $this->country,
            "state_id" => $this->state_id,
            "country_id" => $this->country_id,
            "city_id" => $this->city_id,
            "department_id" => $this->department_id,
            "zip_code" => $this->zip_code,
            "birthday" => $this->birthday,
            "date_hired" => $this->date_hired,
        ]);
    }
}
