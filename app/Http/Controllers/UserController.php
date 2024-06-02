<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function create()
    {
        $departments = Department::all();
        return view('create-user', compact('departments'));
    }

    public function store(Request $request)
    {
        $customMessages = [
            'npk.required' => 'NPK is required.',
            'npk.numeric' => 'NPK must be a number.',
            'npk.digits' => 'NPK must be exactly 5 digits.',
            'npk.unique' => 'This NPK is already taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
            'password_confirmation.required' => 'Password confirmation is required.',
            'department.required' => 'Department is required.',
            'department.exists' => 'Selected department does not exist.',
        ];

        $errors = [];

        try {
            $validator = Validator::make($request->all(), [
                'npk' => 'required|numeric|digits:5|unique:users,NPK',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
                'department' => 'required|exists:departments,id',
                'is_admin' => 'boolean',
            ], $customMessages);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $user = new User();
            $user->NPK = $request->npk;
            $user->password = Hash::make($request->password);
            $user->id_department = $request->department;
            $user->is_admin = $request->has('is_admin') ? true : false;
            $user->save();

            Log::info('User created successfully', ['user' => $user]);

            return redirect()->route('users.create')->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            $errors = array_merge($errors, $e->validator->errors()->all());
        } catch (\Exception $e) {
            $errors[] = 'An error occurred while creating the user.';
        }

        Log::error('Validation failed', ['errors' => $errors]);

        return redirect()->route('users.create')->withErrors(['errors' => $errors])->withInput();
    }
}
