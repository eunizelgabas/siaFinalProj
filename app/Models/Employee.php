<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['last_name', 'first_name','email',  'department', 'position', 'phone_no', 'pic'];

    protected $appends = ['picUrl'];

    public function getPicUrlAttribute() {
        $url = $this->pic ? asset("employee/employee_pics/" . $this->pic) : "https://512pixels.net/downloads/macos-wallpapers-thumbs/10-14-Night-Thumb.jpg";
        return $url;
    }

    public function expenses() {
        return $this->hasMany(Expense::class, 'emp_id');
    }

}
