<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department; // Ensure the Department model is imported
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserManagementController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(5); // Adjust the number of items per page as needed
        return view('user-management', compact('departments'));
    }

    public function promote(Request $request)
    {
        $errors = [];

        try {
            $request->validate([
                'npk' => 'required',
            ]);

            $user = User::where('npk', $request->npk)->firstOrFail();
            $user->is_admin = true; // Assuming there's a field 'is_admin' to set the user as admin
            $user->save();

            return redirect()->route('user-management.index')->with(['success' => 'User promoted to admin successfully.', 'action' => 'promote']);
        } catch (ModelNotFoundException $e) {
            $errors[] = 'User not found.';
        } catch (\Exception $e) {
            $errors[] = 'An error occurred while promoting the user.';
        }

        return redirect()->route('user-management.index')->with(['error' => $errors, 'action' => 'promote']);
    }

    public function changePassword(Request $request)
    {
        $errors = [];

        try {
            $request->validate([
                'npk' => 'required|exists:users,npk',
                'password' => 'required|min:8|confirmed',
            ]);

            $user = User::where('npk', $request->npk)->firstOrFail();
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('user-management.index')->with(['success' => 'Password changed successfully.', 'action' => 'change-password']);
        } catch (ValidationException $e) {
            $errors = array_merge($errors, $e->validator->errors()->all());
        } catch (ModelNotFoundException $e) {
            $errors[] = 'User not found.';
        } catch (\Exception $e) {
            $errors[] = 'An error occurred while changing the password.';
        }

        return redirect()->route('user-management.index')->with(['error' => $errors, 'action' => 'change-password']);
    }

    public function storeDepartment(Request $request)
    {
        $errors = [];

        try {
            $request->validate([
                'code_department' => 'required|unique:departments,code_department',
                'description' => 'nullable|string',
                'group' => 'nullable|string',
            ]);

            Department::create($request->all());

            return redirect()->route('user-management.index')->with(['success' => 'Department added successfully.', 'action' => 'store-department']);
        } catch (ValidationException $e) {
            $errors = array_merge($errors, $e->validator->errors()->all());
        } catch (\Exception $e) {
            $errors[] = 'An error occurred while adding the department.';
        }

        return redirect()->route('user-management.index')->with(['error' => $errors, 'action' => 'store-department']);
    }

    public function updateDepartment(Request $request, $id)
    {
        $errors = [];

        try {
            $request->validate([
                'code_department' => 'required|unique:departments,code_department,' . $id,
                'description' => 'nullable|string',
                'group' => 'nullable|string',
            ]);

            $department = Department::findOrFail($id);
            $department->update($request->all());

            return redirect()->route('user-management.index')->with(['success' => 'Department updated successfully.', 'action' => 'update-department']);
        } catch (ValidationException $e) {
            $errors = array_merge($errors, $e->validator->errors()->all());
        } catch (ModelNotFoundException $e) {
            $errors[] = 'Department not found.';
        } catch (\Exception $e) {
            $errors[] = 'An error occurred while updating the department.';
        }

        return redirect()->route('user-management.index')->with(['error' => $errors, 'action' => 'update-department']);
    }

    public function deleteDepartment($id)
    {
        $errors = [];

        try {
            $department = Department::findOrFail($id);
            $department->delete();

            return redirect()->route('user-management.index')->with(['success' => 'Department deleted successfully.', 'action' => 'delete-department']);
        } catch (ModelNotFoundException $e) {
            $errors[] = 'Department not found.';
        } catch (\Exception $e) {
            $errors[] = 'An error occurred while deleting the department.';
        }

        return redirect()->route('user-management.index')->with(['error' => $errors, 'action' => 'delete-department']);
    }
}
