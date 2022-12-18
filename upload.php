<?php 

include("db.php");

if (isset($_POST['upload'])) {
	// $name = $_FILES['file'];
	// echo "<pre>";
	// print_r($name);
	// exit();
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];	
	$temp_name = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$title = $_POST['title'];
	$descrip = $_POST['description'];
	$file_destination = "upload/".$file_name;

	if (move_uploaded_file($temp_name,$file_destination)) { 
	
	$q = "INSERT INTO video (name,UPLOAD_DATE,title,description) VALUES ('$file_name',NOW(),'$title','$descrip')";

	if(mysqli_query($conn,$q)) {

		$success = "Video uploaded successfully.";
	}
	else {
		
		$failed = "Something went wrong??";
	}
}
else {

	$msz = "Please select a video to upload..!";
}
}
?>

<!DOCTYPE html>
<html>
<head> 
	<title> Video Upload </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <script src="assets/js/jquery.min.js"></script> -->
</head>
<style>
	body{
	background: linear-gradient(0deg, rgba(85, 80, 80, 0.54), rgba(11, 11, 11, 0.333)), url(skstream.jpg);
    height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
	overflow:hidden;
	}
	.btn-success{
       background-color: red;
	}
   .col-lg-8{
	margin-top:100px;
	color:white;
	background: rgba(255, 255, 255, 0.15);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.2px);
-webkit-backdrop-filter: blur(6.2px);
border: 1px solid rgba(255, 255, 255, 0.3)
   }
   .mt-3, .my-3 {
    margin-top: 13rem!important;
}
input{
	border:none;
	background-color: transparent;
    color:white;

}
.inss{
	width: 246px;
}
</style>
<body>




<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">skstream</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index-1.php">Home</a>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>




	<div class="container mt-3">
		
				
				<div class="col-lg-8 m-auto">
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label><strong>Upload a Video:</strong></label>
						<p>Rename your video before uploading</p>
						 <input type="file" name="file" class="form-control">
					</div>
					<?php if(isset($success)) { ?>
					<div class="alert alert-success">

						

							<?php echo $success;?>

					</div>
					<?php } ?>
					<?php if(isset($failed)) { ?>
					<div class="alert alert-danger">

						

							<?php echo $failed;?>

					</div>
					<?php } ?>

					<?php if(isset($msz)) { ?>
					<div class="alert alert-danger">

						

							<?php echo $msz;?>

					</div>
					<?php } ?>
					<input type="text" name="vname" class="gen-name"></input>
					<label for="" >Title of the Video: <input type="text" name="title" class="inss"id="" style="background-color:white; color:black;"></label><br>
					<center>
					<label for="" >Description of the Video: 
						<textarea name="description" id="" cols="30" rows="2" style="background-color:white;">
						</textarea>
					</label>
					</center>
					<br>
					
					<input type="submit" name="upload" value="Upload" class="btn btn-success ml-3">
				</form>
				</div>
	</div>
</body>
</html>