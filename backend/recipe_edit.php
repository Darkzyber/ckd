<?php
    require "../php/main.php";

    if (isset($_REQUEST['recipe_update_id'])){
        try{
            $id = $_REQUEST['recipe_update_id'];
            $sql = "SELECT * from ingredient where i_id = :i_id";
            $edit = $dbcon->prepare($sql);
            $edit->bindParam(":i_id",$id);
            $edit->execute();
            $row = $edit->fetch(PDO::FETCH_ASSOC);
            extract($row);

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    if(isset($_REQUEST['btn_update'])){
        $i_name = $_REQUEST['i_name'];
        $amount = $_REQUEST['amount'];
        $pronuce = $_REQUEST['pronuce'];

        if(empty($i_name)){
            $errorMsg = "โปรดใส่ วัตถุดิบ";
        }else if(empty($amount)){
            $errorMsg = "โปรดใส่ จำนวน";
        }else if(empty($pronuce)){
            $errorMsg = "โปรดใส่ หน่วยนับ";
        }else{
            # Insert SQL
            try{
                $sql = "UPDATE ingredient SET i_name = :iname, amount = :amount, pronuce = :pronuce, f_id = :f_id WHERE i_id = :i_id";
                $update = $dbcon->prepare($sql);
                $update->bindParam(":iname",$i_name);
                $update->bindParam(":amount",$amount);
                $update->bindParam(":pronuce",$pronuce);
                $update->bindParam(":f_id",$f_id);
                $update->bindParam(":i_id",$id);

                if($update->execute()){
                    $updateMsg = "Success";
                    header("refresh:1;recipe.php?recipe_id=".$f_id);
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
        <div class="display-3 text-center text-light">ingredient</div>
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
                    <label for="i_name" class="col-3 control-label">วัตถุดิบ</label>
                    <div class="col-sm-6">
                        <input type="text" name="i_name" class="form-control" value="<?php echo $i_name; ?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="amount" class="col-sm-3 control-label">จำนวน</label>
                    <div class="col-sm-6">
                        <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="pronuce" class="col-sm-3 control-label">หน่วยนับ</label>
                    <div class="col-sm-6">
                        <input type="text" name="pronuce" class="form-control" value="<?php echo $pronuce; ?>">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <div class="col">
                        <input type="submit" name="btn_update" class="btn btn-success mx-3 px-5" value="บันทึก">
                        <a href="recipe.php?recipe_id=<?php echo $f_id?>" class="btn btn-warning my-3 mx-3 px-5">ย้อนกลับ</a>
                    </div>
                </div>

            </form>
        </div>

</body>
</html>