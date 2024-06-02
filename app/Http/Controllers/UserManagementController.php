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
}
