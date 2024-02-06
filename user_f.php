<?php
  require "php/main.php";
  online($dbcon);

  if(isset($_REQUEST['btn_update'])){
    $fname = $_REQUEST['firstName'];
    $lname = $_REQUEST['lastName'];
    $weight = $_REQUEST['weight'];
    $height = $_REQUEST['height'];
    $k_id = $_REQUEST['k_id'];

    if(empty($_REQUEST['firstName'])){
        $errorMsg = "โปรดใส่ ชื่อ";
    }else if(empty($_REQUEST['lastName'])){
        $errorMsg = "โปรดใส่ นามสกุล";
    }else if(empty($_REQUEST['weight'])){
        $errorMsg = "โปรดใส่ น้ำหนัก";
    }else if(empty($_REQUEST['height'])){
        $errorMsg = "โปรดใส่ ส่วนสูง";
    }else if(empty($_REQUEST['k_id'])){
        $errorMsg = "โปรดใส่ ระยะโรคไต";
    }else{
      try{
          if(!isset($errorMsg)){
              $sql = "UPDATE user SET f_name = :firstname, l_name = :lastname, k_id = :k_id, weight = :weight, height = :height WHERE u_id = :u_id";
              $update = $dbcon->prepare($sql);
              $update->bindParam(":firstname",$fname);
              $update->bindParam(":lastname",$lname);
              $update->bindParam(":k_id",$k_id);
              $update->bindParam(":weight",$weight);
              $update->bindParam(":height",$height);
              $update->bindParam(":u_id",$_SESSION['uid']);

              $_SESSION['fname'] = $fname;
              $_SESSION['lname'] = $lname;
              $_SESSION['weight'] = $weight;
              $_SESSION['height'] = $height;
              $_SESSION['ckd'] = $k_id;

              if($update->execute()){
                  $updateMsg = "Update Success";
                  header("refresh:2;index.php");
              }
          }
      }catch(PDOException $e){
          $e->getMessage();
      }
    }
  }

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
  <div class="container">
    <?php
        if (isset($errorMsg)){
    ?>
    <div class="alert alert-danger mt-5">
        <strong>ผิดพลาด <?php echo $errorMsg; ?></strong>
    </div>

    <?php   
        }
        if (isset($updateMsg)){
    ?>
    <div class="alert alert-success mt-5">
        <strong>สำเร็จ <?php echo $updateMsg; ?></strong>
    </div>

    <?php   }   ?>

    <div class="card vh25 shadow text-center align-items-center col-12 col-lg-8 mx-auto">
      <h4 class="card-header col-12 ">
        โปรแกรมคำนวนโภชนาการ ของผู้ป่วยโรคไต
      </h4>
      <form action="" method="post">
        <div class="card-body row justify-content-center col-12">
          <h5 class="card-title">ข้อมูลผู้ใช้</h5>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label for="firstName" class="form-label">ชื่อ</label>
              <input type="text" class="form-control" name="firstName" value="<?php echo $_SESSION['fname'];?>" >
            </div>
            <div class="col-6">
              <label for="lastName" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" name="lastName" value="<?php echo $_SESSION['lname'];?>" >
            </div>
            <div class="col-4">
              <label for="weight" class="form-label">น้ำหนัก</label>
              <input type="number" class="form-control" name="weight" value="<?php echo $_SESSION['weight'];?>" >
            </div>
            <div class="col-4">
              <label for="height" class="form-label">ส่วนสูง</label>
              <input type="number" class="form-control" name="height" value="<?php echo $_SESSION['height'];?>" >
            </div>
            <div class="col-4">
              <label for="state" class="form-label">ระยะโรคไต</label>
              <select name="k_id" class="form-control btn btn-light">
                <option value="<?php echo $_SESSION['ckd']; ?>">ไม่เปลี่ยน(ระยะ <?php echo $_SESSION['ckd']; ?>)</option>
                <option value="1">ระยะ 1</option>
                <option value="2">ระยะ 2</option>
                <option value="3">ระยะ 3</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
          <div class="btn-group justify-content-center m-0 p-0" role="group">
            <a class="font-weight-bold btn btn-danger shadow rounded-top-0" href="user.php">ยกเลิก</a>
            <input class="font-weight-bold btn btn-primary shadow rounded-top-0" type="submit" name="btn_update"  value="บันทึก">
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>