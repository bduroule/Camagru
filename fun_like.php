<?php
    if (!isset($_GET['img_id']) || !isset($_SESSION['user_uid']) || !isset($_GET['dd']))
    {
        header('location: '.$_SERVER['HTTP_REFERER'].'');
        die ();
    }
    echo $_GET['dd']."<br />";
    echo $_SESSION['token'];
    if (isset($_SESSION['token']) AND !empty($_SESSION['token']) AND isset($_GET['dd']) AND !empty($_GET['dd'])) {
        if ($_SESSION['token'] == $_GET['dd']) {
            $img_id = @$_GET['img_id'];

            $req = $bdd->prepare('SELECT * FROM gallery WHERE img_uid = ? LIMIT 1');
            $req->execute(array($img_id));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            if (!$result)
            {
                header('location: '.$_SERVER['HTTP_REFERER'].'');
                die ();
            }
                
            $req = $bdd->prepare('SELECT * FROM likes WHERE like_post = ? AND like_user = ?');
            $result = $req->execute(array($img_id, $_SESSION['user_uid']));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            if (!$result)
            {
                $req = $bdd->prepare('INSERT INTO likes(like_post, like_user) VALUES (?, ?)');
                $req->execute(array($img_id, $_SESSION['user_uid']));
                $req = $bdd->prepare('UPDATE gallery SET nb_like = (nb_like + 1)  WHERE img_uid = ?');
                $req->execute(array($img_id));
            }
            else
            {
                $req = $bdd->prepare('DELETE FROM likes WHERE like_post = ? AND like_user = ?');
                $result = $req->execute(array($img_id, $_SESSION['user_uid']));
                if ($result)
                {
                    $req = $bdd->prepare('UPDATE gallery SET nb_like = (nb_like - 1)  WHERE img_uid = ?');
                    $req->execute(array($img_id));
                }
            }
            $last = substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/' ) + 1);

            if ($last == "" || $last = "index.php")
                header('location: '.$_SERVER['HTTP_REFERER'].'#img-'.$img_id.'');
            else
                header('location: '.$_SERVER['HTTP_REFERER'].'');
        }
        else
        echo "<script>alert('pas les memem')</script>";
    }
    else
        echo "<script>alert('pas du tout')</script>";
?>
