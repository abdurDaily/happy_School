<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Facultystaff extends Model
{
    use HasFactory, HasRoles;
    protected $guard_name = "admin";
}
