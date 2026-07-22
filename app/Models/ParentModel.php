<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = 'parents';

    protected $fillable = [
        'user_id',
        'father_name',
        'mother_name',
        'phone',
        'email',
        'address',
    ];


    /**
     * Parent belongs to a user account
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Parent can have many students
     */
    public function children()
    {
        return $this->belongsToMany(
            Student::class,
            'parent_student',
            'parent_id',
            'student_id'
        );
    }
}