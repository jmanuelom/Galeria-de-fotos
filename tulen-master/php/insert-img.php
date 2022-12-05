<?php 
    $stmt = $link -> prepare("INSERT INTO images (id, idUser, nameimg, file) VALUES (null, :idUser, :nameimg, :file)");
    if(isset($_POST['uploadbutton'])) {
        
        try {
            $idUser = $_GET['idUser'];
            $nameimg = $_POST['imgname'];
            $file = $_POST['imgfile'];
            $stmt -> bindParam(":idUser", $idUser);
            $stmt -> bindParam(":nameimg", $nameimg);
            $stmt -> bindParam(":file", $file);
            
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