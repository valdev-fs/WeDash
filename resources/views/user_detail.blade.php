<!DOCTYPE html>
<html>
<head>
    <title>User Detail</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>User Detail</h1>
        <div class="user-detail">
            <table id="userDetailTable">
                <thead>
                    <tr>
                        <th>Report Name</th>
                        <th>View Date</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/user_detail.js') }}"></script>
</body>
</html>
