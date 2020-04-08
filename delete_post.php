<?php
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
?>