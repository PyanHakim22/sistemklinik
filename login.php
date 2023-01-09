<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <!-- Favicons -->
	<link href="img/medical.ico" rel="icon">

    <title>SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR</title>
</head>

<body>
<?php
        include "connect.php";          // include : panggil fail lain ke fail yang lain
        session_start();
        if(isset($_POST['login'])){     
        $username = $_POST['username']; // $username & $ndp untuk declare
        $katalaluan = md5 ($_POST['katalaluan']);
        //echo $username;
        //echo $ndp;
        //Checking is user existing in the database or not
        $query = "SELECT * FROM login_pelajar WHERE username='{$username}'and katalaluan='{$katalaluan}'";    // $query : menentukan apabila username & ndp ada didalam (database login_pelajar) atau tidak.
        $result = mysqli_query($conn,$query);                                                   // $result: mengisytiharkan apabila username dan ndp ada dalam database. means kalau ada dalam db, so boleh login
        //semak username dan ndp baris ke baris...
        $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['username'] = $username;
        $_SESSION['katalaluan'] = $katalaluan;
        //panggil sebelum output dihantar
        header("Location: index.php"); // bawa pengguna ke index.php
        }else{
            echo "<div class='form'><h3>Nama Pengguna/NDP salah.</h3><br/>Klik disini untuk <a href='login.php'>Log  Masuk</a></div>";  // echo : nota atau message yang akan memaparkan "Nama Pengguna/NDP salah"
        }
        }else{
    ?>

    <div class="container">
        <div class="signin-signup">
            <form  method="post" class="sign-in-form">
                <img src="img/logoklinik.png" width="200" height="200">
                <h2 class="title" align="center">Log Masuk Pelajar</h2>
                <br>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nama Pengguna" name="username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Kata Laluan" name="katalaluan" maxlength="8">
                </div>
                <input type="submit" class="btn" name="login" value="Log Masuk">
                <p class="social-text" align="center"><b>Atau log masuk Pentadbiran, sila klik butang dibawah</b></p>
                <div class="social-media">
                    <a href="loginpentadbiran.php">
                        <img src="img/pentadbiran.png" width="50" height="50">&nbsp;
                    </a>
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>
            
            <form action="" class="sign-up-form" method="post">
            <img src="img/logoklinik.png" width="200" height="200">
                <h2 class="title">Daftar Pelajar</h2>
                <br>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nama Penuh" name="fullname" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Nama Pengguna" name="username" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="number" placeholder="Kata Laluan" name="katalaluan" required maxlength="8">
                </div>
                <input type="submit" value="Daftar" class="btn" name="register">     
            </form>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Sudahkah anda mendaftar?</h3>
                    <p>Sekiranya sudah daftar, sila log masuk.</p>
                    <button class="btn" id="sign-in-btn" name="login">Log Masuk Pelajar</button>
                </div>
                <img src="img/checkup.png" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                <h3>Anda ingin pergi ke klinik kesihatan untuk membuat pemeriksaan kesihatan?</h3>
                    <p>Sila daftar dahulu sebelum membuat pemeriksaan kesihatan di klinik.</p>
                    <button class="btn" id="sign-up-btn">Daftar Pelajar</button>
                </div>
                <img src="img/patient1.png" alt="" class="image">
            </div>
        </div>
    </div>
    <?php }?>
    <?php
        include "connect.php";
        if(isset($_POST['register'])){
            
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $katalaluan = md5 ($_POST['katalaluan']);

            $sql = "INSERT INTO login_pelajar(fullname,username, katalaluan) VALUES ('{$fullname}','{$username}','{$katalaluan}')";
            $rs = mysqli_query($conn, $sql);

            if(!$rs){
                echo "something went wrong ".mysqli_error($conn);
            }
            else{echo "<script type'text/javascript'>alert('Daftar Pelajar Berjaya Ditambah!')</script>";
                echo "<script type'text/javascript'>document.location = 'login.php';</script>";
            }
        } 
   ?>

    <!-- script -->
    <script src="app.js"></script>
    <!-- script -->
    
</body>
</html>