<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Access Level</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
}

header {
    background: #007BFF;
    color: white;
    padding: 1rem;
    text-align: center;
}

h1, h2 {
    margin: 0.5rem 0;
}

main {
    padding: 1rem 2rem;
}

form {
    margin-bottom: 1rem;
}

form label {
    display: block;
    margin: 0.5rem 0 0.2rem;
}

form input {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.btn {
    background: #007BFF;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    border-radius: 4px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

table th, table td {
    padding: 0.8rem;
    text-align: left;
    border: 1px solid #ddd;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

button {
    padding: 0.3rem 0.7rem;
    margin: 0.2rem;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

    </style>
</head>
<body>
    <header>
        <h1>Role Access Level</h1>
    </header>
    <main>
        <section id="role-form">
            <h2>Add New Role</h2>
            <form id="role-access-form">
                <label for="role-name">Role:</label>
                <input type="text" id="role-name" placeholder="Enter Role Name" required>
                <label for="access-level">Access Level (1-6):</label>
                <input type="number" id="access-level" min="1" max="6" required>
                <button type="submit" class="btn">Add Role</button>
            </form>
        </section>
        <section id="role-list">
            <h2>Roles List</h2>
            <table id="role-table">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Access Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- add news rows if needed -->
                </tbody>
            </table>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const roleForm = document.getElementById("role-access-form");
    const roleTableBody = document.querySelector("#role-table tbody");

    // Handle form submission
    roleForm.addEventListener("submit", (e) => {
        e.preventDefault();
        
        const roleName = document.getElementById("role-name").value;
        const accessLevel = document.getElementById("access-level").value;

        // Add new row to table
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${roleName}</td>
            <td>${accessLevel}</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
        `;

        roleTableBody.appendChild(newRow);

        // Clear the form
        roleForm.reset();
    });

    // Handle row actions
    roleTableBody.addEventListener("click", (e) => {
        if (e.target.classList.contains("delete-btn")) {
            e.target.closest("tr").remove();
        }
        if (e.target.classList.contains("edit-btn")) {
            alert("Edit functionality to be added!");
        }
    });
});

    </script>
</body>
</html>
