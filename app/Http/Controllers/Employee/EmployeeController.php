<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService\EmployeeService;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function __construct(
        public EmployeeService $employeeService,
    ) {
    }
    public function index()
    {
        return $this->employeeService->index();
    }

    public function create(EmployeeRequest $request)
    {
        return $this->employeeService->create($request->payload());
    }

    public function delete($id)
    {
        return $this->employeeService->delete($id);
    }

    public function update(EmployeeRequest $request, $id)
    {
        return $this->employeeService->update($request->payload(), $id);
    }

    public function show($id){
        return $this->employeeService->show($id);
    }

    public function update_one(EmployeeRequest $request, $id){
        return $this->employeeService->update_one($request->payload(), $id);
    }
}
