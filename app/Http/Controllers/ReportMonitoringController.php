<?php

namespace App\Http\Controllers;

use App\Models\ReportViewLog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Log;

class ReportMonitoringController extends Controller
{
    public function showReportMonitoringPage()
    {
        return view('report_monitoring');
    }

    public function getReportMonitoringData(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date', Carbon::now()->startOfMonth()->toDateString()))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date', Carbon::now()->endOfMonth()->toDateString()))->endOfDay();

        $totalViews = ReportViewLog::whereBetween('viewed_at', [$startDate, $endDate])->count();
        
        $userViews = ReportViewLog::select('user_id', DB::raw('COUNT(report_id) as report_opens'), DB::raw('COUNT(*) as total_page_views'))
            ->whereBetween('viewed_at', [$startDate, $endDate])
            ->groupBy('user_id')
            ->with('user')
            ->get()
            ->map(function ($view) {
                return [
                    'userAccount' => $view->user->NPK,
                    'reportOpens' => $view->report_opens,
                    'totalPageViews' => $view->total_page_views
                ];
            });

        $reportDetails = ReportViewLog::select('report_id', DB::raw('COUNT(*) as report_views'))
            ->whereBetween('viewed_at', [$startDate, $endDate])
            ->groupBy('report_id')
            ->with('report')
            ->get()
            ->map(function ($view) {
                return [
                    'reportName' => $view->report->name_report,
                    'reportViews' => $view->report_views,
                ];
            });

        $dailyReportViews = ReportViewLog::select(DB::raw('DATE(viewed_at) as date'), DB::raw('COUNT(*) as count'))
            ->whereBetween('viewed_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $data = [
            'totalViews' => $totalViews,
            'userViews' => $userViews,
            'reportDetails' => $reportDetails,
            'dailyReportViews' => $dailyReportViews
        ];

        return response()->json($data);
    }

    public function showUserDetailPage($userId)
    {
        return view('user_detail', compact('userId'));
    }

    public function getUserDetailData($npk)
{
    // Convert NPK to user_id
    $user = \App\Models\User::where('NPK', $npk)->first();

    if (!$user) {
        return response()->json([], 404);
    }

    $userId = $user->id;

    // Add debugging to check the user ID and the data being retrieved
    Log::info('Fetching user detail data for user ID:', ['userId' => $userId]);

    // Query the data
    $userDetailData = ReportViewLog::where('user_id', $userId)
        ->with('report')
        ->get();

    // Log the raw data retrieved from the database
    Log::info('Raw user detail data:', ['data' => $userDetailData]);

    // Map the data to the expected structure
    $userDetailData = $userDetailData->map(function ($view) {
        return [
            'report' => $view->report->name_report,
            'viewed_at' => Carbon::parse($view->viewed_at)->toDateTimeString()
        ];
    });

    // Log the mapped data
    Log::info('Mapped user detail data:', ['data' => $userDetailData]);

    return response()->json($userDetailData);
}

}
