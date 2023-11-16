<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap demo</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>

    <link rel="stylesheet" href="source/css/index.css">
  </head>
  <body class="">

  <div class="container">

    <div class="card vh-25 shadow text-center align-items-center col-12 col-lg-8 mx-auto">
      <div class="card-header col-12 ">
        Project Name
      </div>

      <form class="" action="">
        <div class="card-body row justify-content-center col-12">
          <h5 class="card-title">กรอกข้อมูลผู้ใช้</h5>
          
          <div class="row g-2 mb-3">
              <div class="col-6">
                <label for="firstName" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="firstName" placeholder="ex: นายมานพ" required>
                
              </div>

              <div class="col-6">
                <label for="lastName" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" id="lastName" placeholder="ex: สะอาด" required>
                
              </div>

              <div class="col-sm-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                
              </div>

              <div class="col-sm-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="" required>
                
              </div>

                <hr class="my-4">

              <div class="col-4">
                <label for="weight" class="form-label">น้ำหนัก</label>
                <input type="number" class="form-control" id="weight" placeholder="60" required>
                
              </div>


              <div class="col-4">
                <label for="height" class="form-label">ส่วนสูง</label>
                <input type="number" class="form-control" id="height" placeholder="160" required>
                
              </div>

              <div class="col-4">
                <label for="state" class="form-label">ระยะโรคไต</label>
                <select class="form-select" id="state" required>
                  <option value="">เลือก</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
                
              </div>
            </div>

          </div>
          <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
              <div class="btn-group justify-content-center m-0 p-0" role="group">
                <input type="submit" value="Save" class="font-weight-bold btn btn-primary shadow rounded-bottom-2 rounded-top-0" >
              </div>
          </div>
        </form>

    </div>

  </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>  

  </body>
</html>