<?php
include("../config/config.php"); // Ensure this path is correct for your config file

// Check if the 'id' GET parameter is set and is a valid number
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare a DELETE statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM supply_requests WHERE id = ?");
    $stmt->bind_param("i", $id); // 'i' specifies the variable type 'integer'

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If the delete is successful, redirect to the dashboard with a success message
        echo "<script>
                alert('Item permanently deleted!');
                window.location.href='index.php';
              </script>";
    } else {
        // If the delete fails, redirect back with an error message
        echo "<script>
                alert('Failed to delete the item permanently. Please try again.');
                window.location.href='index.php';
              </script>";
    }

    // Close statement
    $stmt->close();
} else {
    // If no ID is provided, redirect back with an error message
    echo "<script>
            alert('No ID was provided. Please try again.');
            window.location.href='index.php';
          </script>";
}

// Close connection
$conn->close();
?>
