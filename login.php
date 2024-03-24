<?php

//log out is done in this secion instead of making a separate file for it.
if(isset($_GET["log"]) && $_GET["log"] == "out"){
    echo"okey";
    // Redirect to a dashboard or home page
    session_start();
    session_destroy();
    header("Location: index.php");
    exit();
}


// Database configuration
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$dbName = 'innohub'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Basic validation (you may add more robust validation as needed)
    if (empty($email) || empty($password)) {
        echo "Email and password are required.";
    } else {
        // Sanitize input data (prevent SQL injection)
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        // Query to check if the email and password match in the database
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            // Verify password using PHP's password_verify function
            if ($password == $hashedPassword) {
                // Start a session
                session_start();

                // Store user data in session variables
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];

                echo "<span style='color:lightgreen;'>Login successful. Welcome, " . $row['name'] . "!</span>";
                exit();
            } else {
                echo "Incorrect email or password.";
            }
        } else {
            echo "User not found.";
        }
    }
}

$conn->close();
?>
