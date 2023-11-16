<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>CKD Project | Register</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>

    <link rel="stylesheet" href="source/css/index.css">
  </head>
  <body class="">
  <?php  require "_nav.php"?>

  <div class="container">

    <div class="card vh-25 shadow text-center align-items-center col-12 col-lg-8 mx-auto">
      <div class="card-header col-12 ">
        CKD Project
      </div>

      <form class="" action="">
        <div class="card-body row justify-content-center col-12">
          <h5 class="card-title">ข้อมูลผู้ใช้</h5>
          
          <div class="row g-2 mb-3">
              <div class="col-6">
                <label for="firstName" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="firstName" placeholder="นายมานพ" disabled>
                
              </div>

              <div class="col-6">
                <label for="lastName" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" id="lastName" placeholder="สะอาด" disabled>
                
              </div>

              <div class="col-4">
                <label for="weight" class="form-label">น้ำหนัก</label>
                <input type="number" class="form-control" id="weight" placeholder="60" disabled>
                
              </div>


              <div class="col-4">
                <label for="height" class="form-label">ส่วนสูง</label>
                <input type="number" class="form-control" id="height" placeholder="160" disabled>
                
              </div>

              <div class="col-4">
                <label for="state" class="form-label">ระยะโรคไต</label>
                <input type="number" class="form-control" id="height" placeholder="2" disabled>
                
              </div>

              <hr class="my-4">
              <h5 class="card-title">รายระเอียดโภชนาการต่อวัน </h5>

              <div class="col-4">
                <label for="state" class="form-label">Cal per days</label>
                <input type="number" class="form-control" id="height" placeholder="9,999 cal" disabled>
                
              </div>

              <div class="col-4">
                <label for="state" class="form-label">Protean per days</label>
                <input type="number" class="form-control" id="height" placeholder="9,999 g" disabled>
                
              </div>

              <div class="col-4">
                <label for="state" class="form-label">Sodium per days</label>
                <input type="number" class="form-control" id="height" placeholder="9,999 ?" disabled>
                
              </div>

            </div>

          </div>
          <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
              <div class="btn-group justify-content-center m-0 p-0" role="group">
                <a class="font-weight-bold btn btn-primary shadow rounded-top-0" href="">แก้ไขข้อมูล</a>
                <a class="font-weight-bold btn btn-primary shadow rounded-top-0" href="">เมนูอาหาร</a>
              </div>
          </div>
        </form>

    </div>

  </div>


 

  </body>
</html>