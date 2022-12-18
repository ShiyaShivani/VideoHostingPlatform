<?php require_once("config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div div class="row">
	<div style="background:grey; color: #fff;" class="card">
	 	<h1>Register</h1>	
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
    			$username=$_POST['username']; 
    			$password=$_POST['password'];
                $email=$_POST['email'];
        	 $sql="INSERT INTO users(username,email,password) VALUES(:username,:email,:password)"; 
             $stmt=$db->prepare($sql);
                    $options = array("cost"=>4);
    $password = password_hash($password,PASSWORD_BCRYPT,$options);

        	 $stmt->bindParam(':username', $username ,PDO::PARAM_STR);
              $stmt->bindParam(':email', $email ,PDO::PARAM_STR);
              $stmt->bindParam(':password', $password ,PDO::PARAM_STR);
            $res=$stmt->execute();
            if($res)
            {
                echo 'You have successfully registered. <a href="login.php">Login Here</a>';
            }
            else 
            {
               echo 'Something wrong'; 
            }
    		}
    		?> 
    		<form action="" method="post">
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" placeholder="Username" name="username" required>
  </div>
  <div class="form-group">
    <label>Email </label>
    <input type="email" class="form-control" placeholder="Username" name="email" required>
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password" required>
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary" name="login_submit">Register</button>
</form>
<br> 
OR 
<a href="login.php">Login</a>

    	</div>
    	<div class="col-sm-3">
    	</div>
    </div>
</div>
</body>
</html>