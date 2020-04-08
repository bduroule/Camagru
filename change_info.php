<?php
    if (isset($_POST['submit']) AND $_POST['submit'] == 'OK') {
        if (isset($_POST['login']) AND !empty($_POST['login'])) {
            $reponse = $bdd->prepare('SELECT user_name FROM users WHERE user_name = ?');
            $reponse->execute(array($_POST['login']));
     
            if ($reponse->rowCount() == 1) {
                echo 'ce login est deja pris';
            } else {
                echo 'ce login est pas  pris';
                $req = $bdd->prepare('UPDATE users SET user_name = ? WHERE user_uid = ?');
                $req->execute(array($_POST['login'], $_SESSION['user_uid']));
            }
        }
        if (isset($_POST['email']) AND !empty($_POST['email'])) {
            $reponse = $bdd->prepare('SELECT user_email FROM users WHERE user_email = ?');
            $reponse->execute(array($_POST['email']));
     
            if ($reponse->rowCount() == 1) {
                echo 'cette email est deja prise';
            } else {
                $req = $bdd->prepare('UPDATE users SET user_email = ? WHERE user_uid = ?');
                $req->execute(array($_POST['email'], $_SESSION['user_uid']));
            }
        }
        if (isset($_POST['description']) AND !empty($_POST['description'])) {
     
            if (strlen($_POST['description']) > 250) {
                echo 'trop long frere';
            } else {
                $req = $bdd->prepare('UPDATE users SET u_describ = ? WHERE user_uid = ?');
                $req->execute(array($_POST['description'], $_SESSION['user_uid']));
            }
        }
        if (isset($_FILES['img_profil']['name']) AND !empty($_FILES['img_profil']['name'])) {
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["img_profil"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["img_profil"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            if ($_FILES["img_profil"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            }
            else {
                $name = $_FILES["img_profil"]["tmp_name"];
                if (move_uploaded_file($name, $target_file)) {
                    echo "The file ". basename( $name). " has been uploaded.";
                    $uploadOk = 1;
                }
                else {
                    echo "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                }
            }
            $name = md5(session_id().microtime()).'.png';
            $file = './img/'.$name;
            rename($target_file, $file);
            if ($uploadOk == 1) {
                $user = $_SESSION['user_uid'];
                $req = $bdd->prepare('UPDATE users SET user_img = ? WHERE user_uid = ?');
                $req->execute(array($name, $_SESSION['user_uid']));
                $_SESSION['user_img'] = $name;
            }
        }
        if (!isset($_POST['com_email'])) {
            $req = $bdd->prepare('UPDATE users SET email_com = ? WHERE user_uid = ?');
            $req->execute(array(0, $_SESSION['user_uid']));
        }
        else {
            $req = $bdd->prepare('UPDATE users SET email_com = ? WHERE user_uid = ?');
            $req->execute(array(1, $_SESSION['user_uid']));
        }
    }
    else if (isset($_POST['submit']) AND $_POST['submit'] == 'change_pass') {
        $req = $bdd->prepare('SELECT * FROM users WHERE user_uid = ? LIMIT 1');
        $req->execute(array($_SESSION['user_uid']));
		$result = $req->fetch(PDO::FETCH_ASSOC);

		if ($result) {
            $token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
			$req = $bdd->prepare('INSERT INTO token(user_uid, token_creat) VALUES (?, ?)');
			$req->execute(array($_SESSION['user_uid'], $token));
			$header="MIME-Version: 1.0\r\n";
			$header.='From:"Bedumagru"<bduroule101@gamil.com>'."\n";
			$header.='Content-Type:text/html; charset="uft-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';
			$message='
			<html>
				<body>
					<div align="center">
						<br />
						<a href="http://127.0.0.1/bedu/Camagru/?page=change_passwd&uid='.$token.'">cliquer sur ce lien pour reinitialisez votre mot de pass</a>
					</div>
				</body>
			</html>
			';
			mail($result['user_email'], "reinitialiser mot de passe", $message, $header);
        }
    }
    header("Location: index.php?page=profile");
?>