<?php
require "main.php";

if( empty($_POST['email']) || empty($_POST['password']) ){
    $_SESSION['warn'] = "โปรดกรอก Email และ password ให้ครบถ้วน";
    header("location ../login.php");
}

$email = $_POST['email'];
$password = $_POST['password'];

try{
    $response = $dbcon->prepare("SELECT * FROM user WHERE email = :mail");
    $response->bindParam(":mail", $email);
    $response->execute();
    $row = $response->fetchAll(PDO::FETCH_ASSOC);

    if($response->rowCount() > 0){
        if(password_verify($password ,$row[0]['password'])){
            $_SESSION['uid'] = $row[0]['u_id'];
            $_SESSION['fname'] = $row[0]['f_name'];
            $_SESSION['lname'] = $row[0]['l_name'];
            $_SESSION['weight'] = $row[0]['weight'];
            $_SESSION['height'] = $row[0]['height'];
            $_SESSION['gender'] = $row[0]['gender'];
            $_SESSION['ckd'] = $row[0]['k_id'];

            
            // Code ดึงข้อมูลการกินอาหารแบบตรวจสอบวันที่ 
            $sql = "SELECT sum(food.protean) AS p1 ,sum(food.phosphorus) AS p2 ,sum(food.potassium) AS p3 ,sum(food.sodium) AS p4 FROM food inner join dish on food.f_id=dish.f_id WHERE dish.u_id = :u_id and dish.created_date = CURDATE()";
            $qry = $dbcon->prepare($sql);
            $qry->bindParam(":u_id", $_SESSION['uid']);
            $qry->execute();
            $food_row = $qry->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['protean'] = $food_row[0]['protean'];
            $_SESSION['phosphorus'] = $food_row[0]['phosphorus'];
            $_SESSION['potassium'] = $food_row[0]['potassium'];
            $_SESSION['sodium'] = $food_row[0]['sodium'];
            
            header("location: ../user.php");
        }else{
            $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง';
            // echo "error";
            header("location: ../login.php");
        }

    }else{
        $_SESSION['error'] = "ไม่พบ Email นี้ในระบบ";
            // echo "error";
		header("location: ../login.php");
    }
}catch(PDOException $e){
    echo "Error " . $e->getMessage();
}



?>