<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitStudent extends Model
{
    use HasFactory;
    //* RELATION BETWEEN ADMIT_STUDENT WITH BATCH_NO TABLE
    public function bathNo(){
        return $this->belongsTo(BatchNumber::class);
    }


    //* ATTENDENCE
    function myAttendence() {
        return $this->hasMany(AttendanceStore::class);
    }
}