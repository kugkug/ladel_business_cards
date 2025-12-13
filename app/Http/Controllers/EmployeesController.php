<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    public $departments = [];
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->departments = DB::table('employees')->groupBy('department')->pluck('department');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employees::orderBy('id', 'asc')->simplePaginate(18);
        $data = [
            'title' => 'Employees', 
            'header' => 'List of Employees',
            'employees' => $employees
        ];
        return view("admin.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Employees', 
            'header' => 'Add Employee',
            'departments' => $this->departments
        ];
        return view("admin.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "id_no" => ["required", "unique:employees", "max:8"],
            "last_name" => ["","max:255"],
            "middle_name" => ["max:255"],
            "first_name" => ["max:255"],
            "email" => ["unique:employees", "email"],
            "department" => ["max:255"],
            "position_title" => ["max:255"],
            "employee_number" => ["max:255"],
            "employee_number_alt" => ["max:255"],
            "address" => ["max:255"],
            "contact_person" => ["max:255"],
            "contact_person_number" => ["max:255"]            
        ]);

        Employees::create($validated);
        return back()->with("message", "Employee Successfully Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $employee = Employees::where('id_no', $id)->get();
            $data = [
                'title' => 'Employee', 
                'header' => 'Edit Employee',
                'employee' => $employee,
                'departments' => $this->departments
                ];
            return view("admin.edit", $data);
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Employee not found");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employees, $id)
    {
        $validated = $request->validate([
            "id_no" => ["required", "max:8",  Rule::unique("employees")->ignore($id, 'id')],
            "last_name" => ["sometimes","max:255"],
            "middle_name" => ["max:255"],
            "first_name" => ["sometimes","max:255"],
            "email" => ["sometimes", "email", Rule::unique("employees")->ignore($id, 'id')],
            "department" => ["sometimes"],
            "position_title" => ["max:255"],
            "employee_number" => ["max:255"],
            "employee_number_alt" => ["max:255"],
            "address" => ["max:255"],
            "contact_person" => ["max:255"],
            "contact_person_number" => ["max:255"]    
        ]);


        $employees->where('id', $id)->update($validated);
        return back()->with("message", "Employee Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees, $id)
    {
        $employees->where('id_no', $id)->delete();
        return back()->with("message", "Employee was successfully deleted");
    }

    public function employee($id)
    {
        try {
            $employee = Employees::where('id_no', $id)->get();
            $data = [
                'title' => 'Employees', 
                'header' => 'List of Employees',
                'employee' => $employee
            ];
            return view("admin.employee", $data);
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Employee not found");
        }
    }

    public function apex($id) {
        $apex_employee = [
            '00001' => [
                "id_no" => "00001",
                "first_name" => "First Name",
                "middle_name" => "Middle Name",
                "position_title" => "Last Name",
                "email" => "First Name",
            ],
            '00002' => [
                "id_no" => "00002",
                "first_name" => "First Name",
                "middle_name" => "Middle Name",
                "position_title" => "Position Title",
                "email" => "email",
            ],
        ];

        $data = [
            'title' => 'Employees', 
            'header' => 'List of Employees',
            'employee' => $apex_employee[$id]
        ];
        return view("admin.apex-employee", $data);
    }
}