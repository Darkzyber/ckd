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

            <div class="card shadow col-12 col-lg-8 mx-auto text-center align-items-center vh25">
                <h4 class="card-header col-12 ">
                    โปรแกรมคำนวนโภชนาการ ของผู้ป่วยโรคไต
                </h4>

                <div class="card-body row justify-content-center">

                    <h5 class="card-title">เริ่มใช้เลย</h5>
                    <div class="btn-group col-10 col-md-6 mt-4 mb-0" role="group">
                        <a type="button" class="font-weight-bold btn btn-primary" href="login.php">Login</a>
                    </div>

                    <p class="card-text my-2"> OR </p>

                    <div class="btn-group col-10 col-md-6 mb-4" role="group">
                        <a type="button" class="font-weight-bold btn btn-primary" href="register.php">Register</a>
                    </div>
                </div>
            </div>

        </div>
        
    </body>
</html>