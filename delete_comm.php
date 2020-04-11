<?php
    echo "<pre>";
    var_dump($_GET);
    echo "</pre>";

    $req = $bdd->prepare('SELECT * FROM comments WHERE uid = ? LIMIT 1');
    $req->execute(array($_GET['uid']));
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $tmp = $result['img_uid'];
    var_dump($result);
    if ($_SESSION['user_uid'] == $result['user_uid']) {
        $req = $bdd->prepare('UPDATE gallery
                                INNER JOIN comments
                                    ON comments.img_uid = gallery.img_uid
                                INNER JOIN users
                                    ON users.user_uid = gallery.img_user
                                SET gallery.nb_comm = (gallery.nb_comm - 1), users.nb_com = (nb_com - 1)
                                WHERE comments.uid = ?');
        $req->execute(array($result['uid']));
        $req = $bdd->prepare('DELETE FROM comments WHERE uid = ?');
        $req->execute(array($_GET['uid']));
        header("Location: index.php?page=commentaire&img=".$tmp);
    }
    else {
        echo 'non';
    }
?>