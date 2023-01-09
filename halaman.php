<?php include "auth.php"; ?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content=""> 
    <meta name="author" content=""> 
 
    <title>SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR | ILPS</title> 
     
    <!-- Favicons -->
    <link href="img/medical.ico" rel="icon">

    <!-- Custom fonts for this template --> 
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> 
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet"> 
 
    <!-- Custom styles for this template --> 
    <link href="css/sb-admin-2.min.css" rel="stylesheet"> 
 
    <!-- Custom styles for this page --> 
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
    
    <style>
        /* Modify the background color */
        *{margin: 0;padding: 0;box-sizing: border-box;}
        body{background: #eee;font-family: sans-serif;}
        .flexone{flex: 1;}

        .groups{margin: 0 auto;width: 780px;padding: 10px;height: auto;}
        .groups li{position: relative;list-style: none;background: #fff;border-radius: 5px;
            box-shadow: 0 3px 4px 0 #0001;overflow: hidden;margin-bottom: 30px;transition: all 0.3s;}
        .groups li:hover{transform: scale(1.04);box-shadow: 0 4px 14px 0 #0005;}
        .groups .card{overflow: hidden;display: block;}
        .groups .image-session{float: left;overflow: hidden;margin-right: 20px;}
        .groups .image-session .image{width: 280px;height: 220px;display: block;background-size: cover;
            background-position: center;}
        .groups .meta-sission{position: relative;padding: 15px;display: block;height: 220px;}
        .groups .meta-sission .head{display: flex;margin-bottom: 10px;}
        .groups .meta-sission .head .catogry{list-style: none;text-decoration: none;font-size: 14px;
            font-weight: 600;color: #0075ff;}
        .meta-sission .head .per span,
        .meta-sission .head .per input{display: block;font-size: 10px;text-align: right;}
        .meta-sission .head .per input{-webkit-appearance: none;height: 5px;border-radius: 5px;background: #0001;
            margin-bottom: 4px;overflow: hidden;}
        .meta-sission .head .per input::-webkit-slider-thumb{-webkit-appearance: none;width: 0;
            box-shadow: -100px 0 0 100px #0075ff;}
        .groups .body .title{height: 60px;overflow: hidden;font-size: 24px;}
        .groups .body .desc{height: 45px;overflow: hidden;margin-bottom: 10px;font-size: 13px;}
        .groups .footer .button{position: absolute;bottom: 20px;right: 25px;background: #0075ff;color: #fff;
            line-height: 2.2;padding: 0 20px;border-radius: 50px;text-decoration: none;
            box-shadow: 0 1px 6px 0 #0004;transition: all 0.3s;}
        .groups .footer .button:hover{box-shadow: 0 3px 8px 0 #0005;background: #063a78;right: 15px;}
        .groups .footer .views{display: block;font-size: 12px;margin-top: 40px;}

        @media screen and (max-width:780px){.groups{    width: 96%;}
            .groups li:hover{    transform: none;    box-shadow: none;}
        }

        @media screen and (max-width:560px){.groups .image-session{    float: none;    margin-right: 0;}
            .groups .image-session .image{width: 100%;}
        }
    </style>
</head> 
 
<body id="page-top">  
    <!-- Page Wrapper -->  
    <div id="wrapper">  
  
        <!-- Sidebar -->  
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">  
   
            <img src="img/medical.ico" class="rounded mx-auto d-block" height="50" width="50" alt="logo ilp" loading="lazy"/>
  
            <!-- Divider -->  
            <hr class="sidebar-divider my-0"> 
            
            <!-- Heading --> 
            <div class="sidebar-heading">
                <br>
                <center><h5>MENU</h5></center>
            </div> 
  
            <!-- Nav Item - Dashboard -->  
            <li class="nav-item active">  
                <a class="nav-link" href="index.php">  
                <i class="fa fa-home"></i>  
                <span>Halaman Utama</span></a>  
            </li> 

            <!-- logout --> 
            <li class="nav-item active"> 
                <a class="nav-link" href="logout.php"> 
                <i class="bi bi-door-closed"></i>
                <span>Log Keluar</span></a>
            </li>
 
            <!-- Divider --> 
            <hr class="sidebar-divider d-none d-md-block"> 
 
            <!-- Sidebar Toggler (Sidebar) --> 
            <div class="text-center d-none d-md-inline"> 
                <button class="rounded-circle border-0" id="sidebarToggle"></button> 
            </div>
        </ul> 
         
        <!-- Content Wrapper --> 
        <div id="content-wrapper" class="d-flex flex-column"> 

            <!-- Main Content --> 
            <div id="content"> 

                <!-- Topbar --> 
                <nav class="navbar navbar-expand navbar-light bg-white topbar"> 
 
                    <!-- Sidebar Toggle (Topbar) --> 
                    <form class="form-inline"> 
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> 
                            <i class="fa fa-bars"></i> 
                        </button> 
                    </form> 
 
                    <div class="container-fluid"> 
                        <a class="navbar-brand"  href="index.php"> 
                            SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR
                        </a> 
                    </div>

                    <!-- Topbar Logo 
                    <img src="img/ilpselandar.png" alt="" width="250px" height="80vh"> --> 
 
                    <!-- Topbar Navbar --> 
                    <ul class="navbar-nav ml-auto"> 
 
                        <!-- Nav Item - Search Dropdown (Visible Only XS) --> 
                        <li class="nav-item dropdown no-arrow d-sm-none"> 
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <i class="fas fa-search fa-fw"></i> 
                            </a> 
                            <!-- Dropdown - Messages --> 
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" 
                                aria-labelledby="searchDropdown"> 
                                <form class="form-inline mr-auto w-100 navbar-search"> 
                                    <div class="input-group"> 
                                        <input type="text" class="form-control bg-light border-0 small" 
                                            placeholder="Search for..." aria-label="Search" 
                                            aria-describedby="basic-addon2"> 
                                        <div class="input-group-append"> 
                                            <button class="btn btn-primary" type="button"> 
                                                <i class="fas fa-search fa-sm"></i> 
                                            </button> 
                                        </div> 
                                    </div> 
                                </form> 
                            </div> 
                        </li>
                    </ul> 
                </nav>
            </div>

            <!-- End of Topbar --> 

            <!-- header --> 
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> 
            <div class="carousel-inner"> 
                <div class="carousel-item active"> 
                <img class="d-block w-100" src="img/banner(1).png" alt="First slide"> 
                </div> 
                <div class="carousel-item"> 
                <img class="d-block w-100" src="img/banner(2).png" alt="Second slide"> 
                </div> 
                <div class="carousel-item"> 
                <img class="d-block w-100" src="img/banner(3).PNG" alt="Third slide"> 
                </div> 
            </div> 
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> 
                <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
                <span class="sr-only">Previous</span> 
            </a> 
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> 
                <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                <span class="sr-only">Next</span> 
            </a> 
            </div> 
            <!-- end of header --> 
                
            <br>

            <!-- Card Menu -->
            <?php
                include("menu.php")     // include : panggil fail lain ke fail yang lain
            ?>

            <!-- footer -->
            <?php
                include("footer.php");  // include : panggil fail lain ke fail yang lain
            ?>
            <!-- End of Footer -->

            <!-- Scroll to Top Button--> 
            <a class="scroll-to-top rounded" href="#page-top"> 
                <i class="fas fa-angle-up"></i> 
            </a> 
        
            <!-- Bootstrap core JavaScript--> 
            <script src="vendor/jquery/jquery.min.js"></script> 
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
        
            <!-- Core plugin JavaScript--> 
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 
        
            <!-- Custom scripts for all pages--> 
            <script src="js/sb-admin-2.min.js"></script>
        </div>
    </div>    
</body>
</html>