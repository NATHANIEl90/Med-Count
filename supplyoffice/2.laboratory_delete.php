<?php
include("../config/config.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $delete_sql = "DELETE FROM supply_requests WHERE id = ?"; // Ensure the table name is correct

    // Prepare statement
    if ($stmt = mysqli_prepare($conn, $delete_sql)) {
        // Bind the integer parameter for the marker
        mysqli_stmt_bind_param($stmt, "s", $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo 'Record deleted successfully.';
        } else {
            echo 'Unable to delete record. Please try again.';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo 'Unable to prepare statement. Please check your query.';
    }
} else {
    echo 'ID not set. Please check your input.';
}
?>
