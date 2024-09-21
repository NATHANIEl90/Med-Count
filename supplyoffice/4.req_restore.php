<?php
// Include your database configuration file
include("../config/config.php");

// Get the ID of the request from the URL parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to update the status of the request to "Pending" (or any status you'd prefer)
    $sql = "UPDATE supply_requests SET status = 'Pending' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the dashboard with a JavaScript alert for successful restoration
        echo "<script>
                alert('Item successfully restored!');
                window.location.href='index.php';
              </script>";
    } else {
        // Redirect back with a JavaScript alert for failed restoration
        echo "<script>
                alert('Failed to restore the item. Please try again.');
                window.location.href='index.php';
              </script>";
    }
} else {
    // Redirect back if no ID is provided
    echo "<script>
            alert('No ID was provided. Please try again.');
            window.location.href='index.php';
          </script>";
}
?>