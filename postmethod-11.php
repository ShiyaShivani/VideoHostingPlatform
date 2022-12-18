<!--
<html>
<head>
<title>HELLO</title>
</head>
<body>
    <p>Hello World</p>
    <label>Username:</label><?php echo $_POST["name-1"];?>
    <label>Username:</label><?php echo $_POST["name-2"];?>
    <label>Username:</label><?php echo $_POST["name-3"];?>
    <label>Username:</label><?php echo $_POST["email"];?>
    <label>Username:</label><?php echo $_POST["pwd"];?>
    <label>Username:</label><?php echo $_POST["cpwd"];?>
</body>
</html>
-->
<?php
include('conn-11.php');
$fname=$_POST['name-1'];
$lname=$_POST['name-2'];
$uname=$_POST['name-3'];
$userid=$_POST['email'];
$pass=$_POST['pwd'];
// $hash = password_hash($pass, PASSWORD_DEFAULT);
$hash = hash("sha256", $pass);
$query="INSERT INTO master_login values('$userid','$hash')";
$data =mysqli_query($conn,$query);
if($data)
{
    echo "DATA INSERTED SUCCESFULLY";
}
else
{
    echo "DATA INSERTED UNSUCCESFULLY";
}
header('location:SIGN_IN.html');
?>



<?php
include('conn-11.php');
$fname=$_POST['name-1'];
$lname=$_POST['name-2'];
$uname=$_POST['name-3'];
$userid=$_POST['email'];
$pass=$_POST['pwd'];
// $hash = password_hash($pass, PASSWORD_DEFAULT);
$hash = hash("sha256", $pass);
$query="INSERT INTO master values('$fname','$lname','$uname','$userid','$hash',NOW())";
$data=mysqli_query($conn,$query);
if($data)
{
    echo "DATA INSERTED SUCCESFULLY";
}
else
{
    echo "DATA INSERTED UNSUCCESFULLY";
}
header('location:SIGN_IN.html');
?>

