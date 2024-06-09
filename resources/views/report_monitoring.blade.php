<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Monitoring</title>
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .metrics {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .metric {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 10px;
            text-align: center;
        }

        .metric h2 {
            margin: 0 0 10px;
            color: #666;
        }

        .metric p {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        .chart-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .date-filter {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .date-filter label {
            margin: 0 10px 0 0;
            color: #666;
        }

        .date-filter input {
            flex: 1;
            margin: 0 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .date-filter button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .date-filter button:hover {
            background-color: #0056b3;
        }

        .report-table {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead {
            background-color: #007bff;
            color: #fff;
        }

        table th,
        table td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #333;
            text-decoration: none;
            cursor: pointer;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pagination button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        <h1>Report Monitoring</h1>
        <div class="metrics">
            <div class="metric">
                <h2>Total Report Views</h2>
                <p id="totalViews">0</p>
            </div>
        </div>
        <div class="metrics">
            <div class="metric">
                <h2>Users</h2>
                <table id="userViews" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User Account</th>
                            <th>Report Opens</th>
                            <th>Total Page Views</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="reportViewsChart"></canvas>
        </div>
        <div class="date-filter">
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate">
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate">
            <button id="filterButton">Filter</button>
        </div>
        <div class="report-table">
            <table id="reportDetails" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Report Name</th>
                        <th>Report Views</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- The Modal -->
    <div id="userDetailModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>User Detail</h2>
            <table id="userDetailTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Report Name</th>
                        <th>View Date</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="pagination">
                <button id="prevPage">Previous</button>
                <span id="pageInfo"></span>
                <button id="nextPage">Next</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/report_monitoring.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>

</html>
