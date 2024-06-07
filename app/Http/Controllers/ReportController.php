<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Services\PowerBIService;
use GuzzleHttp\Exception\RequestException;
use App\Models\AccessUser;
use App\Models\ReportViewLog; // Add model for logging views
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $reportIds = AccessUser::where('NPK', $user->NPK)->pluck('report_id');
        $reports = Report::whereIn('id', $reportIds)->orderBy('name_report')->get();
        return view('embed-powerbi', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        $embedToken = null;
        $errorMessage = null;

        try {
            $embedToken = $this->generateEmbedToken($report->id_report, $report->id_dataset);
            // Log the generated embed token for debugging
            Log::info('Generated Embed Token: ', ['embedToken' => $embedToken]);

            // Log the view
            ReportViewLog::create([
                'user_id' => auth()->id(),
                'report_id' => $report->id,
                'viewed_at' => Carbon::now()
            ]);
        } catch (RequestException $e) {
            // Capture the error message
            $errorMessage = $e->getMessage();
            // Log the error
            Log::error('Error generating embed token', ['exception' => $e]);
        }

        if (request()->expectsJson()) {
            return response()->json([
                'embedToken' => $embedToken, 
                'reportId' => $report->id_report, 
                'groupId' => $report->id_group,
                'errorMessage' => $errorMessage
            ]);
        }

        return view('embed-powerbi', compact('report', 'embedToken', 'reports', 'errorMessage'));
    }

    private function generateEmbedToken($reportId, $datasetId)
    {
        $powerBIService = new PowerBIService();
        return $powerBIService->getPowerBIEmbedToken($reportId, $datasetId);
    }
}
