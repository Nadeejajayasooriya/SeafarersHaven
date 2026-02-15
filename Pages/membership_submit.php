<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty
$dbname = "seafarer"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$title = $_POST['title'];
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$country = $_POST['country'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$marital_status = $_POST['marital'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$skype = $_POST['skype'];
$facebook = $_POST['facebook'];
$other = $_POST['other'];
$company = $_POST['company'];
$rank = $_POST['rank'];
$date = $_POST['date'];
$signature = $_POST['signature'];

// Prepare and bind the SQL statement
$sql = "INSERT INTO members (title, fullname, dob, country, gender, age, marital_status, address, postcode, phone, email, mobile, skype, facebook, other, company, rank, date, signature) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssiissssssssssss", $title, $fullname, $dob, $country, $gender, $age, $marital_status, $address, $postcode, $phone, $email, $mobile, $skype, $facebook, $other, $company, $rank, $date, $signature);

// Execute the statement and check if successful
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
