<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prajwaldbl"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $vehicle_number = $conn->real_escape_string($_POST['vehicle-number']);
    $service_type = $conn->real_escape_string($_POST['service-type']);
    $preferred_date = $conn->real_escape_string($_POST['date']);
    $additional_notes = $conn->real_escape_string($_POST['message']);

    // Debugging: Check the values before proceeding with SQL execution
    // echo "Name: $name, Email: $email, Vehicle: $vehicle_number, Service: $service_type, Date: $preferred_date, Notes: $additional_notes";

    // Start a transaction to ensure data consistency
    $conn->begin_transaction();

    try {
        // Insert data into the first table - service_requests table
        $stmt1 = $conn->prepare("
            INSERT INTO service_requests (name, email, vehicle_number, service_type, preferred_date, additional_notes) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt1->bind_param("ssssss", $name, $email, $vehicle_number, $service_type, $preferred_date, $additional_notes);

        // Insert data into the second table - service_requests_1 table
        $stmt2 = $conn->prepare("
            INSERT INTO service_requests_1 (name, email, vehicle_number, service_type, preferred_date, additional_notes) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt2->bind_param("ssssss", $name, $email, $vehicle_number, $service_type, $preferred_date, $additional_notes);

        // Execute both statements
        if ($stmt1->execute() && $stmt2->execute()) {
            // Commit the transaction if both succeed
            $conn->commit();
            echo "<script>
                    alert('Service request submitted successfully!');
                    window.location.href = '../service-request.php';
                  </script>";
        } else {
            // If insert fails, throw an exception
            throw new Exception("Failed to insert data into one or both tables.");
        }

    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
        // Log the error for debugging
        error_log("Database Error: " . $e->getMessage());
        echo "<script>
                alert('your request has been sent to admin , let them approve your previous schedule request. Please try again.');
                window.location.href = '../service-request.php';
              </script>";
    }

    // Close statements
    $stmt1->close();
    $stmt2->close();
    $conn->close();
   
}
?>
