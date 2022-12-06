<?php include ('../includes/connection.php');?>
<?php include ('insert-img.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <link rel="stylesheet" href="../css/insertimg.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class="frame">
	<div class="center1">
		
		<div class="title">
			<!--<label for="imgname">Nombre: </label>
			<input type="text" name="imgname" id="imgname" required>-->
			<!--<select name="ext" id="ext" required>
				<option value=".png">.png</option>
				<option value=".jpg">.jpg</option>
				<option value=".jpeg">.jpeg</option>
			</select>-->
		
		</div>

		<div class="dropzone">
			<img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
			
			
		</div>
		<input type="file" accept="image/png, image/.jpeg, image/.jpg" name="imgfile" required/>
		<button type="submit" class="btn" name="uploadbutton">Upload file</button>
		<button type="button" class="btn" name="back"><a href="gallery.php?id=<?=$_GET['idUser']?>">Back</a></button>
	</div>
	
</div>
</form>
<!-- original pen: https://codepen.io/roydigerhund/pen/ZQdbeN  -->

<!-- NO JS ADDED YET -->
</body>
</html>
<?php include ('../includes/disconnection.php');?>