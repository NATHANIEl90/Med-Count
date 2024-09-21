<?php
include("../config/config.php");

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE supply_office SET status = NULL WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Item successfully restored!');
                window.location.href='index.php';  // Adjust the redirection to your dashboard or relevant page
              </script>";
    } else {
        echo "<script>
                alert('Failed to restore the item. Please try again.');
                window.location.href='index.php';  // Redirect back to a relevant page
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('No ID was provided. Please try again.');
            window.location.href='index.php';  // Redirect back to a relevant
          </script>";
}

$conn->close();
?>
