<?php
    require "main.php";
    $date = date("Y-m-d H:i:s");
    // 2024-01-14 19:14:57

    if(isset($_POST['email'])){
        $gender = $_POST['gender'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $state = $_POST['state'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($gender == 1){
            $gender = "ชาย";
        }else{
            $gender = "หญิง";
        }

        try{
            $check = $dbcon->prepare("SELECT email FROM user WHERE email = :mail");
            $check->bindParam(":mail", $email);
            $check->execute();
            
            if($check->rowCount() > 0){
                $_SESSION['warn'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='../login.php'>คลิกที่นี่</a> เพื่อเข้าสู่ระบบ";
                header("location: ../index.php");
            }else{
                $passwordHash = password_hash($password ,PASSWORD_DEFAULT);
                $stmt = $dbcon->prepare("INSERT INTO user(f_name,l_name,email,password,k_id,weight,height,gender,created_date,update_date) VALUES(:fname, :lname, :email, :password, :kid, :w, :h, :g, :cd, :ud)");
                $stmt->bindParam(":fname",$firstName);
                $stmt->bindParam(":lname",$lastName);
                $stmt->bindParam(":email",$email);
                $stmt->bindParam(":password",$passwordHash);
                $stmt->bindParam(":kid",$state);
                $stmt->bindParam(":w",$weight);
                $stmt->bindParam(":h",$height);
                $stmt->bindParam(":g",$gender);
                $stmt->bindParam(":cd",$date);
                $stmt->bindParam(":ud",$date);
                $stmt->execute();

                $id = $dbcon->prepare("SELECT u_id FROM user order by u_id DESC");
                $id->execute();
                $qid = $id->fetchAll(PDO::FETCH_ASSOC);

                $_SESSION['uid'] = $qid[0]['u_id'];
                $_SESSION['fname'] = $firstName;
                $_SESSION['lname'] = $lastName;
                $_SESSION['weight'] = $weight;
                $_SESSION['height'] = $height;
                $_SESSION['gender'] = $gender;
                $_SESSION['ckd'] = $state;

                $_SESSION['protean'] = 0;
                $_SESSION['phosphorus'] = 0;
                $_SESSION['potassium'] = 0;
                $_SESSION['sodium'] = 0;

                header("location: ../user.php");
            }
        }catch(PDOException $e){
            echo "Error " . $e->getMessage();
        }


    }

?>