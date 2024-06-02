<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center page-title">Reports Management</h2>
                <button class="btn btn-primary mb-3" id="addReport">Add New Report</button>
            </div>
        </div>

        <div id="message" class="alert alert-success mt-3" style="display:none;">
            <p id="message-text"></p>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <form method="GET" action="{{ route('reports.index') }}" class="form-inline">
                    <div class="form-group mb-2">
                        <input type="text" name="search" class="form-control" placeholder="Search reports" value="{{ request('search') }}">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <select name="rows" class="form-control" onchange="this.form.submit()">
                            <option value="15" {{ request('rows') == 15 ? 'selected' : '' }}>15</option>
                            <option value="25" {{ request('rows') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('rows') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('rows') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Report ID</th>
                            <th>Dataset ID</th>
                            <th>Group ID</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="reportsTable">
                        @foreach ($reports as $report)
                            <tr data-id="{{ $report->id }}">
                                <td>{{ $report->name_report }}</td>
                                <td>{{ $report->id_report }}</td>
                                <td>{{ $report->id_dataset }}</td>
                                <td>{{ $report->id_group }}</td>
                                <td>
                                    <button class="btn btn-info editReport">Edit</button>
                                    <button class="btn btn-danger deleteReport">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $reports->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Add/Edit Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reportForm">
                        @csrf
                        <input type="hidden" id="reportId">
                        <div class="form-group">
                            <label for="name_report">Report Name</label>
                            <input type="text" class="form-control" id="name_report" name="name_report" required>
                        </div>
                        <div class="form-group">
                            <label for="id_report">Report ID</label>
                            <input type="text" class="form-control" id="id_report" name="id_report" required>
                        </div>
                        <div class="form-group">
                            <label for="id_dataset">Dataset ID</label>
                            <input type="text" class="form-control" id="id_dataset" name="id_dataset" required>
                        </div>
                        <div class="form-group">
                            <label for="id_group">Group ID</label>
                            <input type="text" class="form-control" id="id_group" name="id_group" required>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
</body>
</html>
