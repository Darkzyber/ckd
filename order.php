<?php
  require "php/main.php";
  online($dbcon);

  $klose = false;

  if (isset($_REQUEST['btn_insert'])){
    try{
      $date = date("Y-m-d H:i:s");
      $id = $_REQUEST['fid'];
      $sql = "INSERT INTO dish (u_id,f_id,created_date,update_date) VALUE(:u_id,:f_id,:created_date,:update_date)";
      $add = $dbcon->prepare($sql);
      $add->bindParam(":u_id",$_SESSION['uid']);
      $add->bindParam(":f_id",$id);
      $add->bindParam(":created_date",$date);
      $add->bindParam(":update_date",$date);
      $add->execute();
      $klose = true;
      
      header("refresh:2;index.php");
    }catch(PDOException $e){
        $e->getMessage();
        echo $e;
    }
  }


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
  <script src="https://releases.jquery.com/git/jquery-git.slim.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- MYCSS -->
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container pb-5 mb-5">
    <div class="card vh25 shadow text-center align-items-center col-12 col-lg-8 mx-auto">
      <div class="card-header col-12 row">
        <h4 class="col-12 "> โปรแกรมคำนวนโภชนาการ ของผู้ป่วยโรคไต </h4>
      </div>
      <div class="card-body row justify-content-center col-12 pb-0">
          <h5 class="card-title mt-0">ข้อมูลของ <?php echo $_SESSION['fname'].' '.$_SESSION['lname']?></h5>
          <div class="row g-2 mb-3 justify-content-center">
            <div class="progress-group">
                <span class="float-right">โปรตีนต่อวัน<b> <?php echo $_SESSION['protean'] ?> / <?php echo $_SESSION['weight'] * 0.7; #g?> กรัม</b></span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width:<?php echo $_SESSION['protean'] / ($_SESSION['weight'] * 0.7) * 100 ?>%"></div>
                </div>
            </div>
            <div class="progress-group">
                <span class="float-right">โซเดียมต่อวัน<b> <?php echo $_SESSION['sodium'] ?> / 2,000 มิลลิกรัม</b></span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" style="width:<?php echo $_SESSION['sodium'] / 2000 * 100 ?>%"></div>
                </div>
            </div>
            <div class="progress-group">
                <span class="float-right">ฟอสฟอรัส<b> <?php echo $_SESSION['phosphorus'] ?> / 1,000 มิลลิกรัม</b></span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width:<?php echo $_SESSION['phosphorus'] / 1000 * 100 ?>%"></div>
                </div>
            </div>
            <div class="progress-group">
                <span class="float-right">โพแทสเซียม<b> <?php echo $_SESSION['potassium'] ?> / 3,000 มิลลิกรัม</b></span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" style="width:<?php echo $_SESSION['potassium'] / 3000 * 100 ?>%"></div>
                </div>
            </div>
          </div>
          <hr>
      </div>

        <h5 class="card-title m-0">เมนูอาหารแนะนำ</h5>
        <!-- <div class="btn-group justify-content-center mt-2 mb-0 shadow" role="group">
          <a class="font-weight-bold btn btn-outline-warning rounded-top-0" >อาหารจานหลัก</a>
          <a class="font-weight-bold btn btn-outline-primary rounded-top-0" >ของหวาน</a>
        </div> -->

        <div class="card-body row col-12" >
        <?php
              $menu = $dbcon->prepare("SELECT * FROM food");
              $menu->execute();

              while($row = $menu->fetch(PDO::FETCH_ASSOC)){
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
                    <button type="button" class="btn btn-primary shadow rounded-top-0" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['f_id']?>">
                        แสดงรายระเอียด
                    </button>
                </div>
            </div>

            
<!-- Modal -->
<div class="modal fade pt-5" id="modal<?php echo $row['f_id']?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ไก่ผัดพริกขิง</h1>
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

                $color1 = ($row['protean'] + $_SESSION['protean'] <= ($_SESSION['weight'] * 0.7)) ? 'warning' : 'danger';
                
                $color2 = ($row['sodium'] + $_SESSION['sodium'] <= 2000 ) ? 'warning' : 'danger';
                
                $color3 = ($row['phosphorus'] + $_SESSION['phosphorus'] <= 1000 ) ? 'warning' : 'danger';
                
                $color4 = ($row['potassium'] + $_SESSION['potassium'] <= 3000 ) ? 'warning' : 'danger';
                
                $close = false;
                
                if($color1 == 'danger'){
                  $close = true;
                }else if($color2 == 'danger'){
                  $close = true;
                }else if($color3 == 'danger'){
                  $close = true;
                }else if($color4 == 'danger'){
                  $close = true;
                }

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
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col" colspan="2" class="text-center">โภชนการ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width: 30%;"> โปรตีน </td>
            <td>

              <div class="progress-stacked">
                <div class="progress" role="progressbar" style="width:<?php echo $_SESSION['protean'] / ($_SESSION['weight'] * 0.7) * 100 ?>%">
                  <div class="progress-bar bg-primary"></div>
                </div>
                <div class="progress" role="progressbar" style="width:<?php echo $row['protean'] / ($_SESSION['weight'] * 0.7) * 100 ?>%">
                  <div class="progress-bar bg-<?php echo $color1; ?>"></div>
                </div>
              </div>

            </td>
            
          </tr>
          <tr>
            <td> โซเดียม </td>
            <td>

              <div class="progress-stacked">
                <div class="progress" role="progressbar" style="width:<?php echo $_SESSION['sodium'] / 2000 * 100 ?>%">
                  <div class="progress-bar bg-primary"></div>
                </div>
                <div class="progress" role="progressbar" style="width:<?php echo $row['sodium'] / 2000 * 100 ?>%">
                  <div class="progress-bar bg-<?php echo $color2; ?>"></div>
                </div>
              </div>

            </td>
          </tr>
          <tr>
            <td> ฟอสฟอรัส </td>
            <td>

              <div class="progress-stacked">
                <div class="progress" role="progressbar" style="width:<?php echo $_SESSION['phosphorus'] / 1000 * 100 ?>%">
                  <div class="progress-bar bg-primary"></div>
                </div>
                <div class="progress" role="progressbar" style="width:<?php echo $row['phosphorus'] / 1000 * 100 ?>%">
                  <div class="progress-bar bg-<?php echo $color3; ?> text-dark">
                  </div>
                </div>
              </div>

            </td>
          </tr>
          <tr>
            <td> โพแทสเซียม </td>
            <td class="m-0">
              
              <div class="progress-stacked">
                <div class="progress" role="progressbar" style="width:<?php echo $_SESSION['potassium'] / 3000 * 100 ?>%">
                  <div class="progress-bar bg-primary"></div>
                </div>
                <div class="progress" role="progressbar" style="width:<?php echo $row['potassium'] / 3000 * 100 ?>%">
                  <div class="progress-bar bg-<?php echo $color4; ?> text-light"></div>
                </div>
              </div>

            </td>
          </tr>
        </tbody>
      </table>
      
      </div>
      <form class="modal-footer" action="" method="post">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        <input type="hidden" name="fid" value="<?php echo $row['f_id'] ?>">
          <?php
            if(!$close){
          ?>
        <input type="submit" class="btn btn-primary" name="btn_insert" value="ยืนยัน" >
          <?php
            }else{
          ?>
        <input type="submit" class="btn btn-warning" name="btn_insert" value="ไม่แนะนำให้รับประทาน" >
          <?php
            }
          ?>
      </form>
    </div>
  </div>
</div>        
          <?php
                }
          ?>

        </div>
        <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
          <div class="btn-group justify-content-center m-0 p-0" role="group">
            <a class="font-weight-bold btn btn-danger shadow rounded-top-0" href="dish.php">ย้อนกลับ</a>
          </div>
        </div>
    </div>
</div>


<script>
  function sweet(name){
    Swal.fire({
      title: 'เลือกอาหาร',
      text: 'สำเร็จ',
      icon: 'success'
    });
  }
</script>

<?php
  if($klose){
    echo "<script> sweet(); </script>";
  }
?>

</body>
</html>
