<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <title>SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR</title>

    <!-- Favicons -->
    <link href="img/medical.ico" rel="icon">

</head>

<body>

    <?php
        include "connect.php";                  // include : panggil fail lain ke fail yang lain
session_start();
        if(isset($_POST['pentadbiran'])) {
        $username = $_POST['username'];         // $username & $ic untuk declare
        $katalaluan = $_POST['katalaluan'];
        //echo $username;
        //echo $ic;
        //Checking is user existing in the database or not
        $query = "SELECT * FROM login_pentadbiran WHERE username='{$username}'and katalaluan='{$katalaluan}'";  // $query : menentukan apabila username & ic ada didalam (database login_pentadbiran) atau tidak.
        $result = mysqli_query($conn,$query);                                                   // $result: mengisytiharkan apabila username dan ndp ada dalam database. means kalau ada dalam db, so boleh login
        //semak username dan ic baris ke baris...
        $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['username'] = $username;
        $_SESSION['katalaluan'] = $katalaluan;  
        //panggil sebelum output dihantar
        header("Location: datapentadbiran.php"); // Redirect user to datapentadbiran.php
        }else{
        echo "<div class='form'><h3>Nama Pengguna/Kad Pengenalan salah.</h3><br/>Klik disini untuk <a href='loginpentadbiran.php'>Log Masuk</a></div>"; //mengeluarkan satu / lebih ungkapan, tanpa baris / ruang baharu tambahan
        }                                                                                                                                               // echo : nota atau message yang akan memaparkan "Nama Pengguna/Kad Pengenalan salah."
        }else{
    ?>
        <div class="container">
            <div class="signin-signup">
            <form  method="post" class="sign-in-form">
                <h1 class="title"><center>SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR</center></h1>
                <br>
                <img src="img/clinic.png" alt="" class="image">
            </form>

                <form action="" class="sign-up-form" method="post">
                <img src="img/logoklinik.png" width="200" height="200">
                    <h2 class="title" align="center">Log Masuk Pentadbiran</h2>
                    <br>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama Pengguna" name="username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Kata Laluan" name="katalaluan">
                    </div>
                    <input type="submit" value="Log Masuk" class="btn" name="pentadbiran">
                    <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
                </form>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h4>SELAMAT DATANG PENTADBIRAN KE SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR</h4>
                        <p>Sila log masuk untuk melihat data pelajar yang telah direkod.</p>
                        <button class="btn" id="sign-in-btn" name="login">Back</button>
                    </div>
                    <img src="img/loginkbkj.png" alt="" class="image">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h4>SELAMAT DATANG KBKJ KE SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR</h4>
                        <p>Sila log masuk untuk melihat data pelajar yang telah direkod.</p>
                        <button class="btn" id="sign-up-btn">Log Masuk Pentadbiran</button>
                    </div>
                    <img src="img/loginpentadbiran.png" alt="" class="image">
                </div>
            </div>
        </div>
        <?php }?>
    
        <script src="app.js"></script>
</body>
</html>