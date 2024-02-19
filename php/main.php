<?php

    session_start();
    date_default_timezone_set("Asia/Bangkok");

    $servername = "localhost";
    $username = "root";
    $userpass = "";
    $dbname = "db_ckd";

    try{
        $dbcon = new PDO("mysql:host=$servername;dbname=$dbname", $username , $userpass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected";
    }catch(PDOException $e){
        echo "Error:". $e->getMessage();
    }

    if(isset($_SESSION['warn'])){
        alert($_SESSION['warn']);
        unset($_SESSION['warn']);
    }


    function alert($warn){
        echo "<script>
                Swal.fire({
                    title: 'เลือกอาหาร',
                    text: '".$warn."',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                })
            </script>";
    }




    ###
    ##
    #   Function
    function datamine_ckd(){
        $ckd = $_SESSION['ckd'];
        if($ckd == '1'){
            $_SESSION['limit_sodium'] = 2300;
            $_SESSION['limit_phosphorus'] = 1000;
            $_SESSION['limit_potassium'] = 2350;
        }else if($ckd == '2'){
            $_SESSION['limit_sodium'] = 1750;
            $_SESSION['limit_phosphorus'] = 900;
            $_SESSION['limit_potassium'] = 2000;
        }else if($ckd == '3'){
            $_SESSION['limit_sodium'] = 1500;
            $_SESSION['limit_phosphorus'] = 800;
            $_SESSION['limit_potassium'] = 1500;
        }
    }


    

    # ยังไม่ได้ login
    function online($con){
        if(!isset($_SESSION['uid'])){
            $_SESSION['warn'] = "โปรดเข้าสู่ระบบก่อน";
            header("location: ../index.php");
        }else{
            $sql = "SELECT sum(food.protean) AS p1 
            ,sum(food.phosphorus) AS p2 
            ,sum(food.potassium) AS p3 
            ,sum(food.sodium) AS p4 
            FROM food inner join dish on food.f_id=dish.f_id 
            WHERE dish.u_id = :u_id and dish.created_date >= CURDATE()";
            
            $qry = $con->prepare($sql);
            $qry->bindParam(":u_id", $_SESSION['uid']);
            $qry->execute();
            $food_row = $qry->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['protean'] = $food_row[0]['p1'];
            $_SESSION['phosphorus'] = $food_row[0]['p2'];
            $_SESSION['potassium'] = $food_row[0]['p3'];
            $_SESSION['sodium'] = $food_row[0]['p4'];
            datamine_ckd();
        }
    }

    # login อยู่
    function offline(){
        if(isset($_SESSION['uid'])){
            header("location: ../user.php");
        }
    }

?>