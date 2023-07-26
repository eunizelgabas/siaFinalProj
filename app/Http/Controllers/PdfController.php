<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expense;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

    public function totalemployee (){
        $pdf = Pdf::loadView('pdf.total-employee',[
            'employees' => Employee::orderBy('created_at', 'desc')->get(),
            'expenses' => Expense::get()
        ]);

        return $pdf->stream();
    }

    public function employeeSummary(Employee $employee){
        $pdf = Pdf::loadView('pdf.employee-summary',[
            'employee'=>$employee
        ]);

        return $pdf->stream();
    }
}
