<?php
// Step 1: Connect to Database
$host = "localhost"; // Change if using a different host
$user = "root"; // Default XAMPP/WAMP MySQL username
$password = ""; // Default is empty for XAMPP/WAMP
$database = "lms_db"; // Database name

$conn = new mysqli($host, $user, $password, $database);

// Check if database connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = htmlspecialchars($_POST["name"]);
    $mobile = htmlspecialchars($_POST["mobile"]);
    $dob = $_POST["dob"];
    $pan_number = strtoupper(htmlspecialchars($_POST["pan_number"]));
    $pin_code = htmlspecialchars($_POST["pin_code"]);
    $employment_type = $_POST["employment_type"];

    // Validate required fields
    if (empty($name) || empty($mobile) || empty($dob) || empty($pan_number) || empty($pin_code) || empty($employment_type)) {
        echo "All fields are required!";
        exit;
    }

    // Check if Mobile Number is valid
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        echo "Invalid Mobile Number! Must be 10 digits.";
        exit;
    }

    // Check if PAN Number is valid (Format: ABCDE1234F)
    if (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/", $pan_number)) {
        echo "Invalid PAN Number!";
        exit;
    }

    // Step 3: Insert Data into Database
    $sql = "INSERT INTO leads (name, mobile, dob, pan_number, pin_code, employment_type) 
            VALUES ('$name', '$mobile', '$dob', '$pan_number', '$pin_code', '$employment_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Lead added successfully!";
        header("refresh:2;url=manage_leads.php"); // Redirect to manage leads page after 2 seconds
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
