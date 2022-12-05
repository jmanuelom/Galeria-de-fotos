<?php include ('../includes/connection.php');?>
<?php include ('modify-img.php');?>
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
	<div class="center1">
		<div class="title">
        <?php 
            $idUser = $_GET['id'];
            $idimg = $_GET['idimg'];
            $sql2 = $link -> query("SELECT * FROM images WHERE id=$idimg");
			$result = $sql2 -> fetch();
            $name = $result['nameimg'];
            $file = $result['file'];
        ?>
			<label for="imgname">Nombre de la foto: </label>
			<input type="text" name="imgname" id="imgname" placeholder="<?=$name?>" required>
		
		</div>
		<div class="dropzone">
			<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($file); ?>" class="upload-icon" />
		</div>
		<button type="submit" class="btn" name="updatefile">Update</button>
        <button type="button" class="btn" name="back"><a href="gallery.php?id=<?=$idUser?>">Back</a></button>
	</div>
</div>
</form>
<!-- original pen: https://codepen.io/roydigerhund/pen/ZQdbeN  -->

<!-- NO JS ADDED YET -->
</body>
</html>
<?php include ('../includes/disconnection.php');?>