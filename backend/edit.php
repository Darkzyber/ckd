<?php
    require "../php/main.php";

    if (isset($_REQUEST['update_id'])){
        try{
            $id = $_REQUEST['update_id'];
            $sql = "SELECT * from food where f_id = :f_id";
            $edit = $dbcon->prepare($sql);
            $edit->bindParam(":f_id",$id);
            $edit->execute();
            $row = $edit->fetch(PDO::FETCH_ASSOC);
            extract($row);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    if(isset($_REQUEST['btn_update'])){
        
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
            try{
                if(!isset($errorMsg)){
                    echo "test";
                    $sql = "UPDATE food SET food_name = :fn, lore = :l, protean = :pt, phosphorus = :pp, potassium = :ps, sodium = :sd, c_id = :c WHERE f_id = :f_id";
                    $update = $dbcon->prepare($sql);
                    $update->bindParam(":f_id",$id);
                    $update->bindParam(":fn",$food_name);
                    $update->bindParam(":l",$lore);
                    $update->bindParam(":pt",$protean);
                    $update->bindParam(":pp",$phosphorus);
                    $update->bindParam(":ps",$potassium);
                    $update->bindParam(":sd",$sodium);
                    $update->bindParam(":c",$c_id);

                    if($update->execute()){
                        echo "testl";
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
        <div class="display-3 text-center text-light">Edit</div>
            <?php
                if (isset($errorMsg)){
            ?>
            <div class="alert alert-danger">
                <strong>ผิดพลาด <?php echo $errorMsg; ?></strong>
            </div>

            <?php   
                }
                if (isset($updateMsg)){
            ?>
            <div class="alert alert-success">
                <strong>สำเร็จ <?php echo $updateMsg; ?></strong>
            </div>

            <?php   }   ?>

            <form method="post" action="" class="text-light">
                    
                <div class="row text-center mt-4">
                    <label for="food_name" class="col-3 control-label">Food Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="food_name" class="form-control" value="<?php echo $food_name; ?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="c_id" class="col-sm-3 control-label">ประเภท</label>
                    <div class="col-sm-3">
                        <select name="c_id" class="form-control btn btn-light">
                            <option value="<?php echo $c_id; ?>">ไม่เปลี่ยน(Old)</option>
                            <option value="1">ของคาว</option>
                            <option value="2">ของหวาน</option>
                        </select>
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="lore" class="col-sm-3 control-label">Lore</label>
                    <div class="col-sm-6">
                        <input type="text" name="lore" class="form-control" value="<?php echo $lore; ?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="protean" class="col-sm-3 control-label">Protean</label>
                    <div class="col-sm-6">
                        <input type="number" name="protean" class="form-control" value="<?php echo $protean; ?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="phosphorus" class="col-sm-3 control-label">Phosphorus</label>
                    <div class="col-sm-6">
                        <input type="number" name="phosphorus" class="form-control" value="<?php echo $phosphorus?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="potassium" class="col-sm-3 control-label">Potassium</label>
                    <div class="col-sm-6">
                        <input type="number" name="potassium" class="form-control" value="<?php echo $potassium?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="sodium" class="col-sm-3 control-label">Sodium</label>
                    <div class="col-sm-6">
                        <input type="number" name="sodium" class="form-control" value="<?php echo $sodium?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col">
                        <input type="submit" name="btn_update" class="btn btn-success mx-3 px-5" value="บันทึก">
                        <a href="index.php" class="btn btn-warning my-3 mx-3 px-5">ย้อนกลับ</a>
                    </div>
                </div>

            </form>
        </div>

</body>
</html>