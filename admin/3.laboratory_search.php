<?php
    include("../config/config.php");
    
    $search = isset($_GET['search']) ? $_GET['search'] : '';    
    $searchParam = "%{$search}%";
    
    $sql = "SELECT * FROM supply_requests WHERE types = 'laboratory' AND status = 'Approved' AND (product_name LIKE ? OR unit_of_issue LIKE ? OR DATE_FORMAT(request_date, '%Y-%m-%d') LIKE ?) ORDER BY request_date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <tr>
            <td><input type="checkbox" name="request_ids[]" value="<?php echo $row['id']; ?>"></td>
            <td><?php echo $row['product_name'] ?></td>
            <td><?php echo $row['requested_quantity'] ?></td>
            <td><?php echo $row['unit_of_issue'] ?></td>
            <td><?php echo $row['onhand'] ?></td> <!-- Assuming 'onhand' is a column in your DB -->
            <td><?php echo $row['warehouse'] ?></td> <!-- Assuming 'warehouse' is a column in your DB -->
            <td><?php echo $row['approvedqty'] ?></td> <!-- Assuming 'approvedqty' is a column in your DB -->
            <td><?php echo $row['status'] ?></td>
            <td><?php echo $row['request_date'] ?></td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="8">No results found</td>
        </tr>
        <?php
    }
    ?>
