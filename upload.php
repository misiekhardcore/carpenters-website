<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <main>
        <section class="gallery-upload">
            <div class="container">
                <h1>Prześlij zdjęcie</h1>
                
                <?php
                    if(isset($_SESSION['logged'])){
                        if(isset($_GET["upload"])){
                            $upload = htmlspecialchars($_GET["upload"]);
                            
                            if($upload == "success"){
                                echo '<p class="success">Przesłano pomyślnie</p>';
                            }
                            if($upload == "empty"){
                                echo '<p class="empty">Uzupełnij dane</p>';
                            }
                        }
                        echo<<<END
                        <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="filedesc" placeholder = "Opis..." required>
                        <input type="file" name="file" required>
                        <button type="submit" name="submit">Wyślij</button>
                        </form>
                        <a href="includes/logout.php">Wyloguj</a>
                        END;
                    } else {
                        if(isset($_GET['log'])){
                            $log = htmlspecialchars($_GET["log"]);
                            
                            if($log == "out"){
                                echo '<p class="success">Wylogowano pomyślnie</p>';
                            }
                            if($log == "fail"){
                                echo '<p class="empty">Złe dane logowania</p>';
                            }
                        }
                        echo<<<END
                        <form action="includes/login.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="login" placeholder = "Login" required>
                        <input type="password" name="pass" placeholder="Hasło" required>
                        <button type="submit" name="submit">Zaloguj</button>
                        </form>
                        END;
                    }
                ?>

                
            </div>
        </section>
        
    </main>
    
</body>
</html>