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
        <div class="card vh-25 shadow text-center align-items-center col-12 col-lg-8 mx-auto vh25">
            <div class="card-header col-12 ">
                CKD Project
            </div>
            <form action="php/register.php" method="post" >
                <div class="card-body row justify-content-center col-12">
                    <h5 class="card-title">กรอกข้อมูลผู้ใช้</h5>
                    <div class="row g-2 mb-3 justify-content-center">
                        <div class="col-2">
                            <label for="gender" class="form-label">เพศ</label>
                            <select class="form-select" name="gender" required>
                            <option value="">เลือก</option>
                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="firstName" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" name="firstName" placeholder="ex: นายมานพ" required>
                        </div>
                        <div class="col-6">
                            <label for="lastName" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="lastName" placeholder="ex: สะอาด" required>
                        </div>
                        <div class="col-4">
                            <label for="weight" class="form-label">น้ำหนัก</label>
                            <input type="number" class="form-control" name="weight" placeholder="60" required>
                        </div>
                        <div class="col-4">
                            <label for="height" class="form-label">ส่วนสูง</label>
                            <input type="number" class="form-control" name="height" placeholder="160" required>
                        </div>
                        <div class="col-4">
                            <label for="state" class="form-label">ระยะโรคไต</label>
                            <select class="form-select" name="state" required>
                                <option value="">เลือก </option>
                                <option value="1">ระยะ 1</option>
                                <option value="2">ระยะ 2</option>
                                <option value="3">ระยะ 3</option>
                            </select>
                        </div>
                        <hr class="my-4">
                        <div class="col-sm-10">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="ex: manop@example.com" required>

                        </div>
                        <div class="col-sm-10">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่านควรมีอย่างน้อย 4-16" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer row justify-content-center col-12 p-0 m-0 mt-2">
                    <div class="btn-group justify-content-center m-0 p-0" role="group">
                        <button type="submit" class="font-weight-bold btn btn-primary shadow rounded-bottom-2 rounded-top-0" >ยืนยัน</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>