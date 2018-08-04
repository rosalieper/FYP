<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamStatistics extends Model
{
    //
    protected $table = 'exam_statistics';
    /**
    *
    *@var array
    */
    protected $fillable = ['registered', 'year', 'exam_statistics_course_instructor', '%pass', 'num_fail', 'num_A', 'num_B', 'num_pass', 'num_B+', 'num_C', 'numC+', 'numD', 'numD+', 'numF', 'num_scripts', 'num_pass_scripts', 'num_fail_script', 'dept_success_rate', 'course_coverage'];
    
    /**
    *
    */
    public function course(){
    	return $this->belongsTo(App/Course);
    }
}
