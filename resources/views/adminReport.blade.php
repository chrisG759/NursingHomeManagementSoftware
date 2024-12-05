 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Report</title>
   <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #343a40;
}

header {
    background-color: #007bff;
    color: white;
    padding: 1rem 0;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

main {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 1rem;
}

#filter-section {
    background: #ffffff;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

#filter-section h2 {
    margin-bottom: 1rem;
    color: #495057;
}

form label {
    font-size: 0.9rem;
    margin-top: 1rem;
    display: block;
    font-weight: bold;
    color: #495057;
}

form input, form select {
    width: 100%;
    padding: 0.7rem;
    margin-top: 0.3rem;
    border: 1px solid #ced4da;
    border-radius: 4px;
    font-size: 1rem;
}

form button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.7rem 1.5rem;
    font-size: 1rem;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 1rem;
}

form button:hover {
    background-color: #0056b3;
}

#report {
    background: #ffffff;
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#report h2 {
    margin-bottom: 1rem;
    color: #495057;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
    font-size: 1rem;
}

table th, table td {
    text-align: left;
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
}

table th {
    background-color: #f1f3f5;
    color: #495057;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.05rem;
}

table tbody tr:hover {
    background-color: #f8f9fa;
    transition: background-color 0.2s;
}

table tbody tr:last-child td {
    border-bottom: none;
}

.badge {
    display: inline-block;
    padding: 0.3rem 0.8rem;
    border-radius: 12px;
    color: white;
    font-size: 0.9rem;
    text-align: center;
}

.badge.completed {
    background-color: #28a745; /* Green */
}

.badge.pending {
    background-color: #ffc107; /* Yellow */
}

.badge.overdue {
    background-color: #dc3545; /* Red */
}

@media (max-width: 768px) {
    form label, form input, form select, form button {
        font-size: 0.9rem;
    }

    table th, table td {
        font-size: 0.9rem;
        padding: 0.5rem;
    }
}
   </style>
</head>
<body>
    <header>
        <h1>Admin's Report</h1>
    </header>
    <main>
        <section id="filter-section">
            <h2>Filters</h2>
            <form id="filter-form">
                <label for="caregiver">Caregiver:</label>
                <select id="caregiver">
                    <option value="">All</option>
                    <option value="John">John</option>
                    <option value="Jane">Jane</option>
                </select>
                <label for="date-range">Date Range:</label>
                <input type="date" id="date-range" required>
                <button type="submit" class="btn">Filter</button>
            </form>
        </section>
        <section id="report">
            <h2>Report Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Caregiver</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jane Doe</td>
                        <td>John</td>
                        <td>2024-11-01</td>
                        <td><span class="badge completed">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script>
        /* add scripting if needed */
    </script>
</body>
</html>
