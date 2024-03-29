<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->generateDatatables(Student::all());
        }

        return view('admin.students.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'qr' => 'required|file|max:9024|mimes:jpeg,png',
                'signature' => 'required|file|max:9024|mimes:jpeg,png',
                'school_id' => 'required|string|max:255|unique:students',
                'course' => 'required|string|max:255',
                'new_course' => 'nullable|sometimes|required_if:course,addNewCourse|string|max:255',
                'img' => 'required|file|max:9024|mimes:jpeg,png',
                'parentsname' => 'required|string|max:255',
                'emcontact' => 'required|string|max:255',
                'bday' => 'required|string|max:255',
                'sy_started' => 'required|string|max:255',
                'course_color' => 'required|string|max:255',

            ]);

            // Generate a random color if not provided
            $courseColor = $request->selected_course_color ?: $this->generateRandomColor();


              // file upload QRS
              $now = new \DateTime('NOW');
              $date = $now->format('m-d-Y_H.i.s');

              if($request->has('qr')){
                  $students_qr_WithExt = $request->file('qr')->getClientOriginalName();
                  $students_qr_filename = str_replace(' ','_',pathinfo($students_qr_WithExt, PATHINFO_FILENAME));
                  $students_qr_extension = $request->file('qr')->getClientOriginalExtension();
                  $students_qr = $students_qr_filename.'-'.$date.'.'.$students_qr_extension;
                  $path_students_qr = $request->file('qr')->storeAs('public/qrs', $students_qr);
              } else {
                  $students_qr = 'No Data';
              }

                // file upload Signatures
            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s');

            if($request->has('signature')){
                $students_signature_WithExt = $request->file('signature')->getClientOriginalName();
                $students_signature_filename = str_replace(' ','_',pathinfo($students_signature_WithExt, PATHINFO_FILENAME));
                $students_signature_extension = $request->file('signature')->getClientOriginalExtension();
                $students_signature = $students_signature_filename.'-'.$date.'.'.$students_signature_extension;
                $path_students_signature = $request->file('signature')->storeAs('public/signatures', $students_signature);
            } else {
                $students_signature = 'No Data';
            }
              // file upload IMG
              $now = new \DateTime('NOW');
              $date = $now->format('m-d-Y_H.i.s');

              if($request->has('img')){
                  $students_Img_WithExt = $request->file('img')->getClientOriginalName();
                  $students_Img_filename = str_replace(' ','_',pathinfo($students_Img_WithExt, PATHINFO_FILENAME));
                  $students_Img_extension = $request->file('img')->getClientOriginalExtension();
                  $students_img = $students_Img_filename.'-'.$date.'.'.$students_Img_extension;
                  $path_students_img = $request->file('img')->storeAs('public/images', $students_img);
              } else {
                  $students_img = 'No Data';
              }



            $student = Student::create([
                'fname' => $request->firstname,
                'lname' => $request->lastname,
                'address' => $request->address,
                'qr' => $students_qr,
                'signature' => $students_signature,
                'school_id' => $request->school_id,
                'course' => $request->course === 'addNewCourse' ? $request->new_course : $request->course,
                'img' => $students_img,
                'parents_name' => $request->parentsname,
                'em_contact' => $request->emcontact,
                'bday' => $request->bday,
                'sy_started' => $request->sy_started,
                'course_color' => $courseColor,


            ]);

            $students = Student::all();
            $message = "Students Created Successfully!";

            return view('admin.students.index')->with(['students'=>$students, 'success'=>$message]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    private function generateRandomColor()
    {
        // Generate a random hexadecimal color code
        return '#' . Str::random(6);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $student = Student::findOrFail($id);
        $courseColor = $student->course_color;

    return view('admin.students.show', ['student' => $student,'courseColor' => $courseColor,]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        // $staff = User::where('role','=',2)->get();

        return view('admin.students.edit')->with(['students' => $students,]);


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
        $student = Student::findOrFail($id);
        try {
            $validatedData = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'qr' => 'required|file|max:9024|mimes:jpeg,png',
                'signature' => 'required|file|max:9024|mimes:jpeg,png',
                'school_id' => ['required','string','max:255',
                    Rule::unique('students')->ignore($student->id),
                ],
                'course' => 'required|string|max:255',
                'new_course' => 'nullable|sometimes|required_if:course,addNewCourse|string|max:255',
                'img' => 'required|file|max:9024|mimes:jpeg,png',
                'parentsname' => 'required|string|max:255',
                'emcontact' => 'required|string|max:255',
                'bday' => 'required|string|max:255',
                'sy_started' => 'required|string|max:255',
                'course_color' => 'required|string|max:255',

            ]);

            // Generate a random color if not provided
            $courseColor = $request->selected_course_color ?: $this->generateRandomColor();

              // file upload QRS
              $now = new \DateTime('NOW');
              $date = $now->format('m-d-Y_H.i.s');

              if($request->has('qr')){
                  $students_qr_WithExt = $request->file('qr')->getClientOriginalName();
                  $students_qr_filename = str_replace(' ','_',pathinfo($students_qr_WithExt, PATHINFO_FILENAME));
                  $students_qr_extension = $request->file('qr')->getClientOriginalExtension();
                  $students_qr = $students_qr_filename.'-'.$date.'.'.$students_qr_extension;
                  $path_students_qr = $request->file('qr')->storeAs('public/qrs', $students_qr);
              } else {
                  $students_qr = 'No Data';
              }

                // file upload Signatures
            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s');

            if($request->has('signature')){
                $students_signature_WithExt = $request->file('signature')->getClientOriginalName();
                $students_signature_filename = str_replace(' ','_',pathinfo($students_signature_WithExt, PATHINFO_FILENAME));
                $students_signature_extension = $request->file('signature')->getClientOriginalExtension();
                $students_signature = $students_signature_filename.'-'.$date.'.'.$students_signature_extension;
                $path_students_signature = $request->file('signature')->storeAs('public/signatures', $students_signature);
            } else {
                $students_signature = 'No Data';
            }
              // file upload IMG
              $now = new \DateTime('NOW');
              $date = $now->format('m-d-Y_H.i.s');

              if($request->has('img')){
                  $students_Img_WithExt = $request->file('img')->getClientOriginalName();
                  $students_Img_filename = str_replace(' ','_',pathinfo($students_Img_WithExt, PATHINFO_FILENAME));
                  $students_Img_extension = $request->file('img')->getClientOriginalExtension();
                  $students_img = $students_Img_filename.'-'.$date.'.'.$students_Img_extension;
                  $path_students_img = $request->file('img')->storeAs('public/images', $students_img);
              } else {
                  $students_img = 'No Data';
              }

            $student = Student::findOrFail($id);

            $student->update([
                'fname' => $request->firstname,
                'lname' => $request->lastname,
                'address' => $request->address,
                'qr' => $students_qr,
                'signature' => $students_signature,
                'school_id' => $request->school_id,
                'course' => $request->course === 'addNewCourse' ? (string)$request->new_course : $request->course,
                'img' => $students_img,
                'parents_name' => $request->parentsname,
                'em_contact' => $request->emcontact,
                'bday' => $request->bday,
                'sy_started' => $request->sy_started,
                'course_color' => $courseColor,
            ]);


            $student = Student::all();
            $message = "Students Updated Successfully!";

            return view('admin.students.index')->with(['students'=>$student, 'success'=>$message]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->destroy($id);

        if($student){
            return response()->json(['message' => 'Student deleted successfully']);
        } else {
            return response()->json(['error' => 'Student failed!']);
        }
    }

    public function generateDatatables($students)
    {
        try {

        return DataTables::of($students)
            ->addIndexColumn()
            // ->addColumn('role', function ($data) {
            //     $role = '';
            //     if ($data->role == 1) {
            //         $role = '<span class="badge badge-primary">Administrator</span>';
            //     } else if ($data->role == 2) {
            //         $role = '<span class="badge badge-warning">Staff</span>';
            //     }
            //     return $role;
            // })
            ->addColumn('action', function ($data) {
                $actionButtons = '<a href="' . route("students.edit", $data->id) . '" data-id="' . $data->id . '" class="btn btn-sm btn-warning editUser">
                                        <i class="fas fa-edit"></i>
                                      </a>
                                      <button data-id="'.$data->id.'" class="btn btn-sm btn-danger" onclick="confirmDeleteStudent('.$data->id.')">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                      <a href="' . route("students.show", $data->id) . '" data-id="' . $data->id . '" class="btn btn-sm btn-secondary showStudent">
                                        <i class="fas fa-print"></i>
                                      </a>';
                return $actionButtons;
            })
            ->rawColumns(['action'])
            ->make(true);

        } catch (\Exception $e) {
            // Log the exception for debugging
            error_log("Error in DataTables: " . $e->getMessage());
            // Optionally, return a response with a useful message
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
