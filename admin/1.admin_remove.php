<?php
include "../config/config.php";
$id = $_GET['id'];
$sql = "DELETE FROM tbusers WHERE id = $id";
$result = mysqli_query($con, $sql);
if($result){
    header("Location: index.php?msg_admin=Record Deleted Successfully");
} else {
    echo "Failed:" . mysqli_error($con);
}
?>