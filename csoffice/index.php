<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

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
    <title>Central Supply Office</title>
</head>

<body>
    <div class="wrapper">

        <!-- sidebar -->
        <aside id="sidebar">
            <!--content-->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="prmmhlogo.png" alt=""></a>
                </div>

                <div class="tabs-list">
                    <ul class="sidebar-nav nav-pills">
                        <li class="sidebar-item test_3 active" data-tc="tab_items_9">
                            <a href="javascript:void(0);" onclick="resetWebsite(event)" class="sidebar-link">
                                <i class="uil uil-list-ul pe-2"></i>
                                Dashboard
                            </a>
                        </li>

                        <!--First main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed hover-me" id="v-pills-home-tab" data-toggle="pill"
                                data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                                <i class="uil uil-file folder-open"></i>
                                Inventory
                            </a>
                            <ul id="pages" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_1">
                                    <a class="sidebar-link"><i class="uil uil-capsule"> </i>Central Supply Office</a>
                                </li>
                            </ul>
                        </li>
                        <!--Second main side Menu-->
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse"
                                aria-expanded="false">
                                <i class="uil uil-atom"></i>
                                Request
                            </a>
                            <ul id="multi" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_4">
                                    <a class="sidebar-link"><i class="uil uil-capsule"> </i>Central Supply Office</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item test_3" data-tc="tab_7">
                            <a href="#" class="sidebar-link collapsed hover-me" aria-expanded="false">
                                <i class="uil uil-book-open"></i>
                                Reports
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
                        <a href="#" class="theme-toggle pl-3">
                            <i class="uil uil-sun"></i>
                            <i class="uil uil-moon"></i>
                        </a>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="loogout.png" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                    </div>

                    <!-- miming box areas -->
                    <div class="tab_item row" id="tab_items_9">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                            <h4>Welcome Back,
                                                <?php echo $_SESSION['user_fullname']; ?>
                                            </h4>
                                                <p class="mb-0">How's your day?</p>
                                            </div>
                                        </div>
                                        <div class="col-6 alig-self-end text-end">
                                            <img src="doctor.jpg" class="img-fluid illustration-img rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h1 id="current-time-1">
                                                12:00:00
                                            </h1>
                                            <div class="qoutes">
                                                <h4 id="current-date-1"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Supply Office-->
                    <div class="tab_item card border-0" id="tab_1" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                            Central Supply Office Inventory
                                <a href="1.central_add.php" class="btn btn-primary">New Item</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="searchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="showAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="centralTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Product Number</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Batch Number</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Unit Value</th>
                                        <th scope="col">OnHand</th>
                                        <th scope="col">Stock Balance</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT * FROM central_supply_office ORDER BY product_name ASC";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['product_num'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['batch_num'] ?></td>
                                                <td><?php echo $row['exp.date'] ?></td>
                                                <td><?php echo $row['unit_value'] ?></td>
                                                <td><?php echo $row['onhand'] ?></td>
                                                <td><?php echo $row['stock_bal'] ?></td>
                                                <td>
                                                    <a href="1.central_edit.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                                        <!--Supply Office-->
                    <div class="tab_item card border-0" id="tab_6" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                            Central Supply Office Inventory
                                <a href="1.central_add.php" class="btn btn-primary">New Item</a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="searchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="showAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="centralTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Product Number</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Batch Number</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Unit Value</th>
                                        <th scope="col">OnHand</th>
                                        <th scope="col">Stock Balance</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT * FROM central_supply_office ORDER BY product_name ASC";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['product_num'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['batch_num'] ?></td>
                                                <td><?php echo $row['exp.date'] ?></td>
                                                <td><?php echo $row['unit_value'] ?></td>
                                                <td><?php echo $row['onhand'] ?></td>
                                                <td><?php echo $row['stock_bal'] ?></td>
                                                <td>
                                                    <a href="1.central_edit.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="tab_item card border-0" id="tab_4" style="display: none;">
                    <div class="card-header">
                        <h5 class="card-title d-flex justify-content-between fs-3">
                            Request</h5>
                        </h5>
                    </div>
                    <div class="card-body p-3" style="height: 800px;">
                        <div class="container">
                            <div class="text-center mb-4">
                                <h3>Request for new Item</h3>
                                <p>Complete the Form below to request a new item</p>
                                <?php
                                    include("../config/config.php"); // Ensure the path is correct

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_request'])) {
                                        $requested_quantities = $_POST['requested_quantity'];
                                        $unit_of_issues = $_POST['unit_of_issue'];
                                        $product_names = $_POST['product_name'];
                                        $all_inserts_successful = true;

                                        for ($i = 0; $i < count($product_names); $i++) {
                                            $requested_quantity = mysqli_real_escape_string($conn, $requested_quantities[$i]);
                                            $unit_of_issue = mysqli_real_escape_string($conn, $unit_of_issues[$i]);
                                            $product_name = mysqli_real_escape_string($conn, $product_names[$i]);

                                            $insert_request_query = "INSERT INTO supply_requests (requested_quantity, unit_of_issue, product_name, types) 
                                                                    VALUES ('$requested_quantity', '$unit_of_issue', '$product_name', 'central_supply_office')";
                                                if (!mysqli_query($conn, $insert_request_query)) {
                                                    $all_inserts_successful = false;
                                                    break; // Stop the loop if an insert fails
                                                }
                                            }
                                            if ($all_inserts_successful) {
                                                echo '<div class="alert alert-success" role="alert">Requests sent successfully.</div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">Error sending requests. Please try again.</div>';
                                            }
                                        }
                                    
                                    ?>

                            </div>
                        </div>

                        <div class="container mt-5"> 
                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="items" class="d-flex flex-column align-items-center">
                                    <!-- Existing fields will go here -->
                                    <div class="row mb-3 item w-100">
                                        <div class="col-md-4">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="requested_quantity[]" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="unitOfIssue" class="form-label">Unit</label>
                                            <input type="text" class="form-control" name="unit_of_issue[]" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="productName" class="form-label">Articles</label>
                                            <input type="text" class="form-control" name="product_name[]" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button row outside and below the 'items' div -->
                                <div class="row mb-3">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-primary mx-2" onclick="addMore()">Add More</button>
                                        <button type="button" class="btn btn-danger mx-2" onclick="removeLast()">Remove Last</button>
                                        <button type="submit" name="submit_request" class="btn btn-success mx-2">Submit</button>
                                    </div>
                                </div>
                            </form>
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