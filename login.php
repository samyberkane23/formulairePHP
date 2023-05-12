<?php
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])){

    function validate($data){
        $date = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($uname)){
        header("Location: index.php?error=User Name is required");
        exit();
    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");
        exit();
    }else{

        //$pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM id WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) ===1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	header("Location: index.php?success=Vous êtes connecté&class=success");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}



?>