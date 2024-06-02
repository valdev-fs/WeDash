<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name_report', 'like', "%{$search}%")
                ->orWhere('id_report', 'like', "%{$search}%")
                ->orWhere('id_dataset', 'like', "%{$search}%")
                ->orWhere('id_group', 'like', "%{$search}%");
        }

        $reports = $query->paginate($request->input('rows', 15)); // Default is 15 rows per page

        return view('admin.reports.index', compact('reports'));
    }


    public function create()
    {
        // This method is no longer needed.
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_report' => 'required|string|max:255',
            'id_report' => 'required|string|uuid',
            'id_dataset' => 'required|string|uuid',
            'id_group' => 'required|string|uuid'
        ]);

        Report::create($request->all());

        return response()->json(['success' => 'Report created successfully.']);
    }

    public function show(Report $report)
    {
        // This method is no longer needed.
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return response()->json($report);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name_report' => 'required|string|max:255',
            'id_report' => 'required|string|uuid',
            'id_dataset' => 'required|string|uuid',
            'id_group' => 'required|string|uuid'
        ]);

        $report = Report::findOrFail($id);
        $report->update($request->all());

        return response()->json(['success' => 'Report updated successfully.']);
    }

    public function destroy($id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->delete();

            return response()->json(['success' => 'Report deleted successfully.']);
        } catch (\Exception $e) {
            Log::error('Error deleting report: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete report.'], 500);
        }
    }

}