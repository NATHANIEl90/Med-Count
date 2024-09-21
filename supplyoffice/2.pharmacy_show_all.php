<?php
include("../config/config.php");

$sql = "SELECT * FROM supply_requests WHERE types = 'pharmacy' ORDER BY request_date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['product_name'] ?></td>
            <td><?php echo $row['requested_quantity'] ?></td>
            <td><?php echo $row['unit_of_issue'] ?></td>
            <td><?php echo $row['onhand'] ?></td> <!-- Assuming 'onhand' is a column in your DB -->
            <td><?php echo $row['warehouse'] ?></td> <!-- Assuming 'warehouse' is a column in your DB -->
            <td><?php echo $row['approvedqty'] ?></td> <!-- Assuming 'approvedqty' is a column in your DB -->
            <td><?php echo $row['status'] ?></td>
            <td><?php echo $row['request_date'] ?></td>
            <td>
                <a href="2.pharmacy_edit.php?types=pharmacy&id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
            </td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="9">No items in inventory</td>
    </tr>
    <?php
}
?>
