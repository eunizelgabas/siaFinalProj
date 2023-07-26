<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Employee/Index',[
            'employees'=> Employee::orderBy('last_name')->orderBy('first_name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Employee/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'department' => 'required',
            'position'  => 'required',
            'phone_no' => 'required|numeric',
            'email'     => 'required'

        ]);

        $fileName = null;

        //process image
        if($request->pic){
            $fileName = time().'.'.$request->pic->extension();
            $request->pic->move(public_path('employee/employee_pics'), $fileName);
            $fields['pic'] = $fileName;
        }

        Employee::create($fields);

        return redirect('/employees')->banner('Employee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $employee->load('expenses');
        return inertia('Employee/Show', [
            'employee' =>  $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return inertia('Employee/Edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $fields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'department' => 'required',
            'position'  => 'required',
            'phone_no' => 'required|numeric',
            'email'     => 'required'

        ]);

        // $fileName = null;

        // //process image
        // if($request->pic){
        //     $fileName = time().'.'.$request->pic->extension();
        //     $request->pic->move(public_path('employee/employee_pics'), $fileName);
        //     $fields['pic'] = $fileName;
        // }

        $employee->update($fields);
        return redirect('/employees/' . $employee->id)->banner('Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employee')->dangerBanner('Employee successfully deleted');
    }

    public function search($searchKey){
        return inertia('Employee/Index', [
            'employees' => Employee::where('first_name', 'like' , "%$searchKey%")->orWhere('last_name', 'like' , "%$searchKey%")
                            ->orWhere('department', 'like' , "%$searchKey%")
                            ->orWhere('position', 'like' , "%$searchKey%")->get()
        ]);
    }

    public function toggleActive(Employee $employee){
        $employee->active = !$employee->active;
        $employee->save();

        return back()->banner('Toggle Enable');
    }

    public function email(Employee $employee){
        //create a pdf of the statement of account
        $pdf = Pdf::loadView('pdf.employee-summary',[
            'employee' =>$employee
        ]);

        $filename = 'records/' . $employee->last_name . " " . $employee->id . ".pdf";
        $pdf->save($filename);

        Mail::send('emails.soa' ,['employee'=>$employee], function($message) use ($employee, $filename){
            $message->to($employee->email);
            $message->subject('Expense Record');
            $message->attach($filename);
        });

        return back()->banner('Email sent successfully');
    }



}
