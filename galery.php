<div class="container">
<?php
  $tmp = 0;
    $query = $bdd->query("SELECT gallery.img_uid, gallery.nb_comm, gallery.img_user, gallery.nb_like, gallery.img_name, users.user_name, users.user_img
                          FROM gallery 
                          INNER JOIN users 
                          ON users.user_uid = gallery.img_user
                          ORDER BY gallery.img_date DESC
                          ");
  while ($ligne = $query->fetch(PDO::FETCH_ASSOC)) :
    if (isset($_SESSION['user_uid']))
    {
      $req = $bdd->prepare('SELECT * FROM likes WHERE like_post = ? AND like_user = ? LIMIT 1');
      $result = $req->execute(array($ligne['img_uid'], $_SESSION['user_uid']));
      $user_has_liked = $req->fetch(PDO::FETCH_ASSOC);
    }
    else
     $user_has_liked = 0;


    if ($tmp > 3)
      $tmp = 0;
    if ($tmp == 0) 
      echo '<div class="columns">';
?>
      <div class="column is-3">
      <a id="img-<?= $ligne['img_uid']; ?>"></a>
        <div class="card" style="border-radius: 5px">
          <div class="card-image">
            <div style="background-image:url('img/<?=$ligne['img_name'];?>.jpg'); border-radius: 5px 5px 0px 0px; background-size:cover; width:100%; height:320px;">
            </div>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-left">
                <div style="display: flex; align-items: center; width: auto; height: 48px; line-height: 48px; vertical-align: middle;">
                <a href="#"></a>
                  <img src="img/<?= $ligne['user_img'] ?>" style="border-radius: 50%; height: 32px; float: left;" alt="Placeholder image">
                </a>
                  <button onclick="window.location='./?page=like_post&img_id=<?= $ligne['img_uid']; ?>';" class="button" style="margin-left: 6px; border: none;">
                    <span class="icon">
                      <img src="icone/<?= $user_has_liked ? "is_" : ""; ?>like.svg" />
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