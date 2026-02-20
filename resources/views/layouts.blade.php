<!DOCTYPE html>
<html>
<head>
    <title>Inactive User System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 vh-100" style="width:250px;">
        <h4 class="mb-4">Admin Panel</h4>

        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{route('dashboard')}}" class="nav-link text-white">
                    Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{route('settings')}}" class="nav-link text-white">
                    Settings
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>

</div>

</body>
</html>