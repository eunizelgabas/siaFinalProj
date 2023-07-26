<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::orderBy('last_name','asc')->get();
        return inertia('Expense/Create',[
            'expenses' => Expense::orderBy('created_at','asc'),
            'employees'=>$employees,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $fields = $request->validate([
            'name'=>'required',
            'description' => 'required',
            'amount'=>'numeric|required',
            'emp_id' => 'numeric|required',
            'date' => 'required|date'
        ]);

        $exp = new Expense([
            'name' => $fields['name'],
            'amount' => $fields['amount'],
            'description' => $fields['description'],
            'emp_id' =>$fields['emp_id'],
            'date'  =>$fields['date']
        ]);

        $exp->save();


        return redirect('/employees' )->banner('Expense created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return inertia('Expense/Edit', [
            'employees' => Employee::orderBy('last_name')->get(),
            'expense' => $expense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $fields = $request->validate([
            'name'  =>'required',
            'amount'=>'required',
            'description' => 'required',
            'date' => 'required|date'
        ]);

        $expense->update($fields);

        return redirect('/employees')->banner('Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect('/employees')->dangerBanner('Expense successfully deleted');
    }

    public function search($searchKey){
        return inertia('Expense/Index', [
            'expenses' => Expense::where('name', 'like' , "%$searchKey%")->orWhere('description', 'like' , "%$searchKey%")->get()
        ]);
    }
}
