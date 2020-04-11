<?php
    //print_r($_POST);
    if (!isset($_POST['img_id']) || !isset($_SESSION['user_uid']))
    {
        header('location: '.$_SERVER['HTTP_REFERER'].'');
        die ();
    }
    if ($_POST['comment'] != "") {
        $uid = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
        $req = $bdd->prepare('INSERT INTO comments(uid, user_uid, img_uid, comment) VALUES (?, ?, ?, ?)');
        $req->execute(array($uid, $_SESSION['user_uid'], $_POST['img_id'], $_POST['comment']));
        $req = $bdd->prepare('UPDATE gallery SET nb_comm = (nb_comm + 1) WHERE img_uid = ?');
        $req->execute(array($_POST['img_id']));

        
        $req = $bdd->prepare('SELECT users.user_name, gallery.img_uid, users.user_email, users.email_com, users.user_uid
                            FROM gallery
                            INNER JOIN users
                            ON gallery.img_user = users.user_uid
                            WHERE gallery.img_uid = ?');
        $req->execute(array($_POST['img_id']));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        if ($result['email_com'] == 1) {
            $header="MIME-Version: 1.0\r\n";
		    $header.='From:"Bedumagru"<bduroule101@gamil.com>'."\n";
		    $header.='Content-Type:text/html; charset="uft-8"'."\n";
		    $header.='Content-Transfer-Encoding: 8bit';
		    $message='
		    <html>
		    	<body>
		    		<div align="center">
                        <br />
		    			<a href="http://127.0.0.1/bedu/Camagru/?page=commentaire&img='.$_POST['img_id'].'">'.$_SESSION['user_name'].' vous a laisser un commentaire cliquer pour voir</a>
		    		</div>
		    	</body>
		    </html>
		    ';
            mail($result['user_email'], "Commentaire", $message, $header);
        }
        $req = $bdd->prepare('UPDATE users SET nb_com = (nb_com + 1) WHERE user_uid = ?');
        $req->execute(array($result['user_uid']));
    }
    header("location: index.php?page=commentaire&img=" . $_POST['img_id']);
?>