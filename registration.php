<?php
// Database configuration
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$dbName = 'innohub'; // Database name
$msg = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    $msg .= "<br>" . "Connection failed: " . $conn->connect_error;
}



// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['uname']; // Make sure this matches your form's input name for username
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];
    $error_counter = 0;

    // Basic validation
    if (empty($name) || empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword) || empty($gender)) {
        $msg .= "<br>" . "All fields are required.";
        $error_counter++;
    }

    if ($password !== $confirmPassword) {
        $msg .= "<br>" . "Passwords do not match.";
        $error_counter++;
    }

    // Additional validation

    // Name validation (only letters, spaces, and dashes allowed)
    if (!preg_match("/^[a-zA-Z\- ]+$/", $name)) {
        $msg .= "<br>" . "Invalid characters in the name field.";
        $error_counter++;
    }

    // Username validation (letters, numbers, and underscores allowed)
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $msg .= "<br>" . "Invalid characters in the username field.";
        $error_counter++;
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg .= "<br>" . "Invalid email format.";
        $error_counter++;
    }

    // Phone number validation (basic example, you can enhance it further)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $msg .= "<br>" . "Invalid phone number format.";
        $error_counter++;
    }

    // Gender validation
    if ($gender !== 'male' && $gender !== 'female') {
        $msg .= "<br>" . "Invalid gender.";
        $error_counter++;
    }

    if ($error_counter == 0) {
        // Password hashing (use a more secure method like password_hash)
        $hashedPassword = md5($password);

        // Prepare statement to insert data
        $stmt = $conn->prepare("INSERT INTO users (name, username, email, phone, password, gender) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $username, $email, $phone, $hashedPassword, $gender);

        // Execute statement
        if ($stmt->execute()) {
            $msg .= "<br>" . "Registration successful.";
        } else {
            $msg .= "<br>" . "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

echo $msg;
$conn->close();
?>
