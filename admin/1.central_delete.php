<?php
include("../config/config.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $delete_sql = "DELETE FROM central_supply_office WHERE id = $id";

    if (mysqli_query($conn, $delete_sql)) {
        echo 'Record deleted successfully.';
    } else {
        echo 'Unable to delete record. Please try again.';
    }
}
?>