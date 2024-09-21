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
                    <!-- need to change this put some identifier -->
                    <!-- add data variable for each class -->

                    <!--Dashboard-->
                    <!-- add data variable for each class -->
                    <div class="tab_item card border-0 crud-button" id="tab_items_11">
                        <div class="card-header">
                            <h5 class="card-title">
                                Change Data
                            </h5>
                        </div>
                        <div class="card-body p-3" style="height: 1000px;">
                            <div class="container">
                                <div class="text-center mb-4">
                                    <h3>Change Details</h3>
                                    <p>Press update to update the details</p>


                                    <?php
                                    include("../config/config.php");

                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM users WHERE id=$id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);

                                    $password_updated = false;

                                    if (isset($_POST['update'])) {
                                        $uname = $_POST['username'];
                                        $fname = $_POST['fullname'];  
                                        $office = $_POST['office'];

                                        $update_sql = "UPDATE users SET 
                                        username='" . mysqli_real_escape_string($conn, $uname) . "', 
                                        fullname='" . mysqli_real_escape_string($conn, $fname) . "',
                                        office='" . mysqli_real_escape_string($conn, $office) . "'
                                        WHERE id=$id";

                                        mysqli_query($conn, $update_sql);

                                        if (!empty($_POST['new_password'])) {
                                            if ($_POST['new_password'] === $_POST['confirm_password']) {

                                                $new_pass = md5($_POST['new_password']);
                                                $sql = "UPDATE users SET password='$new_pass' WHERE id=$id";
                                                mysqli_query($conn, $sql);
                                                $password_updated = true;
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">
                                                Passwords do not match
                                              </div>';
                                            }
                                        }

                                        if ($password_updated || mysqli_affected_rows($conn) > 0) {
                                            header("Location: index.php?msg_admin=Account Data Changed!");
                                            exit;
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
                                <form class="justify-content-start allign-items-center" action="" method="post"
                                    enctype="multipart/form-data">

                                    <div class="column">
                                        <div class="col">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username"
                                                value="<?php echo $row['username'] ?>">
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Fullname</label>
                                            <input type="text" class="form-control" name="fullname"
                                                value="<?php echo $row['fullname'] ?>">
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Office</label>
                                            <select class="form-control" name="office">
                                                <option value="admin" <?php echo ($row['office'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                                <option value="supplyoffice" <?php echo ($row['office'] == 'supplyoffice') ? 'selected' : ''; ?>>Supply Office</option>
                                                <option value="pharmacy" <?php echo ($row['office'] == 'pharmacy') ? 'selected' : ''; ?>>Pharmacy</option>
                                                <option value="laboratory" <?php echo ($row['office'] == 'laboratory') ? 'selected' : ''; ?>>Laboratory</option>
                                                <option value="csoffice" <?php echo ($row['office'] == 'csoffice') ? 'selected' : ''; ?>>Central Supply Office</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Change Password</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changePasswordCheckbox" name="change_password" onclick="togglePasswordFields()">
                                                <label class="form-check-label" for="changePasswordCheckbox">Change password?</label>
                                            </div>
                                        </div>

                                        <div class="col password-fields" style="display:none;">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" name="new_password" id="new_password">
                                        </div>

                                        <div class="col password-fields" style="display:none;">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-success" name="update">UPDATE</button>
                                            <a href="index.php#tabs_item" class="btn btn-danger">Cancel</a>
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