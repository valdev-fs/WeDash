<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .error {
            color: red;
            display: none;
            margin-top: 5px;
        }

        .form-control.invalid {
            border-color: red;
        }

        .form-control.valid {
            border-color: green;
        }

        .card-custom {
            min-height: 300px;
            /* Set a minimum height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-custom .card-body {
            flex: 1;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            padding: 0;
            font-size: 18px;
            line-height: 1;
            border-radius: 50%;
            color: #fff;
            transition: background-color 0.3s;
            margin-right: 5px;
            /* Add some spacing between buttons */
        }

        .btn-icon.btn-edit {
            background-color: #17a2b8;
            /* Bootstrap info color */
        }

        .btn-icon.btn-delete {
            background-color: #dc3545;
            /* Bootstrap danger color */
        }

        .btn-icon:hover {
            opacity: 0.8;
        }

        .btn-icon .fas {
            margin-right: 0;
            /* Ensure no extra spacing */
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="container mt-5 mb-5">
        <h1 class="text-center page-title">User Management</h1>

        <div class="row">
            <!-- Change User Password Form on the left -->
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header">Change User Password</div>
                    <div class="card-body">
                        <form action="{{ route('user-management.changePassword') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="npk_password">NPK</label>
                                <input type="text" name="npk" id="npk_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                        @if (session('success') && session('action') == 'change-password')
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error') && session('action') == 'change-password')
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach (session('error') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Promote User to Admin Form on the right -->
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header">Promote User to Admin</div>
                    <div class="card-body">
                        <form action="{{ route('user-management.promote') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="npk_admin">NPK</label>
                                <input type="text" name="npk" id="npk_admin" class="form-control" required>
                            </div>
                            <!-- Add any additional fields necessary for promoting a user to admin -->
                            <button type="submit" class="btn btn-primary">Promote</button>
                        </form>
                        @if (session('success') && session('action') == 'promote')
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error') && session('action') == 'promote')
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach (session('error') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

       <!-- Department Management -->
<div class="row mt-5">
    <div class="col-md-6">
        <div class="card card-custom">
            <div class="card-header">Departments</div>
            <div class="card-body">
                <form action="{{ route('user-management.storeDepartment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="code_department">Department Code</label>
                        <input type="text" class="form-control" id="code_department" name="code_department" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="group">Group</label>
                        <select class="form-control" id="group" name="group" required>
                            <option value="HO">HO</option>
                            <option value="Cabang">Cabang</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <div class="card card-custom">
                    <div class="card-header">Existing Departments</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Department Code</th>
                                    <th>Description</th>
                                    <th>Group</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->code_department }}</td>
                                        <td>{{ $department->description }}</td>
                                        <td>{{ $department->group }}</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-info btn-icon btn-edit"
                                                data-id="{{ $department->id }}"
                                                data-code="{{ $department->code_department }}"
                                                data-description="{{ $department->description }}"
                                                data-group="{{ $department->group }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form
                                                action="{{ route('user-management.deleteDepartment', $department->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon btn-delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $departments->links('vendor.pagination.bootstrap-4') }}
                        <!-- Pagination links with custom view -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Department Modal -->
<div class="modal fade" id="editDepartmentModal" tabindex="-1" role="dialog"
aria-labelledby="editDepartmentModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editDepartmentModalLabel">Edit Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editDepartmentForm" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" id="edit_department_id">
                <div class="form-group">
                    <label for="edit_code_department">Department Code</label>
                    <input type="text" name="code_department" id="edit_code_department" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_description">Description</label>
                    <input type="text" name="description" id="edit_description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit_group">Group</label>
                    <select class="form-control" id="edit_group" name="group" required>
                        <option value="HO">HO</option>
                        <option value="Cabang">Cabang</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Department</button>
            </form>
        </div>
    </div>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                var id = $(this).data('id');
                var code = $(this).data('code');
                var description = $(this).data('description');
                var group = $(this).data('group');
                $('#edit_department_id').val(id);
                $('#edit_code_department').val(code);
                $('#edit_description').val(description);
                $('#edit_group').val(group);
                $('#editDepartmentModal').modal('show');
                $('#editDepartmentForm').attr('action', '/user-management/department/' + id);
            });
        });
    </script>
</body>

</html>
