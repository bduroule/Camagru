<?php
    if (isset($_SESSION['token']) AND !empty($_SESSION['token']) AND isset($_GET['dd']) AND !empty($_GET['dd'])) {
        if ($_SESSION['token'] == $_GET['dd']) {
            $req = $bdd->prepare('SELECT * FROM gallery WHERE img_uid = ? LIMIT 1');
            $req->execute(array($_GET['uid']));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            if ($_SESSION['user_uid'] == $result['img_user']) {
                $req = $bdd->prepare('DELETE FROM gallery WHERE img_uid = ?');
                $req->execute(array($_GET['uid']));
                unlink('img/'.$result['img_name']);
                header("Location: index.php?page=profile");
            }
            else {
                echo 'non';
            }
        }
        else
            echo "<script>alert('pas les memem')</script>";
    }
    else
        echo "<script>alert('nope')</script>";
?>