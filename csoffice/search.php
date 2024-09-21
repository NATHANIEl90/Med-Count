<?php
include("../config/config.php");

$sql = "SELECT * FROM central_supply_office WHERE product_name LIKE ? OR product_num LIKE ? OR unit_of_issue LIKE ? OR batch_num LIKE ? OR `exp.date` LIKE ? OR unit_value LIKE ? OR onhand LIKE ? OR stock_bal LIKE ? ORDER BY product_name ASC";
$search = isset($_GET['search']) ? $_GET['search'] : '';    
$stmt = $conn->prepare($sql);
$searchParam = "%{$search}%";
$stmt->bind_param("ssssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td>
                <?php echo $row['product_name'] ?>
            </td>
            <td>
                <?php echo $row['product_num'] ?>
            </td>
            <td>
                <?php echo $row['unit_of_issue'] ?>
            </td>
            <td>
                <?php echo $row['batch_num'] ?>
            </td>
            <td>
                <?php echo $row['exp.date'] ?>
            </td>
            <td>
                <?php echo $row['unit_value'] ?>
            </td>
            <td>
                <?php echo $row['onhand'] ?>
            </td>
            <td>
                <?php echo $row['stock_bal'] ?>
            </td>
            <td>
                <a href="1.central_edit.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
            </td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="9">No results found</td>
    </tr>
    <?php
}
?>
