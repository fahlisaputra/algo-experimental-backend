<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function seedData()
    {
        CourseData::Create([
            'course_id' => 1,
            'user_id' => 1,
        ]);

        CourseData::Create([
            'course_id' => 2,
            'user_id' => 1,
        ]);

        CourseData::Create([
            'course_id' => 3,
            'user_id' => 1,
        ]);

        CourseData::Create([
            'course_id' => 4,
            'user_id' => 1,
        ]);


        return [];
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
