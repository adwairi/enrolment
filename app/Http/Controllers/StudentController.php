<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use Illuminate\Http\Request;
use App\Models\Student;
use Validator;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
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
    public function index()
    {
        $students = Student::with('courses' )->get();
        return view('student.index', ['students'=>$students]);
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
            'name'     => 'required|min:3',
            'phone'     => 'required|numeric',
            'country'  => 'required',
            'email'  => 'required|email',
            'image'  => 'required|image|dimensions:min_width=400,min_height=300',
        ]);
        if($validator->fails()) {
            if($request->ajax())
                return response()->json(['status' => false, 'message' => $validator->messages()]);
            else
                return redirect('/student')
                    ->withErrors($validator)
                    ->withInput();
        }

        $student = new Student();
        $data = $request->all();
        $student->name = $data['name'];
        $student->phone = $data['phone'];
        $student->country = $data['country'];
        $student->email = $data['email'];


        // upload image
        $image = $data['image'];
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imagename);
        $student->imgUrl = asset('images/' . $imagename);


        $courses = $data['courses'];
        if ($student->save()){
            if(count($courses)){
                $data=[];
                foreach ($courses as $course_id){
                    $data[]=['student_id' => $student->id, 'course_id'=>$course_id];
                }
                DB::table('enrolments')->insert($data);
            }
            if($request->ajax())
                return response()->json(['status'=>true]);
            else
                return redirect('/student');
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
        $student = Student::with('courses')
            ->where('id', '=', $id)
            ->get();

        return view('student.show', ['student',$student]);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = 0)
    {
        $student = Student::find($id);
        if ($id == 0 || !$student)
            return response()->json(['status'=>false, 'message'=>'Something wrong! please try again']);

        Enrolment::where(['student_id' => $id])->delete();
        if($student->delete())
            return response()->json(['status'=>true, 'message'=>'Deleted Successfully']);

        return response()->json(['status'=>false, 'message'=>'Something wrong! please try again']);
    }
}
