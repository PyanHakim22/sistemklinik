<?php include "auth.php" ?>
<?php
    //database conection  file
    include('connect.php');
    //Code for deletion
    if(isset($_GET['delid']))
    {
        $rid=intval($_GET['delid']);
        $profilepic=$_GET['ppic'];
        $ppicpath="profilepics"."/".$profilepic;
        $sql=mysqli_query($conn,"delete from  where ID=$rid");
        unlink($ppicpath);
        echo "<script>alert('Data deleted');</script>"; 
        echo "<script>window.location.href = 'datakbkj.php'</script>";     
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR</title>

    <!-- Favicons -->
    <link href="img/medical.ico" rel="icon">

    <!-- bootstrap untuk icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- Custom fonts for this template --> 
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="DataTables\css\dataTables.bootstrap5.min.css"> 

    <!-- Custom styles for this template --> 
    <link href="css/sb-admin-2.min.css" rel="stylesheet"> 

    <!-- Custom styles for this page --> 
    <link rel="stylesheet" href="style1.css">
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
                <center><h5>KBKJ</h5></center> 
            </div> 

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active"> 
                <a class="nav-link" href="datakbkj.php"> 
                    <i class="fas fa-fw fa-table"></i> 
                    <span>Data KBKJ</span></a> 
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
                        <a class="navbar-brand" href="index.php"> 
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
                <!-- End of Topbar --> 

                <!-- header --> 
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> 
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src=" img/banner(1).png " class="d-block w-100" alt="photo 1">
                        </div>
                        <div class="carousel-item">
                            <img src=" img/banner(2).png " class="d-block w-100" alt="photo 2">
                        </div>
                        <div class="carousel-item">
                            <img src=" img/banner(3).PNG " class="d-block w-100" alt="photo 3">
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

                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h1 class="text" align="center">DATA &nbsp; KBKJ</h1>
                        </div>
                    </div>
                </div>
                
                <div class="container mt-5 d-flex justify-content-center table-responsive">
                    <table class="table table-bordered table-hover w-60" id="example">
                        <thead>
                            <tr class="table-success">
                                <th style="height:60px; vertical-align: middle;" class="text-center">Bil</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Nama Penuh</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">NDP</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Semester</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Bengkel</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Tarikh</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Masa Pergi</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Masa Balik</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Sebab Sakit</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Kelulusan</th>
                                <th style="height:60px; vertical-align: middle;" class="text-center">Tindakan</th>											
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ret=mysqli_query($conn,"select * from data_pelajar");
                                $cnt=1;
                                $row=mysqli_num_rows($ret);
                                if($row>0){
                                while ($row=mysqli_fetch_array($ret)) {
                            ?>
                            <!--Fetch the Records -->
                            <tr>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php echo $cnt;?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['nama'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['ndp'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['semester'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['bengkel'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['tarikh'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['masa_pergi'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['masa_balik'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><?php  echo $row['sebab_sakit'];?></td>
                                <td style="height:60px; vertical-align: middle;" class="text-center"><img onclick="FullView(this.src)" src="profilepics/<?php  echo $row['ProfilePic'];?>" width="50" height="50"></td>
                                <td>
                                    <a href="viewkbkj.php?viewid=<?php echo htmlentities ($row['ID']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                </td>
                            </tr>
                            <?php 
                                $cnt=$cnt+1;
                                } } else {
                            ?>
                            <tr>
                                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                            </tr>
                            <?php } 
                            ?>   
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <!-- footer -->
                <?php
                    include("footer.php");
                ?>
                <!-- End of Footer -->
    
                <!-- Scroll to Top Button--> 
                <a class="scroll-to-top rounded" href="#page-top"> 
                    <i class="fas fa-angle-up"></i> 
                </a> 
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script> 
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

        <!-- Core plugin JavaScript--> 
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 

        <!-- Custom scripts for all pages--> 
        <script src="js/sb-admin-2.min.js"></script> 

        <!-- Page level plugins --> 
        <script src="vendor/datatables/jquery.dataTables.min.js"></script> 
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> 

        <!-- Page level custom scripts --> 
        <script src="js/demo/datatables-demo.js"></script>
    

        <div id="FullImageView">
            <img id="FullImage" />
            <span id="CloseButton" onclick="CloseFullView()">&times;</span>
        </div> 

        <script type="text/javascript">
            function FullView(ImgLink) {
                document.getElementById("FullImage").src = ImgLink;
                document.getElementById("FullImageView").style.display = "block";
            }
            function CloseFullView() {
                document.getElementById("FullImageView").style.display = "none";
            }
        </script>
        <script>            
            $(document).ready(function () {
            $('#example').DataTable({
            order: [[0, 'desc']],
            });
            });
        </script>  
    </div>
</body>
</html>