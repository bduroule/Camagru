<?php 

echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
var_dump($_REQUEST);
echo "</pre>";
        if (isset($_FILES["input-file"]["name"]) && !empty($_FILES['input-file']['name'])) {
            echo "<pre>cdcdcdcdcdcdcdcdcdcdc</pre>";
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["input-file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["input-file"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists


            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["input-file"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            }
            else {
                $name = $_FILES["input-file"]["tmp_name"];
                if (move_uploaded_file($name, $target_file)) {
                    echo "The file ". basename( $name). " has been uploaded.";
                    $uploadOk = 1;
                }
                else {
                    echo "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                }
                $name = md5(session_id().microtime()).'.png';
                $file = './img/'.$name;
                if (isset($_POST['filtre']) AND !empty($_POST['filtre']) AND $_POST['filtre'] != 'none' AND $uploadOk == 1) {
                    $filtre = "sticker/".$_POST['filtre'].'.png';

                    var_dump($filtre);
                    var_dump(file_exists($filtre));

                    $infos_src = @getImageSize($target_file);
                    $width = $infos_src[0];
                    $height = $infos_src[1];

                    $infos_src = @getImageSize($filtre);
                    $width_filter = $infos_src[0];
                    $height_filter = $infos_src[1];



                    //// Calcul des nouvelles dimensions
                    //list($width_tmp, $height_tmp) = getimagesize($filtre);
                    //$new_width = $width_tmp / 100 * $_POST['slider'];
                    //$new_height = $height_tmp / 100  * $_POST['slider'];
                    //
                    //// Redimensionnement
                    //$front = imagecreatetruecolor($new_width, $new_height);
                    //$image = imagecreatefrompng($filtre);
                    //$black = imagecolorallocate($front, 0, 0, 0);
                    //imagecopyresampled($front, $image, 0, 0, 0, 0, $new_width, $new_height, $width_tmp, $height_tmp);
                    //imagecolortransparent($front, $black);
                    


                    $destination_finale = imagecreatetruecolor($width, $height);
                    imagesavealpha($destination_finale, true);
                    $transparent_background = imagecolorallocatealpha($destination_finale, 0, 0, 0, 127);
                    imagefill($destination_finale, 0, 0, $transparent_background);
                    $back = imagecreatefromstring(file_get_contents(($target_file)));
                    $front = imagecreatefrompng($filtre);

                    imagecopy($destination_finale, $back, 0, 0, 0, 0, $width, $height);
                    imagecopy($destination_finale, $front, 0, 0, 0, 0, $width_filter, $height_filter);
                    imagepng($destination_finale, $file);

                    
                    unlink($target_file);
                } else {
                    rename($target_file, $file);
                }
            
    
                if ($uploadOk == 1) {
                    $uid = base_convert(hash('sha256', time() . mt_rand() . $name), 16, 36);
                    $user = $_SESSION['user_uid'];
                    echo "test {<br />".$name.'<br />'.$user.'<br />'.$uid;
                    $req = $bdd->prepare('INSERT INTO gallery(img_name, img_user, img_uid) VALUES (?, ?, ?)');
                    $req->execute(array($name, $user, $uid));
                    echo "blalalbalblabl on est la gros";
                    //if (!$req)
                        var_dump($bdd->errorInfo());
                }
            }
        }
        else if (isset($_POST['image']) && !empty($_POST['image'])) {
            $name = md5(session_id().microtime()).'.png';
            $file = 'img/'.$name;
            $imgName = 'img/tmp.png';
            $img = $_POST['image'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $fileData = base64_decode($img);
            //saving
            file_put_contents($imgName, $fileData);
            if (isset($_POST['filtre']) AND !empty($_POST['filtre']) AND $_POST['filtre'] != 'none') {
                $filtre = "sticker/".$_POST['filtre'].'.png';

                $infos_src = @getImageSize($imgName);
                $width = $infos_src[0];
                $height = $infos_src[1];

                $infos_src = @getImageSize($filtre);
                $width_filter = $infos_src[0];
                $height_filter = $infos_src[1];



                //// Calcul des nouvelles dimensions
                //list($width_tmp, $height_tmp) = getimagesize($filtre);
                //$new_width = $width_tmp / 100 * $_POST['slider'];
                //$new_height = $height_tmp / 100  * $_POST['slider'];
                //
                //// Redimensionnement
                //$front = imagecreatetruecolor($new_width, $new_height);
                //$image = imagecreatefrompng($filtre);
                //$black = imagecolorallocate($front, 0, 0, 0);
                //imagecopyresampled($front, $image, 0, 0, 0, 0, $new_width, $new_height, $width_tmp, $height_tmp);
                //imagecolortransparent($front, $black);
                


                $destination_finale = imagecreatetruecolor($width, $height);
                imagesavealpha($destination_finale, true);
                $transparent_background = imagecolorallocatealpha($destination_finale, 0, 0, 0, 127);
                imagefill($destination_finale, 0, 0, $transparent_background);
                $back = imagecreatefromstring(file_get_contents(($imgName)));
                $front = imagecreatefrompng($filtre);

                imagecopy($destination_finale, $back, 0, 0, 0, 0, $width, $height);
                imagecopy($destination_finale, $front, 0, 0, 0, 0, $width_filter, $height_filter);
                imagepng($destination_finale, $file);
                unlink($imgName);
            } else {
                rename($imgName, $file);
            }

            $uid = base_convert(hash('sha256', time() . mt_rand() . $name), 16, 36);
            $user = $_SESSION['user_uid'];
            $req = $bdd->prepare('INSERT INTO gallery(img_name, img_user, img_uid) VALUES (?, ?, ?)');
            $req->execute(array($name, $user, $uid));
        }
?>