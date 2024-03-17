<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Custom CSS for sidebar -->
     <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ffffff;
            display: block;
        }
        .sidebar a:hover {
            background-color: #adb5bd;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#">Dashboard</a>
        <a href="#">Top-Up History</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
    </div>

    <!-- Page Content -->
    <div class="content">
        <!-- Navbar  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="bi bi-list"></i>
            </button>
            <span class="navbar-brand">Admin Dashboard</span>
        </div>
    </nav>
        <!-- Main content -->
    <div class="container">
        <!-- Your content goes here -->
        <h1>Welcome to the Admin Dashboard</h1>
    </div>
    </div>

    Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
