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
    <title>Supply Office</title>
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
                        <li class="sidebar-item test_3 active" data-tc="tab_items_1">
                            <a href="javascript:void(0);" onclick="resetWebsite(event)" class="sidebar-link">
                                <i class="uil uil-list-ul pe-2"></i>
                                Dashboard
                            </a>
                        </li>

                        <!--First main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed hover-me" id="v-pills-home-tab" data-toggle="pill"
                                data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                                <i class="uil uil-folder-open"></i>
                                Inventory
                            </a>
                            <ul id="pages" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_2">
                                    <a class="sidebar-link"><i class="uil uil-sitemap"> </i>Supply Office</a>
                                </li>
                            </ul>
                        </li>

                        <!--Second main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#requests" data-bs-toggle="collapse"
                                aria-expanded="false">
                                <i class="uil uil-user-check"></i>
                                Requests
                                <span id="requestCount" class="request-count" style="display: none;"></span> <!-- Total requests count -->
                            </a>
                            <ul id="requests" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_3">
                                    <a class="sidebar-link"><i class="uil uil-capsule"> </i>Pharmacy
                                    <span id="pharmacyCount" class="request-count" style="display: none;"></span> <!-- Pharmacy requests count --></a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_4">
                                    <a class="sidebar-link"><i class="uil uil-flask"> </i>Laboratory
                                    <span id="laboratoryCount" class="request-count" style="display: none;"></span> <!-- Laboratory requests count --></a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_5">
                                    <a class="sidebar-link"><i class="uil uil-file-info-alt"> </i>Central Supply Office
                                    <span id="centralCount" class="request-count" style="display: none;"></span> <!-- Central Supply requests count --></a>
                                </li>
                            </ul>
                        </li>

                        <!--Third main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#reports" data-bs-toggle="collapse"
                                aria-expanded="false">
                                <i class="uil uil-book-open"></i>
                                Reports
                            </a>
                            <ul id="reports" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_6">
                                    <a class="sidebar-link"><i class="uil uil-truck"> </i>Delivered</a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_7">
                                    <a class="sidebar-link"><i class="uil uil-x"> </i>Rejected</a>
                                </li>
                            </ul>
                        </li>

                        <!--Fourth main side Menu-->
                        <li class="sidebar-item" id="v-pills-tab" role="tablist">
                            <a href="#" class="sidebar-link collapsed hover-me" data-bs-target="#recycle-bin" data-bs-toggle="collapse"
                                aria-expanded="false">
                                <i class="uil uil-trash-alt"></i>
                                Recycle Bin
                            </a>
                            <ul id="recycle-bin" class="sidebar-dropwn list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item test_2" data-tc="tab_8">
                                    <a class="sidebar-link"><i class="uil uil-trash-alt"> </i>Supply</a>
                                </li>
                                <li class="sidebar-item test_2" data-tc="tab_9">
                                    <a class="sidebar-link"><i class="uil uil-trash-alt"> </i>Request</a>
                                </li>
                            </ul>
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
                    <div class="tab_item row" id="tab_items_1">
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
                    <div class="tab_item card border-0" id="tab_2" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Supply Office Inventory
                                <a href="1.supply_add.php" class="btn btn-primary">New Item</a>
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
                            <table id="supplyTable" class="table table-hover text-center">
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
                                        <th scope="col">Deliver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT * FROM supply_office WHERE status != 'Deleted' OR status IS NULL ORDER BY product_name ASC";
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
                                                    <a href="1.supply_edit.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
                                                </td>
                                                <td>
                                                    <a href="4.deliver.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Deliver</a>
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
                    <!--Pharmacy Request-->
                    <div class="tab_item card border-0" id="tab_3" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Pharmacy Request
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="pharmacySearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="pharmacyShowAllBtn" class="btn btn-secondary">Show All</button>
                                                <button type="button" id="printBtn" class="btn btn-danger" onclick="printPharmacyTable()">Print Pdf</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="pharmacySupplyTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Balance on hand</th>
                                        <th scope="col">Balance at warehouse</th>
                                        <th scope="col">Approved Quantity</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT *, DATE_FORMAT(request_date, '%Y-%m-%d %H:%i') as formatted_date FROM supply_requests WHERE types ='pharmacy' AND status IN ('Approved', 'Pending', 'Admin Approved') ORDER BY request_date ASC";
                                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $sql .= " AND request_date BETWEEN '$from_date' AND '$to_date'";
                                    }
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['requested_quantity'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['onhand'] ?></td>
                                                <td><?php echo $row['warehouse'] ?></td>
                                                <td><?php echo $row['approvedqty'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td><?php echo $row['formatted_date'] ?></td>
                                                <td>
                                                    <a href="2.pharmacy_edit.php?types=pharmacy&id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
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
                    <!--Laboratory Request-->      
                    <div class="tab_item card border-0" id="tab_4" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Laboratory Request
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="laboratorySearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="laboratoryShowAllBtn" class="btn btn-secondary">Show All</button>
                                                <button type="button" id="printBtn" class="btn btn-danger" onclick="printLaboratoryTable()">Print Pdf</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="laboratorySupplyTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Balance on hand</th>
                                        <th scope="col">Balance at warehouse</th>
                                        <th scope="col">Approved Quantity</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT *, DATE_FORMAT(request_date, '%Y-%m-%d %H:%i') as formatted_date FROM supply_requests WHERE types ='laboratory' ORDER BY request_date ASC";
                                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $sql .= " AND request_date BETWEEN '$from_date' AND '$to_date'";
                                    }
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['requested_quantity'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['onhand'] ?></td>
                                                <td><?php echo $row['warehouse'] ?></td>
                                                <td><?php echo $row['approvedqty'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td><?php echo $row['formatted_date'] ?></td>
                                                <td>
                                                    <a href="2.laboratory_edit.php?types=laboratory&id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
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
                    <!--Central Supply Request-->
                    <div class="tab_item card border-0" id="tab_5" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Central Supply Request
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="centralSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="centralShowAllBtn" class="btn btn-secondary">Show All</button>
                                                <button type="button" id="printBtn" class="btn btn-danger" onclick="printCentralTable()">Print Pdf</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="centralSupplyTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Balance on hand</th>
                                        <th scope="col">Balance at warehouse</th>
                                        <th scope="col">Approved Quantity</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT *, DATE_FORMAT(request_date, '%Y-%m-%d %H:%i') as formatted_date FROM supply_requests WHERE types ='central_supply' ORDER BY request_date ASC";
                                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $sql .= " AND request_date BETWEEN '$from_date' AND '$to_date'";
                                    }
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['requested_quantity'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['onhand'] ?></td>
                                                <td><?php echo $row['warehouse'] ?></td>
                                                <td><?php echo $row['approvedqty'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td><?php echo $row['formatted_date'] ?></td>
                                                <td>
                                                    <a href="2.central_edit.php?types=central_supply&id=<?php echo $row['id']; ?>" class="link-primary"><i class="uil uil-edit"></i></a>
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
                    <!--Delivered-->
                    <div class="tab_item card border-0" id="tab_6" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                    Delivered Items
                                </h5>
                            </div>
                            <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="deliveredSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="deliveredShowAllBtn" class="btn btn-secondary">Show All</button>
                                                    <button type="button" id="deliveredShowAllBtn" class="btn btn-secondary">Show All</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <table id="deliveredTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Balance on hand</th>
                                        <th scope="col">Balance at warehouse</th>
                                        <th scope="col">Approved Quantity</th>
                                        <th scope="col">Delivered Date</th>
                                        <th scope="col">Target Office</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include("../config/config.php");

                                    // SQL query to fetch approved requests from the pharmacy
                                    $delivered_sql = "SELECT *, DATE_FORMAT(delivery_date, '%Y-%m-%d %H:%i') as formatted_date FROM deliveries ORDER BY delivery_date DESC";
                                    $delivered_result = mysqli_query($conn, $delivered_sql);

                                    // Check if the query returned any rows
                                    if ($delivered_result && $delivered_result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($delivered_result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                                <td><?php echo htmlspecialchars($row['balance_on_hand']); ?></td>
                                                <td><?php echo htmlspecialchars($row['balance_at_warehouse']); ?></td>
                                                <td><?php echo htmlspecialchars($row['approved_quantity']); ?></td>
                                                <td><?php echo htmlspecialchars($row['formatted_date']); ?></td>
                                                <td><?php echo htmlspecialchars($row['target_office']); ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="7">No delivered items found.</td></tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Rejected-->
                    <div class="tab_item card border-0" id="tab_7" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                            Rejected Requests
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="rejectedSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="rejectedShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="rejectedTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Request Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT *, DATE_FORMAT(request_date, '%Y-%m-%d %H:%i') as formatted_date FROM supply_requests WHERE status = 'Rejected' ORDER BY request_date ASC";
                                    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $sql .= " AND request_date BETWEEN '$from_date' AND '$to_date'";
                                    }
                    
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['requested_quantity'] ?></td>
                                                <td><?php echo $row['unit_of_issue'] ?></td>
                                                <td><?php echo $row['status']?></td>
                                                <td><?php echo $row['formatted_date'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                     
                    <!-- Supply Recycle Bin-->
                    <div class="tab_item card border-0" id="tab_8" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Supply Recycle Bin
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="supplyRecycleBinSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="supply_search" class="input-group-text">Search:</label>
                                                <input type="text" id="supply_search" name="supply_search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="supplyRecycleBinShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="supplyRecycleBinTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Article</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Batch Number</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");

                                    $sql = "SELECT * FROM supply_office WHERE status = 'Deleted'";

                                    if (!empty($_GET['search'])) {
                                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                                        $sql .= " AND (product_name LIKE '%$search%' OR product_num LIKE '%$search%' OR batch_num LIKE '%$search%')";
                                    }

                                    $result = mysqli_query($conn, $sql);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['product_num']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['unit_of_issue']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['batch_num']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['exp.date']) . "</td>";
                                            echo '<td><a href="4.sup_restore.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-success">Restore</a> <a href="4.sup_delete_forever.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger">Permanently Delete</a></td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No items in the recycle bin</td></tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Request Recycle Bin-->
                    <div class="tab_item card border-0" id="tab_9" style="display: none;">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between fs-3">
                                Request Recycle Bin
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form id="requestRecycleBinSearchForm">
                                            <div class="input-group mb-3">
                                                <label for="search" class="input-group-text">Search:</label>
                                                <input type="text" id="search" name="search" class="form-control" aria-label="Search input">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <button type="button" id="requestRecycleBinShowAllBtn" class="btn btn-secondary">Show All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="requestRecycleBinTable" class="table table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Articles</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../config/config.php");
                                    
                                    $sql = "SELECT * FROM supply_requests WHERE status = 'Deleted'";

                                    if (!empty($_GET['search'])) {
                                        $search = mysqli_real_escape_string($conn, $_GET['search']);
                                        $sql .= " AND (product_name LIKE '%$search%' OR unit_of_issue LIKE '%$search%')";
                                    }

                                    if (!empty($_GET['from_date']) && !empty($_GET['to_date'])) {
                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];
                                        $sql .= " AND request_date BETWEEN '$from_date' AND '$to_date'";
                                    }

                                    $sql .= " ORDER BY request_date ASC";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['requested_quantity']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['unit_of_issue']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['request_date']) . "</td>";
                                            echo '<td><a href="4.req_restore.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-success">Restore</a> <a href="4.req_delete_forever.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger">Permanently Delete</a></td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No items in the recycle bin</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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