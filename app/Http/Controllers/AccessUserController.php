<?php

namespace App\Http\Controllers;

use App\Models\AccessUser;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class AccessUserController extends Controller
{
    public function create()
    {
        $users = User::all();
        $reports = Report::all();
        return view('assign-access', compact('users', 'reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npk' => 'required|exists:users,NPK',
            'reports' => 'required|array',
            'reports.*' => 'exists:reports,id',
        ]);

        AccessUser::where('NPK', $request->npk)->delete(); // Clear existing assignments

        foreach ($request->reports as $reportId) {
            AccessUser::create([
                'NPK' => $request->npk,
                'report_id' => $reportId,
            ]);
        }

        return redirect()->back()->with('success', 'Reports assigned successfully.');
    }

    public function getAssignedReports(Request $request)
    {
        $npk = $request->npk;
        $assignedReports = AccessUser::where('NPK', $npk)->pluck('report_id');
        return response()->json($assignedReports);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'npk' => 'required|exists:users,NPK',
        ]);

        AccessUser::where('NPK', $request->npk)->delete();

        return response()->json(['message' => 'Assigned reports deleted successfully for NPK ' . $request->npk]);
    }
}

