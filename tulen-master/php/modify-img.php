<?php 
    $stmt = $link -> prepare("UPDATE images SET nameimg=:nameimg WHERE nameimg=:nameimg2");
    if(isset($_POST['updatefile'])) {
        try {
            $idUser = $_GET['id'];
            $nameimg = $_GET['nameimg'];
            if(is_uploaded_file($_FILES["newimg"]["tmp_name"])) {
                $idUser = $_GET['id'];
                $name = $idUser . "-" . $_FILES["newimg"]["name"];
                move_uploaded_file($_FILES["newimg"]["tmp_name"], "uploadedimages/$name");
            }
            //$nameimg = $_POST['imgname'];
            $stmt -> bindParam(":nameimg", $name);
            $stmt -> bindParam(":nameimg2", $nameimg);
            if($stmt -> execute()) {
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
?>