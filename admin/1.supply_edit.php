<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<?php
include("../config/config.php");
$sql = "SELECT * FROM supply_office";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
    <title>Supply Office</title>
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar nigga-->
        <aside id="sidebar">
            <!--content-->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="prmmhlogo.png" alt=""></a>
                </div>

                <div class="tabs-list">
                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            Edit Data
                        </li>
                        <li class="sidebar-item">
                            <a href="index.php" class="sidebar-link">
                                <i class="uil uil-arrow-left"></i>
                                Back to main dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <div class="main">
            <!-- Top header -->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
 
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                            <a href="#" class="theme-toggle">
                                <i class="uil uil-sun"></i>
                                <i class="uil uil-moon"></i>
                            </a>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="loogout.png" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Supply Office Dashboard</h4>
                    </div>
                    <div class="tab_item card border-0 crud-button" id="tab_items_11">
                        <div class="card-header">
                            <h5 class="card-title">
                                Edit Data
                            </h5>
                        </div>
                        <div class="card-body p-3" style="height: 1000px;">
                            <div class="container">
                                <div class="text-center mb-4">
                                    <h3>Edit Details</h3>
                                    <p>Press update to update the details</p>


                                    <?php
                                    include("../config/config.php");

                                        $id = $_GET['id'];
                                        $sql = "SELECT * FROM supply_office WHERE id = $id";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);

                                        
                                        
                                        if (isset($_POST['update'])) {
                                            $product_name = $_POST['product_name'];
                                            $product_num = $_POST['product_num'];
                                            $unit_of_issue = $_POST['unit_of_issue'];
                                            $batch_num = $_POST['batch_num'];
                                            $exp_date = $_POST['exp_date'];
                                            $unit_value = $_POST['unit_value'];
                                            $onhand = $_POST['onhand'];
                                            $stock_bal = $_POST['stock_bal'];
                                        
                                            $update_sql = "UPDATE supply_office SET 
                                                product_name='" . mysqli_real_escape_string($conn, $product_name) . "', 
                                                product_num='" . mysqli_real_escape_string($conn, $product_num) . "', 
                                                unit_of_issue='" . mysqli_real_escape_string($conn, $unit_of_issue) . "', 
                                                batch_num='" . mysqli_real_escape_string($conn, $batch_num) . "', 
                                                `exp.date`='" . mysqli_real_escape_string($conn, $exp_date) . "',
                                                unit_value='" . mysqli_real_escape_string($conn, $unit_value) . "', 
                                                onhand='" . mysqli_real_escape_string($conn, $onhand) . "',
                                                stock_bal='" . mysqli_real_escape_string($conn, $stock_bal) . "'
                                                WHERE id = $id";
                                        
                                            if (mysqli_query($conn, $update_sql)) {
                                                echo '<div class="alert alert-success" role="alert">
                                                        Data updated successfully.
                                                      </div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">
                                                        Unable to update data. Please check your inputs.
                                                      </div>';
                                            }
                                        }
                                        ?>
                                </div>
                                    </div>

                                <div class="">
                                    <form class="justify-content-start allign-items-center" action="" method="post" enctype="multipart/form-data">

                                        <div class="column">
                                            <div class="col">
                                                <label class="form-label">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name'] ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Product Number</label>
                                                <input type="text" class="form-control" name="product_num" value="<?php echo $row['product_num'] ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Unit Of Issue</label>
                                                <input type="text" class="form-control" name="unit_of_issue" value="<?php echo $row['unit_of_issue'] ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Batch Number</label>
                                                <input type="text" class="form-control" name="batch_num" value="<?php echo $row['batch_num'] ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Expiry Date</label>
                                                <input type="date" class="form-control" name="exp_date" value="<?php echo $row['exp.date'] ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Unit Value</label>
                                                <input type="text" class="form-control" name="unit_value" value="<?php echo $row['unit_value'] ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">OnHand</label>
                                                <input type="text" class="form-control" name="onhand" value="<?php echo $row['onhand'] ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Stock Balance</label>
                                                <input type="text" class="form-control" name="stock_bal" value="<?php echo $row['stock_bal'] ?>">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success" name="update">UPDATE</button> 
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">DELETE</button>
                                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                                                <input type="hidden" id="delete_id" name="delete_id" value="<?php echo $id; ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                        </div>
                    </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>President Ramon Magsaysay Memorial Hospital</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="last-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>


</body>

</html>