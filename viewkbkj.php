<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Data Maklumat Pelajar</title>

<!-- Favicons -->
<link href="img/medical.ico" rel="icon">

<!-- bootstrap untuk form -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- css -->
<link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2><b>Data Maklumat Pelajar</b></h2>
                        </div>
                            <?php
                                $vid=$_GET['viewid'];
                                $ret=mysqli_query($conn,"select * from data_pelajar where ID =$vid");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                            ?>
                    </div>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-hover" id="hidden-table-info">         
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td><?php  echo $row['nama'];?></td>
                            <th>NDP</th>
                            <td><?php  echo $row['ndp'];?></td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td><?php  echo $row['semester'];?></td>
                            <th>Bengkel</th>
                            <td><?php  echo $row['bengkel'];?></td>
                        </tr>
                        <tr>
                            <th>Masa Pergi</th>
                            <td><?php  echo $row['masa_pergi'];?></td>
                            <th>Masa Balik</th>
                            <td><?php  echo $row['masa_balik'];?></td>
                        </tr>
                        <tr>
                            <th>Sebab Sakit</th>
                            <td><?php  echo $row['sebab_sakit'];?></td>
                            <th width="200">Tarikh</th>
                            <td><?php  echo $row['tarikh'];?></td>
                        </tr>
                        <tr>
                            <th width="200">Kelulusan</th>
                            <td><img onclick="FullView(this.src)" src="profilepics/<?php  echo $row['ProfilePic'];?>" width="120" height="120"></td>
                        </tr>

                        <?php 
                            $cnt=$cnt+1;
                        }?>          
                    </tbody>
                </table>
                <a class="btn btn-info" href="datakbkj.php" role="button">Kembali</a> &nbsp;<a href="print_pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>

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
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> 
            </div>
        </div>
    </div>    
</body>
</html>