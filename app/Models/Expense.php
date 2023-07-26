<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['emp_id', 'date', 'name', 'description', 'amount'];

    protected $appends = ['date'];

    public function employee() {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function getDateAttribute() {
        return $this->created_at->format('F d, Y g:i A');
    }
}
