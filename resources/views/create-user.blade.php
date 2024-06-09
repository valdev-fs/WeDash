<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
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
    </style>
</head>
<body>
    @include('layouts.navbar')

    <div class="full-page-container">
        <div class="create-user-container">
            <div class="create-user-card">
                <h2>Create User</h2>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="createUserForm" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="npk">NPK</label>
                        <input type="text" class="form-control" id="npk" name="npk" maxlength="5" required pattern="\d{5}" title="NPK must be exactly 5 digits" value="{{ old('npk') }}">
                        <span id="npkError" class="error">NPK must be exactly 5 digits.</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <span id="passwordError" class="error">Passwords do not match.</span>
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="department" required>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department') == $department->id ? 'selected' : '' }}>{{ $department->code_department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_admin">Set as Admin</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#npk').on('input', function() {
                var npk = $(this).val();
                if (!/^\d{0,5}$/.test(npk)) {
                    $(this).val(npk.replace(/\D/g, ''));
                }
                validateNpk();
            });

            $('#password, #password_confirmation').on('input', function() {
                validatePasswords();
            });

            $('#createUserForm').on('submit', function(e) {
                if (!validateNpk() || !validatePasswords()) {
                    e.preventDefault();
                    alert('Please fix the errors before submitting the form.');
                }
            });

            function validateNpk() {
                var npk = $('#npk').val();
                if (npk.length !== 5) {
                    $('#npk').addClass('invalid').removeClass('valid');
                    $('#npkError').show();
                    return false;
                } else {
                    $('#npk').removeClass('invalid').addClass('valid');
                    $('#npkError').hide();
                    return true;
                }
            }

            function validatePasswords() {
                var password = $('#password').val();
                var confirmPassword = $('#password_confirmation').val();
                if (password !== confirmPassword) {
                    $('#password, #password_confirmation').addClass('invalid').removeClass('valid');
                    $('#passwordError').show();
                    return false;
                } else {
                    $('#password, #password_confirmation').removeClass('invalid').addClass('valid');
                    $('#passwordError').hide();
                    return true;
                }
            }
        });
    </script>
</body>
</html>
