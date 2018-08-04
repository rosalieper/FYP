<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class UserController extends Controller
{

    public function __construct(){
      //$this->middleware('Second');
   }
   public function showPath(Request $request){
      $uri = $request->path();
      echo '<br>URI: '.$uri;
      
      $url = $request->url();
      echo '<br>';
      
      echo 'URL: '.$url;
      $method = $request->method();
      echo '<br>';
      
      echo 'Method: '.$method;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tickets = Student::get();
        
        return view('index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ticket = new Student();
        $data = $this->validate($request, [
            'option'=>'required',
            'name'=> 'required'
        ]);
       
        $ticket->saveStudent($data);
        return redirect('/home')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo '<br>show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ticket = Student::where('Student_id_num', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('edit', compact('ticket', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ticket = new Ticket();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $data['id'] = $id;
        $ticket->updateStudent($data);

        return redirect('/home')->with('success', 'New support ticket has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Student::find($id);
        $ticket->delete();

        return redirect('/home')->with('success', 'Ticket has been deleted!!');
    }
}
