<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder\Class_;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table = 'student';
    // protected $primaryKey = 'id_student';
    // public $incrementing = false;
    // protected $keyType = 'string';
    // public $timestamps = false;

    protected $fillable = ['name', 'gender', 'nis', 'class_id', 'image'];

    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    
    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }
}
