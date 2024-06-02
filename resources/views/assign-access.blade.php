<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Access</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <style>
        .input-group .select2-container {
            flex: 1 1 auto;
            width: 1%;
            min-width: 0;
        }
        .input-group-btn {
            display: flex;
            align-items: center;
        }
        .btn-icon {
            border: none;
            background: none;
            padding: 0 0.5rem;
            cursor: pointer;
        }
        .btn-icon i {
            font-size: 1.2rem;
            color: #6c757d;
        }
        .btn-icon:hover i {
            color: #495057;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <div class="full-page-container">
        <div class="assign-access-container">
            <div class="assign-access-card">
                <h2>Assign Access</h2>
                <form id="assignAccessForm" method="POST" action="{{ route('access.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="npk">NPK</label>
                        <input type="text" class="form-control" id="npk" name="npk" required list="npk-list">
                        <datalist id="npk-list">
                            @foreach($users as $user)
                                <option value="{{ $user->NPK }}">{{ $user->NPK }}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="reports">Reports</label>
                        <div class="input-group">
                            <select class="form-control select2-multiple" id="reports" name="reports[]" multiple="multiple" required>
                                @foreach($reports as $report)
                                    <option value="{{ $report->id }}">{{ $report->name_report }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-btn">
                                <button type="button" class="btn-icon" id="selectAllReports">
                                    <i class="fas fa-check-square"></i>
                                </button>
                                <button type="button" class="btn-icon" id="removeAllReports">
                                    <i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Assign Reports</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete Assigned Report</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Assigned Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteAccessForm">
                        @csrf
                        <div class="form-group">
                            <label for="deleteNpk">NPK</label>
                            <input type="text" class="form-control" id="deleteNpk" name="deleteNpk" required list="npk-list">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="confirmationMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmed">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2();

            $('#npk').on('input', function() {
                var npk = $(this).val();
                if (npk.length === 5) { // Assuming NPK is always 5 characters long
                    $.ajax({
                        url: '{{ route("get.assigned.reports") }}',
                        method: 'GET',
                        data: { npk: npk },
                        success: function(data) {
                            $('#reports').val(data).trigger('change');
                        }
                    });
                }
            });

            $('#selectAllReports').click(function() {
                var allOptions = [];
                $('#reports option').each(function() {
                    allOptions.push($(this).val());
                });
                $('#reports').val(allOptions).trigger('change');
            });

            $('#removeAllReports').click(function() {
                $('#reports').val(null).trigger('change');
            });

            $('#confirmDelete').click(function() {
                var npk = $('#deleteNpk').val();
                if (npk.length === 5) {
                    $('#confirmationMessage').text('Are you sure to delete data for NPK ' + npk + '?');
                    $('#deleteModal').modal('hide');
                    $('#confirmationModal').modal('show');
                } else {
                    alert('Please enter a valid NPK.');
                }
            });

            $('#deleteConfirmed').click(function() {
                var npk = $('#deleteNpk').val();
                $.ajax({
                    url: '{{ route("access.delete") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        npk: npk
                    },
                    success: function(response) {
                        $('#confirmationModal').modal('hide');
                        alert(response.message);
                    }
                });
            });
        });
    </script>
</body>
</html>
