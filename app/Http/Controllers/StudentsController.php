<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

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
        $students = Student::all();

        return view('admin.students.index', compact('students'));

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
                'qr' => 'required|file|max:1024',
                'signature' => 'required|file|max:1024',
                'school' => 'required|string|max:255',
                'course' => 'required|string|max:255',
                'img' => 'required|file|max:9024',
                'parentsname' => 'required|string|max:255',
                'emcontact' => 'required|string|max:255',
                
            ]);
    
            $student = Student::create([
                'fname' => $request->firstname,
                'lname' => $request->lastname,
                'address' => $request->address,
                'qr' => $request->qr,
                'signature' => $request->signature,
                'school_id' => $request->school,
                'course' => $request->course,
                'img' => $request->img,
                'parents_name' => $request->parentsname,
                'em_contact' => $request->emcontact,
             
            ]);
            
            $students = Student::all();
            $message = "Students Created Successfully!";

            return view('admin.students.index')->with(['students'=>$students, 'success'=>$message]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
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
        $student = Student::findOrFail($id); 
        // $staff = User::where('role','=',2)->get();
        
        return view('admin.students.edit');
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
    public function destroy($id)
    {
        //
    }

    public function generateDatatables($students)
    {
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
                                      <button data-id="' . $data->id . '" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $data->id . ')">
                                        <i class="fas fa-trash"></i>
                                      </button>';
                return $actionButtons;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
