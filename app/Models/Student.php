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
        'paid',
        'address'
        ];
    public function major(){
        return $this->belongsTo(Major::class,'major_id','id');
    }
}
