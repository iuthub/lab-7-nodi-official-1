<?php
include('connection.php');
$db=new PDO("mysql:host=localhost;dbname=blog","shokha",".vgGTFrlh._E[5g8");
$add_user_stmt=$db->prepare("INSERT INTO users(id,username,email,password,fullname) VALUES (?,?,?,?,?)");
$username='';
$fullname='';
$email='';
$pwd='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$_REQUEST['username'];
$fullname=$_REQUEST['fullname'];
$email=$_REQUEST['email'];
$pwd=$_REQUEST['pwd'];
$add_user_stmt->execute(array($username,$fullname,$email,$pwd));
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>My Blog - Registration Form</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php include('header.php'); ?>

<h2>User Details Form</h2>
<h4>Please, fill below fields correctly</h4>
<form action="index.php" method="post">
    <ul class="form">
        <li>
            <label for="username">Username</label>
            <input type="text" name="username" value="<?=$username ?>" id="username" required/>
        </li>
        <li>
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" value="<?=$fullname ?>" id="fullname" required/>
        </li>
        <li>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?=$email ?>" id="email" />
        </li>
        <li>
            <label for="pwd">Password</label>
            <input type="password" name="pwd" value="<?=$pwd ?>" id="pwd" required/>
        </li>
        <li>
            <label for="confirm_pwd">Confirm Password</label>
            <input type="password" name="confirm_pwd" id="confirm_pwd" required />
        </li>
        <li>
            <input type="submit" value="Submit" /> &nbsp; Already registered? <a href="index.php">Login</a>
        </li>
    </ul>
</form>
</body>
</html>