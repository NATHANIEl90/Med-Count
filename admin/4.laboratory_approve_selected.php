<?php
include("../config/config.php");

if (isset($_POST['request_ids']) && !empty($_POST['request_ids'])) {
    // Sanitize and prepare IDs
    $ids = array_map('intval', $_POST['request_ids']); // Convert IDs to integers
    $ids_list = implode(',', $ids); // Create a comma-separated list

    $sql = "UPDATE supply_requests SET status = 'Admin Approved' WHERE id IN ($ids_list) AND types = 'laboratory'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg_admin=Selected requests have been approved.");
        exit;
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Error approving requests. Please try again.
              </div>';
    }
} else {
        echo '<div class="alert alert-warning" role="alert">
                No requests selected.
              </div>';
    }    

mysqli_close($conn);
?>
