<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect("localhost","root","","contact" );
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Perform any necessary data validation here...

    // Prepare the SQL statement
    $sql = "INSERT INTO contact (Name, Email, Message) VALUES (?, ?, ?)";
    
    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>