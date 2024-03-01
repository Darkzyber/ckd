<?php
    require "../php/main.php";

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
        <div class="display-3 text-center text-light">ข้อมูล User</div>
        <a href="index.php" class="btn btn-warning my-3">Back</a>
        <table class="table table-dark table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>ckd</th>
                    <th>weight</th>
                    <th>height</th>
                    <th>gender</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $food_st = $dbcon->prepare("SELECT * from user");
                $food_st->execute();

                while($row = $food_st->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                    <td>
                        <?php echo $row['u_id']?>
                    </td>
                    <td>
                        <?php echo $row['f_name']?>
                    </td>
                    <td>
                        <?php echo $row['l_name']?>
                    </td>
                    <td>
                        <?php echo $row['k_id']?>
                    </td>
                    <td>
                        <?php echo $row['weight']?>
                    </td>
                    <td>
                        <?php echo $row['height']?>
                    </td>
                    <td>
                        <?php echo $row['gender']?>
                    </td>
                    <td>
                        <?php echo $row['created_date']?>
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