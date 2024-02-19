<?php
  require "php/main.php";
  online($dbcon);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CKD Project | Register</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
    <!-- MYCSS -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="source/css/index.css">
</head>
<body class=""> 
  <div class="container ">
    <div class="card vh25 shadow text-center align-items-center col-12 col-lg-8 mx-auto mb-5">
      <h4 class="card-header col-12 ">
        โปรแกรมคำนวนโภชนาการ ของผู้ป่วยโรคไต
      </h4>
        <div class="card-body row justify-content-center col-12">
          <h5 class="card-title">ข้อมูลผู้ใช้</h5>
          <div class="row g-2 mb-3">
              <div class="col-6">
                <label for="firstName" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="firstName" placeholder="<?php echo $_SESSION['fname']?>" disabled>
              </div>
              <div class="col-6">
                <label for="lastName" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" id="lastName" placeholder="<?php echo $_SESSION['lname']?>" disabled>
              </div>
              <div class="col-4">
                <label for="weight" class="form-label">น้ำหนัก</label>
                <input type="number" class="form-control" id="weight" placeholder="<?php echo $_SESSION['weight']?>" disabled>
              </div>
              <div class="col-4">
                <label for="height" class="form-label">ส่วนสูง</label>
                <input type="number" class="form-control" id="height" placeholder="<?php echo $_SESSION['height']?>" disabled>
              </div>
              <div class="col-4">
                <label for="state" class="form-label">ระยะโรคไต</label>
                <input type="number" class="form-control" id="ckd" placeholder="<?php echo $_SESSION['ckd']?>" disabled>
              </div>
                <a href="logout.php">ออกจากระบบ</a>
              <hr class="my-4">
              <h5 class="card-title">รายละเอียดโภชนาการต่อวัน </h5>
                <div class="progress-group">
                    <span class="float-right">โปรตีนต่อวัน<b> <?php echo $_SESSION['protean'] ?> / <?php echo $_SESSION['weight'] * 0.7; #g?>ก.</b></span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width:<?php echo $_SESSION['protean'] / ($_SESSION['weight'] * 0.7) * 100 ?>%"></div>
                    </div>
                </div>
                <div class="progress-group">
                    <span class="float-right">โซเดียมต่อวัน<b> <?php echo $_SESSION['sodium'] ?> / <?php echo number_format($_SESSION['limit_sodium'],0)?> มก.</b></span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width:<?php echo $_SESSION['sodium'] / $_SESSION['limit_sodium'] * 100 ?>%"></div>
                    </div>
                </div>
                <div class="progress-group">
                    <span class="float-right">ฟอสฟอรัส<b> <?php echo $_SESSION['phosphorus'] ?> / <?php echo number_format($_SESSION['limit_phosphorus'],0)?> มก.</b></span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width:<?php echo $_SESSION['phosphorus'] / $_SESSION['limit_phosphorus'] * 100 ?>%"></div>
                    </div>
                </div>
                <div class="progress-group">
                    <span class="float-right">โพแทสเซียม<b> <?php echo $_SESSION['potassium'] ?> / <?php echo number_format($_SESSION['limit_potassium'],0)?> มก.</b></span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width:<?php echo $_SESSION['potassium'] / $_SESSION['limit_potassium'] * 100 ?>%"></div>
                    </div>
                </div>

            </div>
          </div>
          <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
              <div class="btn-group justify-content-center m-0 p-0" role="group">
                <a class="font-weight-bold btn btn-primary shadow rounded-top-0" href="user_f.php">แก้ไขข้อมูล</a>
                <a class="font-weight-bold btn btn-primary shadow rounded-top-0" href="dish.php">เมนูอาหาร</a>
              </div>
          </div>
    </div>
  </div>
</body>
</html>