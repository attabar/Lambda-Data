<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sidebar {
  width: 250px; /* Set your desired sidebar width */
  transition: width 0.3s;
  background-color: red;
}

.main-content {
  margin-left: 250px; /* Adjust this margin to match the sidebar width */
  transition: margin-left 0.3s;
}
.sidebar.hidden {
  width: 0;
}

.main-content.expanded {
  margin-left: 0;
}

    </style>
</head>
<body>
    <div class="sidebar">

    </div>
    <div class="main-content">
        
    </div>
    <button class="toggle-button">Toggle Sidebar</button>

    <script>
        const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const toggleButton = document.querySelector('.toggle-button');

toggleButton.addEventListener('click', () => {
  sidebar.classList.toggle('hidden');
  mainContent.classList.toggle('expanded');
});

    </script>
</body>
</html>