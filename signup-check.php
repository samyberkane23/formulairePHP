<?php
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])){

    function validate($data){
        $date = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['name']);

    $user_data = 'uname='. $uname. '&name='.$name;

    


    if(empty($uname)){
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    }else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    }
    else if(empty($re_pass)){
        header("Location: signup.php?error= RE Password is required&$user_data");
        exit();
    }
    else if(empty($name)){
        header("Location: signup.php?error= Name is required&$user_data");
        exit();
    }
    
    else if($pass !== $re_pass){
        header("Location: signup.php?error= the password is not the same&$user_data");
        exit();
    }
    else{

        //hash the password

        //$pass = password_hash($pass, PASSWORD_BCRYPT);

        $sql = "SELECT * FROM id WHERE username= '$uname'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=there are the same nameuser&$user_data");
        exit();    
        }else{
            
                echo "bravo";
                $sql2 = "INSERT INTO id(username, name, password) VALUES ('$uname', '$name', '$pass')";
                echo "bravo22";

                $result2 = mysqli_query($conn, $sql2);

            if($result2){
                header("Location: signup.php?success=your count is creat");
                exit();    

        }else{
            header("Location: signup.php?error= errorjj j&$user_data");
            exit();    
        }
        }
    }

}else{
    header("Location: signup.php");
    exit();
}?>