<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'chatbot_prompt',
        'course_pdf',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(
            \App\Models\User::class,
            'user_courses'
        );
    }

}
