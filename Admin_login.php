<?php
require('config.php');
session_start();
$message = '';
$message_type = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ad_login'])) {
        $ad_username = trim($_POST['ad_username']);
        $ad_password = trim($_POST['ad_password']);
        $ad_category = "ADMIN";

        if (!empty($ad_username) && !empty($ad_password)) {
            $stmt = $con->prepare("SELECT * FROM user WHERE UserName = ? AND Category = ?");
            $stmt->bind_param("ss", $ad_username, $ad_category);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if ($ad_username === 'Admin' && $ad_password === 'Admin@123') {
                    $_SESSION['UserName'] = $user['UserName'];
                    $message = "Login...";
                    $message_type = "success";
                    // header('Location: Admin_Home.php');
                    // exit();
                } else {
                    $message = 'Incorrect username or password.';
                    $message_type = "error";
                }
            } else {
                $message = 'Incorrect username or password.';
                $message_type = "error";
            }

            $stmt->close();
            $con->close();
        } 
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DPPS Doctor Patient Portal System</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/astyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css"> <!-- Toastify CSS -->
    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">        

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="col-md-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-color">
        <div class="box box-info">
            <div style="width:500px;margin-left:300px;padding-bottom: 25px;">
                <div class="box-header with-border"></div>
                <h1>ADMIN LOGIN</h1>
                <form class="form-horizontal" method="post" action="">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" name="ad_username" class="form-control" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="password" name="ad_password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="ad_login" class="btn btn-info" style="margin-left:120px;">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js"></script> Toastify JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    <?php if ($message): ?>
        toastr.<?php echo $message_type; ?>("<?php echo $message; ?>");
        setTimeout(function() {
            if ("<?php echo $message_type; ?>" === "success") {
                window.location.href = 'Admin_Home.php';
            }
        }, 1000); 
    <?php endif; ?>
    </script>


</body>
</html>



