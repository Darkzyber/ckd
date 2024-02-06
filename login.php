<?php
    require "php/main.php";
    offline();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>โปรแกรมคำนวนโภชนาการ ของผู้ป่วยโรคไต</title>
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
        <!-- MYCSS -->
        <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="container">
    <div class="card vh25 shadow text-center align-items-center col-12 col-lg-8 mx-auto">
        <div class="card-header col-12 ">
        CKD Project
        </div>
        <form class="justify-content-center col-12" action="php/login.php" method="post">
            <div class="card-body row justify-content-center">
                <h5 class="card-title">เข้าสู่ระบบ</h5>
                <div class="row g-2 mb-3 justify-content-center">
                    <div class="col-sm-10">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                    </div>
                    <div class="col-sm-10">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="****" required>
                    </div>
                </div>
            </div>
            <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
                <div class="btn-group justify-content-center m-0 p-0" role="group">
                    <input type="submit" value="Login" class="font-weight-bold btn btn-primary shadow rounded-bottom-2 rounded-top-0" >
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>