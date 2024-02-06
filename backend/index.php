<?php
    require "../php/main.php";

    if(isset($_REQUEST['delete_id'])){
        $id = $_REQUEST['delete_id'];

        #REMOVE ALL ingredient 
        $del_1 = $dbcon->prepare("DELETE FROM ingredient WHERE f_id = :f_id");
        $del_1->bindParam(":f_id",$id);
        $del_1->execute();
        #REMOVE ALL Food
        $del_2 = $dbcon->prepare("DELETE FROM food WHERE f_id = :f_id");
        $del_2->bindParam(":f_id",$id);
        $del_2->execute();
        
        header("Location:index.php");
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
        <div class="display-3 text-center text-light">ข้อมูลอาหาร</div>
        <a href="add.php" class="btn btn-success my-3">เพิ่มอาหาร</a>
        <table class="table table-dark table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>food_name</th>
                    <th>lore</th>
                    <th>protean</th>
                    <th>phosphorus</th>
                    <th>potassium</th>
                    <th>sodium</th>
                    <th>c_id</th>
                    <th>recipe</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $food_st = $dbcon->prepare("SELECT * from food");
                $food_st->execute();

                while($row = $food_st->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                    <td>
                        <?php echo $row['f_id']?>
                    </td>
                    <td>
                        <?php echo $row['food_name']?>
                    </td>
                    <td>
                        <?php echo $row['lore']?>
                    </td>
                    <td>
                        <?php echo $row['protean']?>
                    </td>
                    <td>
                        <?php echo $row['phosphorus']?>
                    </td>
                    <td>
                        <?php echo $row['potassium']?>
                    </td>
                    <td>
                        <?php echo $row['sodium']?>
                    </td>
                    <td>
                        <?php echo $row['c_id']?>
                    </td>
                    <td>
                        <a href="recipe.php?recipe_id=<?php echo $row['f_id']?>" class="btn btn-info ">Edit</a>
                    </td>
                    <td>
                        <a href="edit.php?update_id=<?php echo $row['f_id']?>" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <a href="?delete_id=<?php echo $row['f_id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>


            <?php
                }
            ?>
            </tbody>


        </table>
        </div>
        <div class="vh25"></div>

    
</body>
</html>