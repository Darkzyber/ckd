<?php
    require "../php/main.php";

    if (isset($_REQUEST['btn_insert'])){
        $food_name = $_REQUEST['food_name'];
        $c_id = $_REQUEST['c_id'];
        $lore = $_REQUEST['lore'];
        $protean = $_REQUEST['protean'];
        $phosphorus = $_REQUEST['phosphorus'];
        $potassium = $_REQUEST['potassium'];
        $sodium = $_REQUEST['sodium'];

        if(empty($food_name)){
            $errorMsg = "โปรดใส่ Food name";
        }else if(empty($c_id)){
            $errorMsg = "โปรดใส่ ประเภท";

        }else if(empty($protean)){
            $errorMsg = "โปรดใส่ protean";

        }else if(empty($phosphorus)){
            $errorMsg = "โปรดใส่ phosphorus";

        }else if(empty($potassium)){
            $errorMsg = "โปรดใส่ potassium";

        }else if(empty($sodium)){
            $errorMsg = "โปรดใส่ sodium";

        }else{
            # Insert SQL
            try{
                $sql = "INSERT INTO food (food_name, lore, protean, phosphorus, potassium, sodium, c_id) VALUE(:fn,:l,:pt,:pp,:ps,:sd,:c)";
                $insert = $dbcon->prepare($sql);
                $insert->bindParam(":fn",$food_name);
                $insert->bindParam(":l",$lore);
                $insert->bindParam(":pt",$protean);
                $insert->bindParam(":pp",$phosphorus);
                $insert->bindParam(":ps",$potassium);
                $insert->bindParam(":sd",$sodium);
                $insert->bindParam(":c",$c_id);

                if($insert->execute()){
                    $insertMsg = "Success";
                    header("refresh:2;index.php");
                }
                
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
    <!-- MYCSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="bg-dark">
    <div class="container">
        <div class="display-3 text-center text-light">Add+</div>
            <?php
                if (isset($errorMsg)){
            ?>
            <div class="alert alert-danger">
                <strong>ผิดพลาด <?php echo $errorMsg; ?></strong>
            </div>

            <?php   
                }
                if (isset($insertMsg)){
            ?>
            <div class="alert alert-success">
                <strong>สำเร็จ <?php echo $insertMsg; ?></strong>
            </div>

            <?php   }   ?>

            <form method="post" action="" class="text-light">
                    
                <div class="row text-center mt-4">
                    <label for="food_name" class="col-3 control-label">Food Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="food_name" class="form-control" placeholder="ชื่ออาหาร..">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="c_id" class="col-sm-3 control-label">ประเภท</label>
                    <div class="col-sm-3">
                        <select name="c_id" class="form-control btn btn-light">
                            <option value="1">ของคาว</option>
                            <option value="2">ของหวาน</option>
                        </select>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="lore" class="col-sm-3 control-label">Lore</label>
                    <div class="col-sm-6">
                        <input type="text" name="lore" class="form-control" placeholder="คำแนะนำ..">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="protean" class="col-sm-3 control-label">Protean</label>
                    <div class="col-sm-6">
                        <input type="text" name="protean" class="form-control" placeholder="000.00">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="phosphorus" class="col-sm-3 control-label">Phosphorus</label>
                    <div class="col-sm-6">
                        <input type="text" name="phosphorus" class="form-control" placeholder="0,000.00">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="potassium" class="col-sm-3 control-label">Potassium</label>
                    <div class="col-sm-6">
                        <input type="text" name="potassium" class="form-control" placeholder="0,000.00">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="sodium" class="col-sm-3 control-label">Sodium</label>
                    <div class="col-sm-6">
                        <input type="text" name="sodium" class="form-control" placeholder="0,000.00">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col">
                        <input type="submit" name="btn_insert" class="btn btn-success mx-3 px-5" value="เพิ่มข้อมูล">
                        <a href="index.php" class="btn btn-warning my-3 mx-3 px-5">ย้อนกลับ</a>
                    </div>
                </div>

            </form>
        </div>

</body>
</html>