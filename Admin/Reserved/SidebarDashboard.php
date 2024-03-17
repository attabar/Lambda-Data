<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
}

.sidebar {
    height: 100vh;
    width: 250px;
    background-color: #111;
    padding-top: 20px;
    color: white;
}

.sidebar h2 {
    text-align: center;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.sidebar li {
    padding: 8px;
    text-align: center;
}

.sidebar a {
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: block;
    transition: 0.1s;
}

.sidebar a:hover {
    background-color: #575757;
}

.content {
    flex-grow: 1;
    padding: 0px;
}

.navbar {
    background-color: #333;
    padding: 15px;
    color: white;
    display: flex;
    justify-content: space-between;
}

.open-btn {
    background-color: #333;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

.main-content {
    padding: 20px;
}

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="navbar">
            <button class="open-btn" onclick="toggleSidebar()">☰ Open Sidebar</button>
            <h1>Dashboard</h1>
        </div>

        <div class="main-content">
            <!-- Your main content goes here -->
            jhfhvufdhvujbdfhbv duvlfb ybfuydhv bydfugb uydfbyudfh
            <p>Welcome to the dashboard!</p>
        </div>
    </div>
</div>

<script src="script.js"></script>
<script>
    function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    sidebar.style.width = sidebar.style.width === '250px' ? '0' : '250px';

    var content = document.querySelector('.content');
    content.style.marginLeft = content.style.marginLeft === '250px' ? '0' : '250px';
}

</script>
</body>
</html>
