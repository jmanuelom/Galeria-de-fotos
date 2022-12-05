<?php include ('../includes/connection.php');?>
<?php include ('insert-img.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/insertimg.css">
</head>
<body>
<form action="" method="post">
<div class="frame">
	<div class="center">
		
		<div class="title">
			<label for="imgname">Nombre de la foto: </label>
			<input type="text" name="imgname" id="imgname" required>
		
		</div>

		<div class="dropzone">
			<img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
			
			
		</div>
		<input type="file" accept="image/png, .jpeg, .jpg" name="imgfile" required/>
		<button type="submit" class="btn" name="uploadbutton">Upload file</button>
		
	</div>
</div>
</form>
<!-- original pen: https://codepen.io/roydigerhund/pen/ZQdbeN  -->

<!-- NO JS ADDED YET -->
</body>
</html>
<?php include ('../includes/disconnection.php');?>