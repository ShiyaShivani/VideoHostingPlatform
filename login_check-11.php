<!--
<html>
<head>
<title>HELLO</title>
</head>
<body>
    <p>Hello World</p>
    <label>Username:</label><?php echo $_POST["signin_email"];?>
    <label>Username:</label><?php echo $_POST["signin_pwd"];?>
</body>
</html>
-->
<?php
include('conn-11.php');
$userid=$_POST['signin_email'];
$pass=$_POST['signin_pwd'];
// $hash = password_hash($pass, PASSWORD_DEFAULT);
$hash = hash("sha256", $pass);
echo $hash;
  $sql="select * from master_login where email='$userid' and passwd='$hash' ";
$res=mysqli_query($conn,$sql);
if($result=mysqli_fetch_assoc($res))
{
$_SESSION['email']=$result['email'];
header('location:index-1.php');
}
else
{
 header('location:SIGN_UP.html');
}
?>