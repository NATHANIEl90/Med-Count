<?php 
include("../config/config.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Update the record's status to 'Deleted' instead of deleting it
    $update_sql = "UPDATE supply_office  SET status = 'Deleted' WHERE id = ?";

    // Prepare statement
    if ($stmt = mysqli_prepare($conn, $update_sql)) {
        // Bind the integer parameter for the marker
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo 'Record marked as deleted successfully.';
        } else {
            echo 'Unable to mark record as deleted. Please try again.';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo 'Unable to prepare statement. Please check your query.';
    }
}
?>
