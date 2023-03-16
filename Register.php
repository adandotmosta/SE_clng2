<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RegisterPage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark-Multi-Column-icons.css">
</head>

<body>
    <div style="background: var(--bs-red);height: 900px;">
        <h1 style="margin-top: 20px;">Register Page</h1>
        <div style="margin-top: 50px;color: var(--bs-indigo);background: var(--bs-blue);">
            <div class="container" style="margin-bottom: 30px;">
                <div class="row" style="margin-top: 20px;margin-bottom: 30px;">
                <form method="post">
                    <div class="col-md-12"><input type="text" name="Email" placeholder="Email"></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><input type="password" placeholder="Password" name="psd"></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><input type="password" name="psdv" placeholder="Verify" style="margin-top: 30px;"></div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="margin-top: 30px;"><input type="password" name="usr" placeholder="UserName"></div>
                    <div class="row">
                    <div class="col-md-12" style="margin-top: 30px;"><input type="submit" name="sub" value="Register"></div>
                    <div class="col-md-12" style="margin-top: 30px;"><input type="submit" name="log" value="LogIn"></div>
</form>
                </div>
            </div>
            <footer class="text-white bg-dark"></footer>
        </div>
    </div>
    <?php
   
   $db = new MySQLi("localhost","root","","db_todo") or die("unable to connect");

   mysqli_query($db,"CREATE TABLE IF NOT EXISTS users(ID INT NOT NULL AUTO_INCREMENT,Email VARCHAR(30),Password VARCHAR(30),PRIMARY KEY(ID));");
   mysqli_query($db,"CREATE TABLE IF NOT EXISTS items (
    item_id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    create_time bigint(20) NOT NULL,
    id_u INT NOT NULL,
    PRIMARY KEY(item_id),
    FOREIGN KEY(id_u) REFERENCES users(ID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"); 
    session_start();
    if(isset($_POST['log'])){
        echo"<script> location.href = 'http://localhost/TO_DO/TO_DO_APP_SIMPLE-master/index.php' </script>";
                exit();
    }
    if(isset($_POST["sub"])){
        $email=$_POST['Email'];
        $psd=$_POST['psd'];
        $psdv=$_POST['psdv'];
        $usr =$_POST['usr'];
        if($psd==$psdv){
            $search= "SELECT * FROM users WHERE Email='$email' and Password='$psd' ;";
            $res =mysqli_query($db,$search);
            if(mysqli_num_rows($res)>0){
                echo "This User exists before, Enter A valid Identifiers";
            }else{
                $search="INSERT INTO users VALUES(NULL,'$email','$psd');";
                mysqli_query($db,$search);
                $result = "SELECT ID FROM users WHERE Email='$email' and Password='$psd';";
            $res= mysqli_query($db,$result);
            // extracting ID of user
            while($row=mysqli_fetch_assoc($res)){
                $id = $row['ID'];
            }
            $_SESSION['usr'] = $usr;
                $_SESSION['id'] = $id;
                echo"<script> location.href = 'http://localhost/TO_DO/TO_DO_APP_SIMPLE-master/index.php' </script>";
                exit();
            }
        }


    }




?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>