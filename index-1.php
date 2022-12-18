<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<title>skstream</title>
	<link rel="stylesheet" href="inde1.css">
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
	.navbar-expand-lg{
		margin:0;
		padding:0;
		background-color:purple;
		height:60px;
	}
	/* .row{
		display: flex;
		flex-direction:row;
		flex-wrap:nowrap;
		margin:0;
		
	} */
	.col-md-4{
      max-width:70%; 
	}
	.vid{
		margin:0;
		background: rgba(255, 255, 255, 0.15);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6.2px);
-webkit-backdrop-filter: blur(6.2px);
border: 1px solid rgba(255, 255, 255, 0.3);
padding-top:20px;
padding-bottom:20px;
margin-top:20px;
	}
	.bg-light {
    background-color: #707070!important;
}
.navbar{
	color: white;
}
.btn-outline-success {
    --bs-btn-color: #fff;
	
}
.overlay{
	/* background: linear-gradient(0deg, rgba(85, 80, 80, 0.54), rgba(11, 11, 11, 0.333)), url(skstream.jpg); */
  
	background:cover;
}
/* .btn-primary{
 background-color:red;
 --bs-btn-hover-bg: #dc35455c;
 --bs-btn-border-color: #fff;

} */

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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Video</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="LKDK/index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Like</a></li>
            <li><a class="dropdown-item" href="#">Dislike</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Other action</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Link</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
	<div class="container mt-3 mb-3">
		
				<a href="upload.php" class="btn btn-primary mt-3">Upload a New Video</a>
				<hr/>
		<div class="row">
				<?php
				include("db.php");
					
				$q = "SELECT * FROM video";

				$query = mysqli_query($conn,$q);
				
				while($row=mysqli_fetch_array($query)) 
				{ 

					$name = $row['name'];
					$vn=$row['id'];
					?>
                    <div class="vid">
						<div class="overlay">
							<div id="fast" class="main col-md-4">
								<video width="100%" controls>
									<source src="upload/<?php echo $name?>">
								</video>
								
							</div>
							<div class="desc">
									<?php
										
										echo '<strong class="title">'.$row['title'].'</strong>';
										echo '<br>';
										
										echo $row['UPLOAD_DATE'];
									    echo '<br>';
										echo '<br>';
										echo $row['description'];
									?>

								    
							</div>
						</div>
						
					</div>

				<?php } ?>
             </div>
	</div>
				<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
<style>
	.overlay{
		display:inline-flex;
		
	}
	.main{
		width:50%;
	}
	.desc{
		width:50%;
	}
	.title{
		font-size:30px;
	}
</style>
</html>