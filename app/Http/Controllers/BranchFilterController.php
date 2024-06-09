<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchFilter;
use App\Models\Report;

class BranchFilterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $rows = $request->input('rows', 15);

        $branchFilters = BranchFilter::when($search, function($query, $search) {
            return $query->where('branch_table', 'like', "%{$search}%")
                         ->orWhere('report_id', 'like', "%{$search}%");
        })->paginate($rows);

        $reports = Report::all();
        $branches = BranchFilter::distinct()->pluck('branch_table');

        return view('branch-filter-management', compact('branchFilters', 'reports', 'branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_table' => 'required|string|max:255',
            'reports' => 'required|array',
            'reports.*' => 'exists:reports,id',
        ]);

        foreach ($request->reports as $reportId) {
            BranchFilter::create([
                'branch_table' => $request->branch_table,
                'report_id' => $reportId,
            ]);
        }

        return redirect()->route('branch-filters.index')->with('success', 'Branch filters added successfully.');
    }

    public function getAssignedReports(Request $request)
    {
        $branchTable = $request->input('branch_table');
        $assignedReports = BranchFilter::where('branch_table', $branchTable)->pluck('report_id')->toArray();
        return response()->json($assignedReports);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'branch_table' => 'required|string|max:255',
        ]);

        BranchFilter::where('branch_table', $request->branch_table)->delete();

        return response()->json(['message' => 'Branch filters deleted successfully.']);
    }
}
