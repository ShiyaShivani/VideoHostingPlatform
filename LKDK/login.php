<?php require_once("config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div div class="row">
	<div style="background:grey; color: #fff;" class="card">
	 	<h1>Login to like and dislike..</h1>	
	</div>
</div>
<br>
    <div class="row"> 
    	<div class="col-sm-3">
    	</div>
    	<div class="col-sm-6">
    		<?php 
    		if(isset($_POST['login_submit']))
    		{
    			$login_var=$_POST['login_var']; 
    			$password=$_POST['password'];
    			$sql= "SELECT count(*) FROM users WHERE username=:login_var OR email=:login_var"; $stmt = $db->prepare($sql);
       $stmt->bindParam(':login_var', $login_var ,PDO::PARAM_STR);
    $stmt->execute();

        $count= $stmt->fetchColumn(); 
        if($count>0)
        {
        	 $sql="SELECT id,password FROM users WHERE username=:login_var OR email=:login_var"; $stmt=$db->prepare($sql);
        	 $stmt->bindParam(':login_var', $login_var ,PDO::PARAM_STR);
            $stmt->execute();
$row=$stmt->fetch();
if(password_verify($password,$row['password'])){
           $_SESSION["login_session"]="1";
           $_SESSION["userid"]=$row['id'];
  header("location:index.php");
        }
        else{
       echo 'Invalid Username or Password';
        }
        }
        else 
        {
        	echo 'Invalid Username or Password';
        }
    		}
    		?> 
    		<form action="" method="post">
  <div class="form-group">
    <label>Username or Email</label>
    <input type="text" class="form-control" placeholder="Username or email" name="login_var" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" required>
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary" name="login_submit">Login </button>
</form>
<br> 
OR 
<a href="register.php">Register</a>
    	</div>
    	<div class="col-sm-3">
    	</div>
    </div>
</div>
</body>
</html>