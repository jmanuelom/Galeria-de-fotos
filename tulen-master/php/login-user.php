<?php
$stmt2 = $link -> prepare("SELECT * FROM users WHERE name=:name AND password=:password");
    if(isset($_POST['login'])) {
        
        try {
            $loginname = $_POST['loginname'];
            $loginpassword = $_POST['loginpassword'];
            $stmt2 -> bindParam(":name", $loginname);
            $stmt2 -> bindParam(":password", $loginpassword);
            $stmt2 -> execute();
            if($stmt2 -> fetchColumn() > 0) {
                $stmt3 = "SELECT id FROM users WHERE name='$loginname' AND password='$loginpassword'";
                $result = $link -> query($stmt3);
                $row = $result -> fetch();
                $id = $row['id'];
                header("location:gallery.php?id=$id");
            } else {
                echo "<div class='alert alert-error' style='text-align:center; color:red'>Usuario o contraseña incorrectos</div>";
            }

        } catch (PDOException $ex){
            die("Error PDO al loguear el usuario. " . $ex -> getMessage());

        } catch (Exception $ex) {
            die("Error al loguear el usuario. " . $ex -> getMessage());
        }
        
        
    }
?>