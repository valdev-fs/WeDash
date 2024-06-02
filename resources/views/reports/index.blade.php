<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
</head>
<body>
    <h1>Reports</h1>
    <ul>
        @foreach($reports as $report)
            <li><a href="{{ route('reports.show', $report->id) }}">{{ $report->name_report }}</a></li>
        @endforeach
    </ul>
</body>
</html>
