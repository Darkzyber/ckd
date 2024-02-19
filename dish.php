<?php
  require "php/main.php";
  online($dbcon);
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- MYCSS -->
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container pb-5 mb-5">
    <div class="card vh25 shadow text-center align-items-center col-12 col-lg-8 mx-auto">
        <h4 class="card-header col-12 "> โปรแกรมคำนวนโภชนาการ ของผู้ป่วยโรคไต </h4>
        <div class="card-body row justify-content-center col-12 pb-0">
            <h5 class="card-title mt-0">ข้อมูลของคุณ <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></h5>
            <hr>
        </div>

        <h5 class="card-title m-0">เมนูล่าสุด</h5>
        <!-- <div class="btn-group justify-content-center mt-2 mb-0 shadow" role="group">
          <a class="font-weight-bold btn btn-outline-warning rounded-top-0" >อาหารจานหลัก</a>
          <a class="font-weight-bold btn btn-outline-primary rounded-top-0" >ของหวาน</a>
        </div> -->

        <div class="card-body row col-12" >

          <?php
              $dish_st = $dbcon->prepare("SELECT * FROM dish INNER JOIN food on food.f_id=dish.f_id WHERE u_id = :u_id AND dish.created_date >= CURDATE()");
              $dish_st->bindParam(':u_id', $_SESSION['uid']);
              $dish_st->execute();

              while($row = $dish_st->fetch(PDO::FETCH_ASSOC)){
          ?>
            <div class="card col-md-4 p-0 mb-5">
                <div class="card-header">
                    <p class="text-dark m-0 p-0">
                        <?php echo $row['food_name']?>
                    </p> 
                </div>
                <div class="card-body">
                    <p class="card-text"> 
                      โปรตีน <?php echo $row['protean'];?> ก. <br>
                      ฟอสฟอรัส <?php echo $row['phosphorus'];?> มก. <br>
                      โพแทสเซียม <?php echo $row['potassium'];?> มก. <br>
                      โซเดียม <?php echo $row['sodium'];?> มก. </p>
                </div>
                <div class="btn-group justify-content-center m-0 p-0" >
                    <button type="button" class="btn btn-outline-primary shadow rounded-top-0" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['f_id']?>">
                        แสดงรายละเอียด
                    </button>
                </div>
            </div>
              
        <!-- Modal -->
        <div class="modal fade pt-5" id="modal<?php echo $row['f_id']?>" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $row['food_name']?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">วัตถุดิบ</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">หน่วยนับ</th>
                  </tr>
                </thead>
                <tbody>
            <?php
                $ingre = $dbcon->prepare("SELECT * FROM ingredient WHERE f_id = :f_id");
                $ingre->bindParam(':f_id', $row['f_id']);
                $ingre->execute();

                while($row_2 = $ingre->fetch(PDO::FETCH_ASSOC)){
            ?>
                  <tr>
                    <td> <?php echo $row_2['i_name']?> </td>
                    <td> <?php echo $row_2['amount']?> </td>
                    <td> <?php echo $row_2['pronuce']?> </td>
                  </tr>
            <?php
                  }
            ?>
                </tbody>
              </table>

              </div>
              <form class="modal-footer" action="" method="post">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
              </form>
            </div>
          </div>
        </div>



          <?php
              }
          ?>
            <!-- <div class="card col-md-4 p-0 mb-5">
                <div class="card-header">
                    <p class="text-dark m-0 p-0">
                        พะแนงหมู
                    </p> 
                </div>
                <div class="card-body">
                  .
                  .
                  .
            </div>-->
        </div>
        
        <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
          <div class="btn-group justify-content-center m-0 p-0" role="group">
            <a class="font-weight-bold btn btn-danger shadow rounded-top-0" href="user.php">ย้อนกลับ</a>
            <a class="font-weight-bold btn btn-primary shadow rounded-top-0" href="order.php">เลือกเมนูใหม่</a>
          </div>
        </div>

    </div>

</div>








</body>
</html>
