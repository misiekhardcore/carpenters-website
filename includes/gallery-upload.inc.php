 <?php
//  if(isset($_POST['submit'])){
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg","jpeg","png");

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize<5000000){
                

                include_once "dbh.inc.php";

                if(empty($imageDesc)){
                    header("Location: ../upload.php?upload=empty");
                    exit();
                }else{
                    $sql = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        echo "SQL statement fail1";
                        exit();
                    } else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $imageFullName = $setImageOrder . "." . $fileActualExt;
                        $fileDestination = "../img/" . $imageFullName;

                        $sql = "INSERT INTO gallery (descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?);";
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement fail2";
                            exit();
                        } else{
                            mysqli_stmt_bind_param($stmt, "sss",$imageDesc,$imageFullName,$setImageOrder);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName, $fileDestination);

                            if($fileActualExt == "jpg" || $fileActualExt == "jpeg"){
                                $img = imagecreatefromjpeg($fileDestination);
                            }
                            if($fileActualExt == "png"){
                                $img = imagecreatefrompng($fileDestination);
                            }

                            $size = min(imagesx($img),imagesy($img));

                            $img = imagecrop($img,['x' => ((imagesx($img)-$size)/2),'y' => ((imagesy($img)-$size)/2), 'width' => $size, 'height' => $size]);
                            $img = imagescale($img,250);

                            if($fileActualExt == "jpg" || $fileActualExt == "jpeg"){
                                imagejpeg($img,'../img/img-thumbs/'.$imageFullName);
                            }
                            if($fileActualExt == "png"){
                                imagepng($img,'../img/img-thumbs/'.$imageFullName);
                            }
                            imagewebp($img,'../img/img-thumbs/'.$setImageOrder.'.webp');
                            imagedestroy($img);

                            header("Location: ../upload.php?upload=success");
                    }
                }
                }
            }else{
                echo("Image too big");
                exit();
            }

        }else{
            echo("Error");
            exit();
        }

    }else{
        echo ("Wrong extention");
        exit();
    }
//  }