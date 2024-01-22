<?php

declare(strict_types=1);

namespace App\Services\EmployeeService;

use App\Http\Resources\EmployeeResource;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Employee;

class EmployeeService
{
    public function index()
    {
        $employees = Employee::count() >= 1;
        if ($employees) {
            return new ApiSuccessResponse(EmployeeResource::collection(Employee::all()));
        } else {
            return new ApiErrorResponse('No employees found', false, 404);
        }
    }

    public function create($request)
    {
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->address = $request->address;
        $employee->country_id = $request->country_id;
        $employee->city_id = $request->city_id;
        $employee->state_id = $request->state_id;
        $employee->department_id = $request->department_id;
        $employee->zip_code = $request->zip_code;
        $employee->birthday = $request->birthday;
        $employee->date_hired = $request->date_hired;
        $employee->save();
        return new ApiSuccessResponse("Job is created successfully");
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return new ApiErrorResponse('Employee not found', false, 404);
        }
        $employee->delete();
        return new ApiSuccessResponse("Job is deleted successfully");
    }

    public function update($request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return new ApiErrorResponse('Employee not found', false, 404);
        }
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->address = $request->address;
        $employee->country_id = $request->country_id;
        $employee->city_id = $request->city_id;
        $employee->state_id = $request->state_id;
        $employee->department_id = $request->department_id;
        $employee->zip_code = $request->zip_code;
        $employee->birthday = $request->birthday;
        $employee->date_hired = $request->date_hired;
        $employee->update();
        return new ApiSuccessResponse("Job is updated successfully");
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return new ApiErrorResponse('Employee not found', false, 404);
        }
        return new ApiSuccessResponse(new EmployeeResource($employee));
    }

    public function update_one($request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return new ApiErrorResponse('Employee not found', false, 404);
        }
        $employee->first_name = $request->first_name;

        $employee->update();
        return new ApiSuccessResponse("Job is updated successfully");
    }
}
