<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'employees';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'title',
        'task',
        'message',
    ];
}
