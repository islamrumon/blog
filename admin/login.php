<?php
include "../lib/session.php";
 session::s_start();
include "../lib/Database.php";
include "../config/config.php";
include "../helpers/formet.php";
$db=new Database();
$for=new formet();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $name=$for->validation($_POST['name']);
			$pass=$for->validation($_POST['pass']);

			$name=mysqli_real_escape_string($db->link,$name);
			$pass=mysqli_real_escape_string($db->link,$pass);

			$query="SELECT * FROM user WHERE name='$name' AND pass='$pass'";
			$result=$db->select($query);
			if($result != false){
				$value=mysqli_fetch_array($result);
				$row=mysqli_num_rows($result);


				if($row > 0){
			             session::setvaleu( "login",true);
					     session::setvaleu('name',$value['name']);
					     session::setvaleu('id',$value['id']);
					header("Location:index.php");
				}else{
                      echo "UserName or Password is not match one ";
				}
			}else{
				echo "UserName or Password is not match";
			}

		}else{

		}

		?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="name"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="pass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>