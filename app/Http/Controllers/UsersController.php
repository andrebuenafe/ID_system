<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->generateDatatables(User::all());
        }
        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|numeric',
            'temp_password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, // Update 'role' to 'role_id'
            'password' => Hash::make($request->input('temp_password')),
        ]);

        if ($user) {
            $this->sendNewUserEmail($user, $request->input('temp_password'));
        }

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    }



}
/*
    public function edit()
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }
 */

    public function generateDatatables($users)
    {
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('role', function ($data) {
                $role = '';
                if ($data->role == 1) {
                    $role = '<span class="badge badge-primary">Administrator</span>';
                } else if ($data->role == 2) {
                    $role = '<span class="badge badge-warning">Staff</span>';
                }
                return $role;
            })
            ->addColumn('action', function ($data) {
                $actionButtons = '<a href="' . route("users.edit", $data->id) . '" data-id="' . $data->id . '" class="btn btn-sm btn-warning editUser">
                                        <i class="fas fa-edit"></i>
                                      </a>
                                      <button data-id="' . $data->id . '" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $data->id . ')">
                                        <i class="fas fa-trash"></i>
                                      </button>';
                return $actionButtons;
            })
            ->rawColumns(['action', 'role'])
            ->make(true);
    }

    private function sendNewUserEmail($user, $password)
    {
        // Implement your email sending logic here
        // Example: Mail::to($user->email)->send(new NewUserEmail($user, $password));
    }
}
