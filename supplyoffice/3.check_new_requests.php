<?php
include("../config/config.php");

$pharmacy_sql = "SELECT COUNT(*) as pharmacy_requests FROM supply_requests WHERE types = 'pharmacy' AND status IN ('Approved', 'Pending', 'Admin Approved')";
$laboratory_sql = "SELECT COUNT(*) as laboratory_requests FROM supply_requests WHERE types = 'laboratory' AND status IN ('Approved', 'Pending', 'Admin Approved')";
$central_sql = "SELECT COUNT(*) as central_requests FROM supply_requests WHERE types = 'central_supply' AND status IN ('Approved', 'Pending', 'Admin Approved')";

$pharmacy_result = mysqli_query($conn, $pharmacy_sql);
$laboratory_result = mysqli_query($conn, $laboratory_sql);
$central_result = mysqli_query($conn, $central_sql);

$pharmacy_requests = 0;
$laboratory_requests = 0;
$central_requests = 0;

if ($pharmacy_result) {
    $row = mysqli_fetch_assoc($pharmacy_result);
    $pharmacy_requests = $row['pharmacy_requests'];
}

if ($laboratory_result) {
    $row = mysqli_fetch_assoc($laboratory_result);
    $laboratory_requests = $row['laboratory_requests'];
}

if ($central_result) {
    $row = mysqli_fetch_assoc($central_result);
    $central_requests = $row['central_requests'];
}

$total_requests = $pharmacy_requests + $laboratory_requests + $central_requests;

header('Content-Type: application/json');
echo json_encode([
    'pharmacy_requests' => $pharmacy_requests,
    'laboratory_requests' => $laboratory_requests,
    'central_requests' => $central_requests,
    'total_requests' => $total_requests
]);
?>
