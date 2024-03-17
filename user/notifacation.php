<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Notification Counter</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f4f4f4;
}

.notification-container {
    position: relative;
}

.notification-icon {
    position: relative;
    cursor: pointer;
    width: 30px;
    height: 30px;
    background-color: #3498db;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}

.notification-icon:hover {
    background-color: #2980b9;
}

#notification-count {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 14px;
    font-weight: bold;
}

.notification-content {
    display: none;
    position: absolute;
    top: 40px;
    right: 0;
    width: 200px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    padding: 10px;
    z-index: 1;
}

.notification-content ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.notification-content li {
    padding: 8px 0;
    border-bottom: 1px solid #ddd;
}

.notification-content li:last-child {
    border-bottom: none;
}

    </style>
</head>
<body>
    <div class="notification-container">
        <div id="notification-icon" class="notification-icon">
            <span id="notification-count">0</span>
        </div>
        <div class="notification-content">
            <!-- Your notification content goes here -->
            <!-- For example, a list of notifications -->
            <ul id="notification-list"></ul>
        </div>
    </div>
    <script src="script.js">
        document.addEventListener("DOMContentLoaded", function () {
    const notificationIcon = document.getElementById("notification-icon");
    const notificationContent = document.querySelector(".notification-content");
    const notificationCount = document.getElementById("notification-count");
    const notificationList = document.getElementById("notification-list");

    let count = 0;

    // Function to toggle the notification content visibility
    function toggleNotificationContent() {
        notificationContent.style.display = notificationContent.style.display === "block" ? "none" : "block";
    }

    // Function to update the notification count
    function updateNotificationCount() {
        notificationCount.textContent = count > 0 ? count : "";
    }

    // Function to add a new notification
    function addNotification(message) {
        const li = document.createElement("li");
        li.textContent = message;
        notificationList.appendChild(li);
    }

    // Simulate adding a new notification every 5 seconds for demonstration
    setInterval(function () {
        count++;
        updateNotificationCount();
        addNotification("New Notification " + count);
    }, 5000);

    // Event listener for the notification icon click
    notificationIcon.addEventListener("click", function () {
        toggleNotificationContent();
    });

    // Event listener to hide the notification content when clicking outside it
    document.addEventListener("click", function (event) {
        if (!notificationIcon.contains(event.target) && !notificationContent.contains(event.target)) {
            notificationContent.style.display = "none";
        }
    });
});



    </script>
</body>
</html>
