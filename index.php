<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_index.css">
</head>

<body>

    <form action="login.php" method="post" >
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error'];?></p>

        <?php }?>
        <?php
            if(isset($_GET['success']) && isset($_GET['class'])) {
            $message = $_GET['success'];
            $class = $_GET['class'];
            echo "<p class='$class'>$message</p>";
            }
        ?>

        <br>
        <label>User name</label>
        <input type="text" name="uname" placeholder="User Name"><br>


        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>


        <button type="submit">Login</button><br>

        <a href="signup.php">Inscription</a><br>
        
    </form>


    <form action="affiche_db.php">
            <input type="submit" value="Afficher  la base de données">
        </form>

</body>
</html>