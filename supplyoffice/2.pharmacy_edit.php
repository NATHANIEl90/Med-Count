    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <?php
    include("../config/config.php");
    $sql = "SELECT * FROM supply_requests WHERE types ='pharmacy' ";
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
                                            if (isset($_GET['id']) && isset($_GET['types'])) {
                                                $id = $_GET['id'];
                                                $types = $_GET['types'];
                                                
                                                $sql = "SELECT * FROM supply_requests WHERE id = ? AND types = ?";
                                                $stmt = mysqli_prepare($conn, $sql);
                                                mysqli_stmt_bind_param($stmt, "is", $id, $types);
                                                mysqli_stmt_execute($stmt);
                                                $result = mysqli_stmt_get_result($stmt);
                                                $row = mysqli_fetch_assoc($result);
                                                
                                                
                                                    // Initialize variables with default values
                                                $product_name = '';
                                                $quantity = '';
                                                $unit_of_issue = '';
                                                $status = '';
                                                $onhand = '';
                                                $warehouse = '';
                                                $approvedqty = '';


                                                if ($row) {
                                                    // Assign values if the query returns data
                                                    $product_name = $row['product_name'] ?? '';
                                                    $quantity = $row['requested_quantity'] ?? '';
                                                    $unit_of_issue = $row['unit_of_issue'] ?? '';
                                                    $onhand = $row['onhand']?? '';
                                                    $warehouse = $row['warehouse']?? '';
                                                    $approvedqty = $row['approvedqty']?? '';
                                                    $status = $row['status'] ?? '';
                                                
                                            
                                                } else {
                                                    echo "<div class='alert alert-danger'>No data found for the provided type.</div>";
                                                }        

                                                if (isset($_POST['update'])) {
                                                    $product_name = $_POST['product_name'];
                                                    $quantity = $_POST['requested_quantity'];
                                                    $unit_of_issue = $_POST['unit_of_issue'];
                                                    $onhand = $_POST['onhand'];
                                                    $warehouse = $_POST['warehouse'];
                                                    $approvedqty = $_POST['approvedqty'];
                                                    $status = $_POST['status'];


                                                    $update_sql = "UPDATE supply_requests SET 
                                                        product_name='" . mysqli_real_escape_string($conn, $product_name) . "', 
                                                        requested_quantity='" . mysqli_real_escape_string($conn, $quantity) . "', 
                                                        unit_of_issue='" . mysqli_real_escape_string($conn, $unit_of_issue) . "', 
                                                        onhand='" . mysqli_real_escape_string($conn, $onhand) . "', 
                                                        warehouse='" . mysqli_real_escape_string($conn, $warehouse) . "', 
                                                        approvedqty='" . mysqli_real_escape_string($conn, $approvedqty) . "',  
                                                        status='" . mysqli_real_escape_string($conn, $status) . "'
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
                                                
                                            } else {
                                                echo "<div class='alert alert-danger'>Invalid request.</div>";
                                                exit();
                                            }
                                        
                                        ?>
                                    </div>
                                        </div>

                                    <div class="">
                                    <form class="justify-content-start allign-items-center" action="" method="post" enctype="multipart/form-data">
                                        <div class="column">
                                            <div class="col">
                                                <label class="form-label">Product Name</label>
                                                <input type="text" class="form-control" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Quantity</label>
                                                <input type="text" class="form-control" name="requested_quantity" value="<?php echo htmlspecialchars($quantity); ?>">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Unit Of Issue</label>
                                                <input type="text" class="form-control" name="unit_of_issue" value="<?php echo htmlspecialchars($unit_of_issue); ?>">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Onhand</label>
                                                <input type="text" class="form-control" name="onhand" value="<?php echo htmlspecialchars($onhand); ?>">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Warehouse</label>
                                                <input type="text" class="form-control" name="warehouse" value="<?php echo htmlspecialchars($warehouse); ?>">
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Approved Quantity</label>
                                                <input type="text" class="form-control" name="approvedqty" value="<?php echo htmlspecialchars($approvedqty); ?>">
                                            </div>

                                            <div class="col">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                                <option value="Approved" <?php echo ($row['status'] == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                                <option value="Reject" <?php echo ($row['status'] == 'Rejected') ? 'selected' : ''; ?>>Reject</option>
                                            </select>
                                            </div>

                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success" name="update">UPDATE</button> 
                                                <button type="button" class="btn btn-danger" onclick="PconfirmDelete(<?php echo $id; ?>)">DELETE</button>
                                                <a href="index.php" class="btn btn-secondary">Cancel</a>
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