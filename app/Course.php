<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course';

    /**
    *
    *@var array
    */

    protected $fillable = ['course_name', 'course_status', 'course_coverage', 'course_cv', 'course_instructor'];

    /**
    *
    */
    public function student_course(){
    	return $this->hasMany(App/CourseStudent);
    }
    /**
    *
    */
    public function exam_statistics(){
    	return $this->hasMany(App/ExamStatistics);	
    }
}
