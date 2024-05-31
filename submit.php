<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vinzo1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO grievances1 (name, register_number, course_name, mobile, email, address, id_card_filename, grievance_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $register_number, $course_name, $mobile, $email, $address, $id_card_filename, $grievance_type);

    // Set parameters and execute
    $name = $_POST['name'];
    $register_number = $_POST['registerNumber'];
    $course_name = $_POST['cname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $id_card_filename = $_FILES['idCard']['name'];
    $grievance_type = $_POST['grievance'];

    // Move uploaded file to the desired location
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["idCard"]["name"]);
    if (move_uploaded_file($_FILES["idCard"]["tmp_name"], $target_file)) {
        // Execute prepared statement
        if ($stmt->execute()) {
            // Store register number in session
            $_SESSION['register_number'] = $register_number;

            // Redirect to a new page after form submission
            header("Location: t.php");
            exit; // Ensure that subsequent code is not executed after redirection
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
