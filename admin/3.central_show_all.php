<?php
include("../config/config.php");
$sql = "SELECT * FROM supply_requests WHERE types = 'central_supply' AND status = 'Approved' ORDER BY request_date ASC";
$result = $conn->query($sql);

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
        <td colspan="8">No items in inventory</td>
    </tr>
    <?php
}
?>