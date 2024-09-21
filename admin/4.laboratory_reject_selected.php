<?php
include("../config/config.php");

if (isset($_POST['request_ids']) && !empty($_POST['request_ids'])) {
    $ids = array_map('intval', $_POST['request_ids']);
    $ids_list = implode(',', $ids);

    $sql = "UPDATE supply_requests SET status = 'Rejected' WHERE id IN ($ids_list) AND types = 'laboratry'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Selected requests have been rejected.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error rejecting requests. Please try again.'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('No requests selected.'); window.location.href='index.php';</script>";
}

mysqli_close($conn);
?>
