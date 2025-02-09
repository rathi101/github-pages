
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ankit Team LMS</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <header>
            <h1>Ankit Team LMS</h1>
        </header>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Manage Sales Executives</a></li>
                <li><a href="#">Daily Targets</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
        <main>
            <h2>Sales Executive Details</h2>
            <table id="salesTable">
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Daily Target</th>
                    <th>Target Achieved</th>
                    <th>Actions</th>
                </tr>
            </table>
            <button onclick="addEntry()">Add Entry</button>
        </main>
    </div>
    <script src="./script.js"></script>
</body>
</html>
