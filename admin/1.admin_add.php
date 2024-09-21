<?php
include("../config/config.php");
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
    <title>Document</title>
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
                            Add Data
                        </li>
                        <li class="sidebar-item">
                            <a href="index.php?id" class="sidebar-link">
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
            </nav>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>

                    <div class="tab_item card border-0 crud-button" id="tab_items_11">
                        <div class="card-header">
                            <h5 class="card-title">
                                Add Data
                            </h5>
                        </div>
                        <div class="card-body p-3" style="height: 800px;">
                            <div class="container">
                                <div class="text-center mb-4">
                                    <h3>Add new Accounts</h3>
                                    <p>Complete the Form below to add a new user</p>
                                    <?php
                                    include("../config/config.php");

                                    if (isset($_POST['profile-save'])) {
                                        $uname = $_POST['username'];
                                        $fname = $_POST['Fullname'];
                                        $pass = $_POST['Password'];
                                        $cpass = $_POST['cPassword'];
                                        $office = $_POST['office'];
                                        $Password = md5($pass); // Consider using password_hash() instead
                                    
                                        // Validation: Check if any of the input fields is empty
                                        if (empty($uname) || empty($fname) || empty($pass) || empty($cpass) || empty($office)) {
                                            echo '<div class="alert alert-danger" role="alert">
                                                     Please fill in all the required fields.
                                                  </div>';
                                        } elseif ($pass !== $cpass) {
                                            echo '<div class="alert alert-danger" role="alert">
                                                    Passwords do not match. Please enter the same password in both fields.
                                                  </div>';
                                        } else {
                                            $verify_query = mysqli_query($conn, "SELECT username FROM users WHERE username='$uname'");
                                            if (mysqli_num_rows($verify_query) != 0) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                        User already exists. Please choose a different one.
                                                      </div>';
                                            } else {
                                                // Prepare statement to prevent SQL Injection
                                                $stmt = $conn->prepare("INSERT INTO users (username, fullname, office, password) VALUES (?, ?, ?, ?)");
                                                $stmt->bind_param("ssss", $uname, $fname, $office, $Password);
                                                $stmt->execute();
                                                if ($stmt->affected_rows > 0) {
                                                    echo '<div class="alert alert-success" role="alert">
                                                            User added successfully.
                                                          </div>';
                                                } else {
                                                    echo '<div class="alert alert-danger" role="alert">
                                                            Error adding user.
                                                          </div>';
                                                }
                                                $stmt->close();
                                            }
                                        }
                                    }
                                    
                                    ?>
                                </div>
                            </div>

                            <div class="">
                                <form class="justify-content-start allign-items-center" action="" method="post"
                                    enctype="multipart/form-data">

                                    <div class="column">
                                        <div class="col">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Username">
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="Fullname"
                                                placeholder="Full Name">
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="Password"
                                                placeholder="Enter password">
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="cPassword"
                                                placeholder="Confirm password">
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Office</label>
                                            <select class="form-control" name="office">
                                                <option value="admin">Admin</option>
                                                <option value="supplyoffice">Supply Office</option>
                                                <option value="pharmacy">Pharmacy</option>
                                                <option value="laboratory">Laboratory</option>
                                                <option value="csoffice">Central Supply Office</option>
                                            </select>
                                        </div>
                                        </div>

                                            <div class="mt-3">
                                            <button type="submit" class="btn btn-success"
                                                name="profile-save">Save</button>
                                            <a href="index.php" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
            </main>


            <!-- darkmode nigger -->
            <a href="#" class="theme-toggle">
                <i class="uil uil-sun"></i>
                <i class="uil uil-moon"></i>
            </a>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>La Consolacion College Novaliches</strong>
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