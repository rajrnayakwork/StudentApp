<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name','last_name','age','gender','city_id'];

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }


    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'students_subjects', 'student_id', 'subject_id');
    }
}
