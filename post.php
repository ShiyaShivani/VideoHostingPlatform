<?php require_once("config.php");
if(!isset($_SESSION['login_session'])){ 
	header("location:login.php");
}
else 
{
	$userid=$_SESSION['userid'];
    include("functions.php");
    $post_id=$_GET['id'];
}
?>
<!DOCTYPE html>
<?php 
  $sql="SELECT * FROM video WHERE id=:id"; 
          $stmt=$db->prepare($sql);
          $stmt->bindParam(':id', $post_id ,PDO::PARAM_INT);
              $stmt->execute();
$row=$stmt->fetch();
$title=$row['name']; $content=$row['name']; $post_id=$row['id']; 
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Like Dislike (Unlike) system in PHP and AJAX</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="like_dislike.js"></script>
</head>
<body>
<div class="container">
	<div div class="row">
	<div style="background:grey; color: #fff;" class="card">
	 	<h1><?php echo $title; ?></h1>	<a href="logout.php">Logout</a>
	</div>
</div>
<br>
    <div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 list">
	  <div class="row card_item ">
	  	<div class="col-sm-12">
            <div class="content">
                
                <video width="100%" controls>
						<source src="upload/<?php echo $title;?>">
				</video>
                <br>
                <?php echo $content;?> 
            </div> 
        </div>
 <div class="col-sm-12">
    <hr>
        <i <?php
         if(userLikesDislikes($post_id,$userid,'like',$db)): ?>
              class="fa fa-thumbs-up like-btn"
          <?php else: ?>
              class="fa fa-thumbs-o-up like-btn"
          <?php endif ?>
          data-id="<?php echo $post_id; ?>"></i>
        <span class="likes"><?php echo getLikesDislikes($post_id,'like',$db); ?></span>
        
        &nbsp;&nbsp;&nbsp;&nbsp;
        <i 
          <?php if (userLikesDislikes($post_id,$userid,'dislike',$db)): ?>
              class="fa fa-thumbs-down dislike-btn"
          <?php else: ?>
              class="fa fa-thumbs-o-down dislike-btn"
          <?php endif ?>
          data-id="<?php echo $post_id; ?>"></i>
        <span class="dislikes"><?php echo getLikesDislikes($post_id,'dislike',$db); ?></span>

 </div>

     </div>
 </div>
 <div class="col-sm-2"></div>
    </div>
</div>
</body>
</html>