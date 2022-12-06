<?php include ('../includes/connection.php');?>
<?php include ("login-user.php");?>
<?php
    $stmt = $link -> prepare("INSERT INTO users (id, name, password) VALUES (null, :name, :password)");
    
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up / Login Form</title>
  <link rel="stylesheet" href="../css/style-sign-in.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Sign in / Log in</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="create-user.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="signinname" placeholder="User name" required="">
					<input type="password" name="signinpassword" placeholder="Password" required="">
					<button name="signup">Sign up</button>
                    <button type="button" class="btn"><a href="../../index.html">Back</a></button>
				</form>
                <?php
                if(isset($_POST['signup'])) {
        
        try {
            $name = $_POST['signinname'];
            $password = $_POST['signinpassword'];
            $stmt -> bindParam(":name", $name);
            $stmt -> bindParam(":password", $password);
            if($stmt -> execute()) {
                echo "<div class='alert alert-success' style='text-align:center; color:green'>El usuario ha sido creado correctamente</div>";
            } else {
                echo "<div class='alert alert-error' style='text-align:center'>Error al crear el usuario</div>";
            }    
        } catch (PDOException $ex){
            echo "<div class='alert alert-error' style='text-align:center; color:red'>Error al crear el usuario</div>";

        } catch (Exception $ex) {
            echo "<div class='alert alert-error' style='text-align:center; color:red'>Error al crear el usuario</div>";
        }
    } ?>
			</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="loginname" placeholder="User name" required="">
					<input type="password" name="loginpassword" placeholder="Password" required="">
					<button name="login">Login</button>
                    <button type="button" class="btn"><a href="../../index.html">Back</a></button>
                </form>
            </div>
        </div>
    
</body>
</html>
<!-- partial -->
  
</body>
</html>
<?php include ('../includes/disconnection.php');?>
