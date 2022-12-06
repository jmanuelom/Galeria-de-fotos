<?php include ('../includes/connection.php');?>
<?php include ('modify-img.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify image</title>
    <link rel="stylesheet" href="../css/insertimg.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class="frame">
	<div class="center1">
		<div class="title">
        <?php 
            $idUser = $_GET['id'];
            $nameimg = $_GET['nameimg'];
            $sql2 = $link -> query("SELECT * FROM images WHERE nameimg='$nameimg'");
			$result = $sql2 -> fetch();
            $name = $result['nameimg'];
        ?>
		</div>
        <input type="file" accept="image/png, image/.jpeg, image/.jpg" name="newimg" required/>
		<div class="dropzone">
			<img src="uploadedimages/<?=$name?>" class="upload-icon"/>
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