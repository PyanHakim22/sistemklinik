<?php include "auth.php" ?>
<?php 
	//Databse Connection file
	include('connect.php');
	if(isset($_POST['submit']))
	{
		//getting the post values
		$nama=$_POST['nama'];
		$ndp=$_POST['ndp'];
		$semester=$_POST['semester'];
		$bengkel=$_POST['bengkel'];
		$masa_pergi=$_POST['masa_pergi'];
		$sebab_sakit=$_POST['sebab_sakit'];
		$ppic=$_FILES["profilepic"]["name"];
		// get the image extension
		$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
		// allowed extensions
		$allowed_extensions = array(".jpg","jpeg",".png",".gif");
		// Validation for allowed extensions .in_array() function searches an array for a specific value.
		if(!in_array($extension,$allowed_extensions))
		{
		echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
		}
		else
		{
		//rename the image file
		$imgnewfile=md5($imgfile).time().$extension;
		// Code for move image into directory
		move_uploaded_file($_FILES["profilepic"]["tmp_name"],"profilepics/".$imgnewfile);
		// Query for data insertion
		$query=mysqli_query($conn, "insert into data_pelajar(nama, ndp, semester, bengkel, masa_pergi, sebab_sakit, ProfilePic) value('$nama', '$ndp', '$semester', '$bengkel', '$masa_pergi', '$sebab_sakit', '$imgnewfile' )");
		if ($query) {
		echo "<script>alert('You have successfully inserted the data');</script>";
		echo "<script type='text/javascript'> document.location ='index.php'; </script>";
		} else{
		echo "<script>alert('Something Went Wrong. Please try again');</script>";
		}}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Borang Pelepasan Ke Klinik</title>

	<!-- Favicons -->
	<link href="img/medical.ico" rel="icon">

	<!-- bootstrap untuk form -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<style>
	body {
		color: #fff;
		background: #D3CCE3;
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
	<div class="signup-form table-responsive">
		<form  method="POST" enctype="multipart/form-data" >
			<h2><b>Borang Pelepasan Pelajar</b></h2>
			<p class="hint-text">KE KLINIK</p>
			<div class="form-group">
				<label for="nama">Nama Penuh</label>
				<input type="text" class="form-control" name="nama" placeholder="Nama" required="true">     	
			</div>
			<div class="form-group">
				<label for="ndp">NDP</label>
				<input type="number" class="form-control" name="ndp" placeholder="NDP" maxlength="8" required="true">
			</div>
			<div class="form-group">
				<label for="semester">Semester</label>
				<input type="number" class="form-control" name="semester" placeholder="Semester" required="true">	
			</div>
			<div class="form-group">
				<label for="bengkel">Bengkel</label>
					<select class="form-control" name="bengkel" aria-label="Default select example">
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
				<label for="Tarikh Mula Cuti">Sebab Sakit</label>
				<select name="sebab_sakit" class="form-control">
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
				<label for="profilepic">Kelulusan</label>
				<input type="file" class="form-control" name="profilepic"  required="true">
				<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
			</div>      
		
			<div class="form-group">
				<button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
			</div>
		</form>
		<div class="text-center">Kembali ke Menu : &nbsp; <a href="index.php">Paparan Utama</a></div>
	</div>
</body>
</html>