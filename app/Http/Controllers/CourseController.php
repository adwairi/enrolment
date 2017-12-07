<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolment;
use Illuminate\Http\Request;
use Validator;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q',100);
//        $courses = Course::
        if (trim($q)!='' && $request->ajax()){
            $courses= Course::where('name', 'like', "%$q%")->paginate(10);
            return $courses;
        }else{
            $courses = Course::all();
            return view('course.index', ['courses' => $courses]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|min:3'
        ]);
        if($validator->fails()) {
            return redirect('/course')
                    ->withErrors($validator)
                    ->withInput();
        }

        $course = new Course();
        $data = $request->all();
        $course->name = $data['name'];
        $course->description = $data['description'];
        if ($course->save()){
            return redirect('/course');
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = 0)
    {
        $course = Course::find($id);
        if ($id == 0 || !$course)
            return response()->json(['status'=>false, 'message'=>'Something wrong! please try again']);

        Enrolment::where(['course_id' => $id])->delete();
        if($course->delete())
            return response()->json(['status'=>true, 'message'=>'Deleted Successfully']);

        return response()->json(['status'=>false, 'message'=>'Something wrong! please try again']);
    }
}
