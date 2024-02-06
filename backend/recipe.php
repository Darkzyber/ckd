<?php
    require "../php/main.php";

    if (isset($_REQUEST['recipe_id'])){
        try{
            $id = $_REQUEST['recipe_id'];
            $sql = "SELECT * from food where f_id = :f_id";
            $add = $dbcon->prepare($sql);
            $add->bindParam(":f_id",$id);
            $add->execute();
            $row = $add->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_insert'])){
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
                $sql = "INSERT INTO ingredient (i_name, amount, pronuce, f_id) VALUE(:iname,:amount,:pronuce,:f_id)";
                $insert = $dbcon->prepare($sql);
                $insert->bindParam(":iname",$i_name);
                $insert->bindParam(":amount",$amount);
                $insert->bindParam(":pronuce",$pronuce);
                $insert->bindParam(":f_id",$id);

                if($insert->execute()){
                    $insertMsg = "Success";
                    header("refresh:1;");
                }
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
    }

    if(isset($_REQUEST['recipe_delete_id'])){
        $die = $_REQUEST['recipe_delete_id'];

        #REMOVE ALL ingredient 
        $del_1 = $dbcon->prepare("DELETE FROM ingredient WHERE i_id = :i_id");
        $del_1->bindParam(":i_id",$die);
        
        if($del_1->execute()){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
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
        <div class="display-3 text-center text-light">Add+ ingredient <?php echo $row['food_name'] ?></div>
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
            <table class="table table-dark table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>i_name</th>
                        <th>amount</th>
                        <th>pronuce</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * from ingredient where f_id = :f_id";
                    $recipe = $dbcon->prepare($sql);
                    $recipe->bindParam(":f_id",$id);
                    $recipe->execute();
                    $i= 0; 
                    while($row2 = $recipe->fetch(PDO::FETCH_ASSOC)){
                        $i++;
                ?>
                    <tr>
                        <td>
                            <?php echo $i;?>
                        </td>
                        <td>
                            <?php echo $row2['i_name']?>
                        </td>
                        <td>
                            <?php echo $row2['amount']?>
                        </td>
                        <td>
                            <?php echo $row2['pronuce']?>
                        </td>
                        <td>
                            <a href="recipe_edit.php?recipe_update_id=<?php echo $row2['i_id']?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="?recipe_delete_id=<?php echo $row2['i_id']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>



            <form method="post" action="" class="text-light">
                    
                <div class="row text-center mt-4">
                    <label for="i_name" class="col-3 control-label">ingredient</label>
                    <div class="col-sm-6">
                        <input type="text" name="i_name" class="form-control" placeholder="ชื่อวัตถุดิบ..">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="amount" class="col-sm-3 control-label">จำนวน</label>
                    <div class="col-sm-6">
                        <input type="text" name="amount" class="form-control" placeholder="000.00">
                    </div>
                </div>
                <div class="row text-center mt-4">
                    <label for="pronuce" class="col-sm-3 control-label">pronuce</label>
                    <div class="col-sm-6">
                        <input type="text" name="pronuce" class="form-control" placeholder="หน่วยนับ..">
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