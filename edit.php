<?php include "auth.php" ?>
<?php 
	//Database Connection
	include('connect.php');			// include : panggil fail lain ke fail yang lain
	if(isset($_POST['submit']))		
  	{
		$eid=$_GET['editid'];		// $username & $ndp dan lain2 untuk declare
		//Getting Post Values
		$nama=$_POST['nama'];
		$ndp=$_POST['ndp'];
		$semester=$_POST['semester'];
		$bengkel=$_POST['bengkel'];
		$masa_pergi=$_POST['masa_pergi'];
		$masa_balik=$_POST['masa_balik'];
		$sebab_sakit=$_POST['sebab_sakit'];

		//Query for data updation
		$query=mysqli_query($conn, "update  data_pelajar set nama='$nama',ndp='$ndp', semester='$semester', bengkel='$bengkel', masa_pergi='$masa_pergi', masa_balik='$masa_balik', sebab_sakit='$sebab_sakit' where ID='$eid'");	// $query : menentukan apabila username & ndp dan sebagainya ada didalam (database datapelajar) atau tidak.
		
		if ($query) {
			echo "<script>alert('You have successfully update the data');</script>";			// echo : nota atau message yang akan memaparkan "You have successfully update the data"
			echo "<script type='text/javascript'> document.location ='index.php'; </script>";	// membawa pengguna ke laman index.php
		}
		else
		{
			echo "<script>alert('Something Went Wrong. Please try again');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Kemaskini Data Pelajar</title>

<!-- Favicons -->
<link href="img/medical.ico" rel="icon">

<!-- bootstrap untuk form -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
	body {
		color: #fff;
		background: #C3D8E4;
		font-family: 'Roboto', sans-serif;
	}
	.form-control {
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus {
		border-color: #5cb85c;
	}
	.form-control, .btn {        
		border-radius: 3px;
	}
	.signup-form {
		width: 450px;
		margin: 0 auto;
		padding: 30px 0;
		font-size: 15px;
	}
	.signup-form h2 {
		color: #636363;
		margin: 0 0 15px;
		text-align: center;
	}
	.signup-form h2:before, .signup-form h2:after {
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before {
		left: 0;
	}
	.signup-form h2:after {
		right: 0;
	}
	.signup-form .hint-text {
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
	.signup-form form {
		color: #999;
		border-radius: 3px;
		margin-bottom: 15px;
		background: #f2f3f7;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 30px;
	}
	.signup-form .form-group {
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"] {
		margin-top: 3px;
	}
	.signup-form .btn {        
		font-size: 16px;
		font-weight: bold;		
		min-width: 140px;
		outline: none !important;
	}
	.signup-form .row div:first-child {
		padding-right: 10px;
	}
	.signup-form .row div:last-child {
		padding-left: 10px;
	}    	
	.signup-form a {
		color: #fff;
		text-decoration: underline;
	}
	.signup-form a:hover {
		text-decoration: none;
	}
	.signup-form form a {
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover {
		text-decoration: underline;
	}  
</style>
</head>
<body>
<div class="signup-form">
    <form  method="POST">
 	<?php
		$eid=$_GET['editid'];
		$ret=mysqli_query($conn,"select * from data_pelajar where ID='$eid'");
		while ($row=mysqli_fetch_array($ret)) {
	?>
		<h2><b>Kemaskini Data</b></h2>
		<p class="hint-text">PELAJAR</p>

        <div class="form-group">
			<label for="nama">Nama Penuh</label>
			<input type="text" class="form-control" name="nama" value="<?php echo $row['nama'];?>" required="true">    	
        </div>
		<div class="form-group">
			<label for="ndp">NDP</label>
			<input type="number" class="form-control" name="ndp" value="<?php echo $row['ndp'];?>" required="true">
        </div>
		<div class="form-group">
			<label for="semester">Semester</label>
			<input type="number" class="form-control" name="semester" value="<?php echo $row['semester'];?>" required="true">
        </div>
		<div class="form-group">
			<label for="bengkel">Bengkel</label>
				<select class="form-control" name="bengkel" aria-label="Default select example" value="<?php echo $row['bengkel'];?>" required="true" readonly>
					<option value="">--Sila Pilih Bengkel Anda--</option>
					<option>F04 - TEKNOLOGI PERISIAN (PEMBANGUNAN APLIKASI WEB)</option>
					<option>F01 - TEKNOLOGI KOMPUTER (SISTEM)</option>
					<option>F02 - TEKNOLOGI KOMPUTER (RANGKAIAN)</option>
					<option>A17 - TEKNOLOGI MINYAK & GAS (LUKISAN PERPAIPAN)</option>
					<option>A12 - TEKNOLOGI REKABENTUK (PRODUK INDUSTRI)</option>
				</select>
    	</div>
		<div class="form-group">
			<label for="masa_pergi">Masa Pergi</label>
			<input type="time" class="form-control" name="masa_pergi" value="<?php echo $row['masa_pergi'];?>" required="true">
        </div>
		<div class="form-group">
			<label for="masa_balik">Masa Balik</label>
			<input type="time" class="form-control" name="masa_balik" value="<?php echo $row['masa_balik'];?>" required="true">
        </div>
		<div class="form-group">
			<label for="Tarikh Mula Cuti">Sebab Sakit</label>
				<select name="sebab_sakit" class="form-control" value="<?php echo $row['sebab_sakit'];?>" required="true">
					<option value="">--Sila Pilih Sebab Sakit Anda--</option>
					<option>Demam</option>
					<option>Batuk</option>
					<option>Selsema</option>
					<option>Sakit Tekak</option>
					<option>Sakit Gigi</option>
					<option>Pening Kepala</option>
					<option>Sakit Perut</option>
					<option>Cirit Birit</option>
					<option>Migrain</option>
					<option>Sesak Nafas</option>
					<option>Sakit Jantung</option>
				</select>
    	</div>
		<div class="form-group">
			<img src="profilepics/<?php  echo $row['ProfilePic'];?>" width="120" height="120">
			<a href="change-image.php?userid=<?php echo $row['ID'];?>">Change Image</a>
		</div>

		<?php 
		}?>

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Kemaskini</button>
        </div>
    </form>
	<div class="text-center">Kembali ke Menu : &nbsp; <a href="datapentadbiran.php">Paparan Utama</a></div>
</div>
</body>
</html>