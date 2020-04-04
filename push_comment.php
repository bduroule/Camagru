<?php
    //print_r($_POST);
    if (!isset($_POST['img_id']) || !isset($_SESSION['user_uid']))
    {
        header('location: '.$_SERVER['HTTP_REFERER'].'');
        die ();
    }
    if ($_POST['comment'] != "") {
        $req = $bdd->prepare('INSERT INTO comments(user_uid, img_uid, comment) VALUES (?, ?, ?)');
        $req->execute(array($_SESSION['user_uid'], $_POST['img_id'], $_POST['comment']));
        $req = $bdd->prepare('UPDATE gallery SET nb_comm = (nb_comm + 1) WHERE img_uid = ?');
        $req->execute(array($_POST['img_id']));
    }
    header("location: index.php?page=commentaire&img=" . $_POST['img_id']);
?>