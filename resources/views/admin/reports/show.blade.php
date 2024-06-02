<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        .navbar {
            background-color: #007bff;
            color: #fff;
        }

        .container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">WeDash Admin</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reports.index') }}">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Report Details</h2>
                <div class="card mt-3">
                    <div class="card-header">
                        {{ $report->name_report }}
                    </div>
                    <div class="card-body">
                        <p><strong>Report ID:</strong> {{ $report->id_report }}</p>
                        <p><strong>Dataset ID:</strong> {{ $report->id_dataset }}</p>
                        <p><strong>Group ID:</strong> {{ $report->id_group }}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('reports.edit', $report->id) }}">Edit</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this report?')">Delete</button>
                        </form>
                        <a class="btn btn-secondary" href="{{ route('reports.index') }}">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
