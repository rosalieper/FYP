<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Student;
use DB;
use Excel;

class maatwebsiteControler extends Controller
{
    public function importExport()
	{
		error_log('Some message here.');
		return view('importExport');
	}
	public function downloadExcel($type)
	{
		error_log('Some message here.');
		$data = Student::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel(Request $request)
	{

		error_log("Enter");
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();


			$data = Excel::load($path, function($reader) {})->get();


			if(!empty($data) && $data->count()){


				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $v) {		
							$insert[] = ['student_name' => $v['student_name'], 'student_option' => $v['student_option']];
						}
					}
				}

				
				if(!empty($insert)){
					Item::insert($insert);
					return back()->with('success','Insert Record successfully.');
				}


			}


		}


		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}
