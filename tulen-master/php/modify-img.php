<?php 
    $stmt = $link -> prepare("UPDATE images SET nameimg=:nameimg WHERE id=:id");
    if(isset($_POST['updatefile'])) {
        try {
            $idUser = $_GET['id'];
            $idimg = $_GET['idimg'];
            $nameimg = $_POST['imgname'];
            $stmt -> bindParam(":nameimg", $nameimg);
            $stmt -> bindParam(":id", $idimg);
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