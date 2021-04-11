<?php
include('connection.php');
$db=new PDO("mysql:host=localhost:82;dbname=blog","nodir", ".vgGTFrlh._E[5g8");
$add_table_stmt=$db->prepare('INSERT INTO posts(title,body) VALUES(?,?) ');
$get_table_stmt=$db->prepare('SELECT * FROM posts');
$title='';
$body='';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
$title=$_REQUEST['title'];
$body=$_REQUEST['body'];
$add_table_stmt->execute(array($title,$body));
}
$get_table_stmt->execute();
$rows=$get_table_stmt->fetchAll();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>My Personal Page</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php include('header.php'); ?>
<!-- Show this part if user is not signed in yet -->
<div class="twocols">
    <form action="index.php" method="post" class="twocols_col">
        <ul class="form">
            <li>
                <label for="username">Username</label>
                <input type="text" name="username"  id="username" />
            </li>
            <li>
                <label for="pwd">Password</label>
                <input type="password" name="pwd"  id="pwd" />
            </li>
            <li>
                <label for="remember">Remember Me</label>
                <input type="checkbox" name="remember" id="remember" checked />
            </li>
            <li>
                <input type="submit" value="Submit" /> &nbsp; Not registered? <a href="register.php">Register</a>
            </li>
        </ul>
    </form>
    <div class="twocols_col">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur libero nostrum consequatur dolor. Nesciunt eos dolorem enim accusantium libero impedit ipsa perspiciatis vel dolore reiciendis ratione quam, non sequi sit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nobis vero ullam quae. Repellendus dolores quis tenetur enim distinctio, optio vero, cupiditate commodi eligendi similique laboriosam maxime corporis quasi labore!</p>
    </div>
</div>
<!-- Show this part after user signed in successfully -->
<div class="logout_panel">
    <a href="register.php">My Profile</a>&nbsp;|&nbsp;<a href="index.php?logout=1">Log Out</a>
</div>
<h2>New Post</h2>
<form action="index.php" method="post">
    <ul class="form">
        <li>
            <label for="title">Title</label>
            <input type="text" name="title" value="<?=$title ?>" id="title" />
        </li>
        <li>
            <label for="body">Body</label>
            <textarea name="body" value="<?=$body ?>" id="body" cols="30" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" value="Post" />
        </li>
    </ul>
</form>
<div class="onecol">
    <?php foreach ($rows as $row) { ?>
        <div class="card">
            <dl>
                <dt>Title</dt>
                <dd><?=$row['title'] ?></dd>
                <dt> </dt>
                <dd><?=$row['body'] ?></dd>
            </dl>
        </div>
    <?php } ?>
</div>
</body>
</html>