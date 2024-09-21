<?php
include("../config/config.php");

if (isset($_GET['term'])) {
    $term = mysqli_real_escape_string($conn, $_GET['term']);
    
    // Query to fetch product names and unit of issue
    $query = "SELECT product_name, unit_of_issue FROM supply_office WHERE product_name LIKE '%$term%' LIMIT 10";
    $result = mysqli_query($conn, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'product_name' => $row['product_name'],
            'unit_of_issue' => $row['unit_of_issue']
        ];
    }
    
    echo json_encode($data);
}
?>
