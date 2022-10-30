<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'student_id',
        'phone',
        'email',
        'fee',
        'major_id',
        'minor1_id',
        'minor2_id',
        'elective_course',
        'paid',
        'address',
        'barcode'
        ];
    public function major(){
        return $this->belongsTo(Major::class,'major_id','id');
    }
    public function minor1(){
        return $this->belongsTo(Major::class,'minor1_id','id');
    }
    public function minor2(){
        return $this->belongsTo(Major::class,'minor2_id','id');
    }
}
