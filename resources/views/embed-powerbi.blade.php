<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embed Power BI Report</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Favicon -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .fullscreen-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .fullscreen-btn:hover {
            background-color: #0056b3;
        }
        .fullscreen-btn i {
            margin-right: 8px;
        }
        .report-list {
            overflow-y: auto;
            flex-grow: 1;
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-100">
    @include('layouts.navbar-no-logo', ['hideLogo' => true])

    <div class="side-menu rounded-lg shadow-lg d-flex flex-column align-items-center" id="sideMenu">
        <div class="menu-title font-bold p-4">
            <img src="{{ asset('images/wedash-logo.png') }}" alt="WeDash Logo" class="logo img-fluid">
        </div>
        <div class="report-list">
            <ul class="list-unstyled w-100 px-2">
                @foreach($reports as $report)
                    <li onclick="loadReport('{{ $report->id }}')" id="report-{{ $report->id }}">
                        <i class="fas fa-chart-bar mr-2"></i> {{ $report->name_report }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="content transition-all duration-300">
        <div id="reportContainer" class="transition-shadow duration-300 w-100"></div>
        <div class="d-flex justify-content-end mt-2">
            <button id="fullScreenBtn" class="fullscreen-btn">
                <i class="fas fa-expand-arrows-alt"></i> Fullscreen
            </button>
        </div>
        <div id="loadingBarContainer" class="mt-2">
            <div id="loadingBar"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/powerbi-client/dist/powerbi.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });

        if (window.console && console.error) {
            const originalConsoleError = console.error;
            console.error = function (...args) {
                if (args[0] && args[0].toString().indexOf('https://dc.services.visualstudio.com/v2/track') === -1) {
                    originalConsoleError.apply(console, args);
                }
            };
        }
    </script>
</body>
</html>
