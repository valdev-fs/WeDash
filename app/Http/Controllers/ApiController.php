<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchFilter;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Report;

class ApiController extends Controller
{
    public function getBranchFilterData(Request $request)
    {
        Log::info('getBranchFilterData called');
        $request->validate([
            'id' => 'required|exists:reports,id',
        ]);

        $reportId = $request->input('id');

        $branchFilters = BranchFilter::where('report_id', $reportId)->get();

        if ($branchFilters->isEmpty()) {
            Log::error('No branches found for the provided report ID');
            error_log('MASOKK');
            return response()->json(['message' => 'No branches found for the provided report ID.'], 404);
        }

        Log::info('Branch Filter Data:', ['branchTables' => $branchFilters]);

        return response()->json([
            'branchTables' => $branchFilters[0]->branch_table,
        ]);
    }

    public function getUserDepartmentData()
    {
        Log::info('getUserDepartmentData called');
        $user = Auth::user();

        if (!$user) {
            Log::error('User not authenticated');
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $department = Department::find($user->id_department);
        
        if (!$department) {
            Log::error('Department not found for user', ['user_id' => $user->id]);
            return response()->json(['message' => 'Department not found for user'], 404);
        }

        Log::info('User Department Data:', ['codeDepartment' => $department->code_department, 'group' => $department->group]);

        return response()->json([
            'codeDepartment' => $department->code_department,
            'group' => $department->group,
        ]);
    }
}
