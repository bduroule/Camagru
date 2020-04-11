<div class="container">
<?php
  if (!isset($_SESSION['user_uid'])) {
    header('location: '.$_SERVER['HTTP_REFERER'].'');
        die ();
  }
  $tmp = 0;
  $query = $bdd->prepare("SELECT gallery.img_uid, gallery.img_name, likes.like_user, gallery.nb_like, gallery.nb_comm, users.user_uid, users.user_img
                          FROM likes
                          INNER JOIN gallery 
                            ON likes.like_post = gallery.img_uid
                          INNER JOIN users
                            ON  likes.like_user = users.user_uid
                          WHERE likes.like_user = ?
                          ");
  $query->execute(array($_SESSION['user_uid']));
  while ($ligne = $query->fetch(PDO::FETCH_ASSOC)) :
    if ($tmp > 3)
      $tmp = 0;
    if ($tmp == 0) 
      echo '<div class="columns">';
    //var_dump($ligne);
?>
    <div class="column is-3">
      <a id="img-<?= $ligne['img_uid']; ?>"></a>
        <div class="card" style="border-radius: 5px">
          <div class="card-image">
            <div style="background-image:url('img/<?=$ligne['img_name'];?>'); border-radius: 5px 5px 0px 0px; background-size:cover; width:100%; height:320px;">
            </div>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-left">
                <div style="display: flex; align-items: center; width: auto; height: 48px; line-height: 48px; vertical-align: middle;">
                <a href="#"></a>
                  <a href="index.php?page=profile&uid=<?= $ligne['user_uid']; ?>"><img src="img/<?= $ligne['user_img'] ?>" style="border-radius: 50%; height: 32px; float: left;" alt="Placeholder image">
                </a>
                  <button onclick="window.location='./?page=like_post&img_id=<?= $ligne['img_uid']; ?>';" class="button" style="margin-left: 6px; border: none;">
                    <span class="icon">
                      <img src="icone/is_like.svg" />
                    </span>
                    <span>
                      <?= $ligne['nb_like'] ?>
                    </span>
                  </button>
                  <button class="button" style="margin-left: 6px; border: none;">
                  <a href="index.php?page=commentaire&img=<?= $ligne['img_uid']?>">
                    <span class="icon">
                      <img src="icone/comment.svg" />
                    </span>
                    <span>
                    <?= $ligne['nb_comm'] ?>
                    </span>
                    </a>
                  </button>
                  <button class="button" style="margin-left: 6px; border: none;">
                    <span class="icon">
                      <img src="icone/share.svg" />
                    </span>
                    <span>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php 
      if ($tmp == 3) 
        echo '</div>';
      $tmp++;
      endwhile;
    ?>
    </div>