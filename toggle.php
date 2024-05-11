<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sliding Menu</title>
    <style>
        /* CSS for styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .menu {
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            width: 250px;
            height: 100%;
            background-color: #111;
            transition: left 0.3s ease;
            z-index: 999;
        }

        .menu ul {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        .menu ul li {
            padding: 15px;
            border-bottom: 1px solid #444;
        }

        .menu ul li:last-child {
            border-bottom: none;
        }

        .menu ul li a {
            color: #fff;
            text-decoration: none;
        }

        .menu-toggle {
            position: absolute;
            top: 15px;
            left: 15px;
            cursor: pointer;
        }

        /* Animation for menu toggle icon */
        .menu-toggle .bar {
            display: block;
            width: 25px;
            height: 3px;
            background-color: #fff;
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        .menu-toggle.open .bar:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.open .bar:first-child {
            transform: translateY(8px) rotate(45deg);
        }

        .menu-toggle.open .bar:last-child {
            transform: translateY(-8px) rotate(-45deg);
        }
    </style>
</head>
<body>
    <!-- Header with menu toggle -->
    <div class="header">
        <div class="menu-toggle" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>

    <!-- Side menu -->
    <div class="menu" id="menu">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>

    <script>
        // Function to toggle the menu visibility
        function toggleMenu() {
            var menu = document.getElementById('menu');
            var isOpen = menu.style.left === '0px';
            menu.style.left = isOpen ? '-250px' : '0';
            // Change toggle icon
            var toggleIcon = document.querySelector('.menu-toggle');
            toggleIcon.classList.toggle('open');
        }
    </script>
</body>
</html>
