<?php
// Step 1: Connect to Database
$host = "localhost";
$user = "root";
$password = "";
$database = "lms_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $mobile = htmlspecialchars($_POST["mobile"]);
    $dob = $_POST["dob"];
    $pan_number = strtoupper(htmlspecialchars($_POST["pan_number"]));
    $pin_code = htmlspecialchars($_POST["pin_code"]);
    $employment_type = $_POST["employment_type"];

    // Validate fields
    if (empty($name) || empty($mobile) || empty($dob) || empty($pan_number) || empty($pin_code) || empty($employment_type)) {
        echo "All fields are required!";
        exit;
    }

    // Insert into MySQL database
    $sql = "INSERT INTO leads (name, mobile, dob, pan_number, pin_code, employment_type) 
            VALUES ('$name', '$mobile', '$dob', '$pan_number', '$pin_code', '$employment_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Lead added successfully!";
        header("refresh:2;url=manage_leads.php"); // Redirect after 2 seconds
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
