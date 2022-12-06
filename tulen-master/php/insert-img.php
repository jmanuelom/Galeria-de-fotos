<?php 
    $stmt = $link -> prepare("INSERT INTO images (id, idUser, nameimg) VALUES (null, :idUser, :nameimg)");
    if(isset($_POST['uploadbutton'])) {
        
        try {
            $idUser = $_GET['idUser'];
            //$nameimg = $_POST['imgname'];
            //$file = $_POST['imgfile'];
            if(is_uploaded_file($_FILES["imgfile"]["tmp_name"])) {
                $idUser = $_GET['idUser'];
                $name = $idUser . "-" . $_FILES["imgfile"]["name"];
                move_uploaded_file($_FILES["imgfile"]["tmp_name"], "uploadedimages/$name");
            }
            $stmt -> bindParam(":idUser", $idUser);
            $stmt -> bindParam(":nameimg", $name);
            //$stmt -> bindParam(":file", $file);
            
            if($stmt -> execute()) {
                /*$sql1 = $link -> query("SELECT id FROM images WHERE idUser=$idUser ORDER BY id DESC LIMIT 1"); 
                $result = $sql1 -> fetch();
                $idimg = $result['id'];
                if(is_uploaded_file($_FILES["imgfile"]["tmp_name"])) {
                    $ext = $_POST['ext'];
                    $idUser = $_GET['idUser'];
                    $name = $_POST['imgname'];
                    $nameimg = $idimg . "-" . $idUser . "-" . $name . $ext;
                    move_uploaded_file($_FILES["imgfile"]["tmp_name"], "uploadedimages/$nameimg");
                }*/
                header("location:gallery.php?id=$idUser");
            } else {
                echo '<div class="alert alert-danger">No se puede subir el archivo</div>';
            }

        } catch (PDOException $ex){
            die("Error PDO al loguear el usuario. " . $ex -> getMessage());

        } catch (Exception $ex) {
            die("Error al loguear el usuario. " . $ex -> getMessage());
        }
        
        
    }

    if(isset($_POST['uploadbutton'])) {
        if(is_uploaded_file($_FILES["imgfile"]["tmp_name"])) {
            $ext = $_POST['ext'];
            $idUser = $_GET['idUser'];
            $name = $_POST['imgname'];
            $nameimg = $idUser . "-" . $name . $ext;
            move_uploaded_file($_FILES["imgfile"]["tmp_name"], "uploadedimages/$nameimg");
        }
    }
?>