document.addEventListener("DOMContentLoaded", function() {
    fetch("./assets/php/users.php")
    .then(response => {
        if (!response.ok) {
            throw new Error("Sending request was not okay");
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const users = data.users;
            let table = '<table border="1">';
            table += `
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            `;
            for (let i = 0; i < users.length; i++) {
                table += `
                    <tr>
                        <td>${users[i].id}</td>
                        <td>${users[i].fname}</td>
                        <td>${users[i].lname}</td>
                        <td>${users[i].username}</td>
                        <td>${users[i].email}</td>
                        <td>${users[i].phone}</td>
                    </tr>
                `;
            }
            table += '</table>';
            document.getElementById("users-table").innerHTML = table;
        } else {
            console.error(data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});