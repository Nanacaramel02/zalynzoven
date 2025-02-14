<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff'; // Ensure it matches your database table name
    protected $fillable = ['staffName', 'staffContactNo', 'staffEmail', 'staffPosition', 'staffimage'];
}
