<?php
  include_once "config/database.php";

  $token = 0;
  $n_carrd_p = 8;
  $total = $bdd->query('SELECT img_id FROM gallery');
  $cardTotale = $total->rowCount();
  $pageTotal = ceil($cardTotale / $n_carrd_p);

  if (isset($_GET['npage']) AND !empty($_GET['npage'])) {
    $_GET['npage'] = intval($_GET['npage']);
    $this_page = $_GET['npage'];
  }
  else {
    $this_page = 1;
  }
  $start = ($this_page - 1) * $n_carrd_p;
  $tmp = 0;
  if ($this_page > 1) {
      session_start();
  }
  $query = $bdd->prepare("SELECT gallery.img_uid, gallery.img_date, gallery.nb_comm, gallery.img_user, gallery.nb_like, gallery.img_name, users.user_name, users.user_img, users.user_uid
                        FROM gallery 
                        INNER JOIN users 
                        ON users.user_uid = gallery.img_user
                        ORDER BY gallery.img_date DESC
                        LIMIT :start, :end
                        ");
  $query->bindParam(":start", $start, PDO::PARAM_INT);
  $query->bindParam(":end", $n_carrd_p, PDO::PARAM_INT);
  $query->execute();

  if ($query->rowCount() <= 0)
  {
    die ("empty");
  }
  if (isset($_SESSION['user_uid'])) {
    if ($this_page == 1) {
      $token = md5(mt_rand().random_bytes(32));
      $_SESSION['token'] = $token;
    }

    else {
      $token = $_SESSION['token'];
    }
}
  echo '<div class="container">';
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
            <div style="background-image:url('img/<?=$ligne['img_name'];?>'); border-radius: 5px 5px 0px 0px; background-size:cover; width:100%; height:320px;">
            </div>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-left">
                <!-- BUTTON -->
                  <a href="index.php?page=profile&uid=<?= $ligne['user_uid']; ?>"><img src="img/<?= $ligne['user_img'] ?>" style="border-radius: 50%; height: 32px; float: left;" alt="Placeholder image">
                </a>
                  <button onclick="window.location='./?page=like_post&img_id=<?= $ligne['img_uid']; ?>&dd=<?= $token ?>';" class="button" style="margin-left: 6px; border: none;">
                    <span class="icon">
                      <img src="icone/<?= $user_has_liked ? "is_" : ""; ?>like.svg" />
                    </span>
                    <span style="color: black">
                      <?= $ligne['nb_like'] ?>
                    </span>
                  </button>
                  <button class="button" style="margin-left: 6px; border: none;">
                  <a href="index.php?page=commentaire&img=<?= $ligne['img_uid']?>&dd=<?= $token ?>">
                    <span class="icon">
                      <img src="icone/comment.svg" />
                    </span>
                    <span style="color: black">
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
                <!-- END BUTTON -->
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
      echo "<br />";
    ?>
  <div class="lasuitelasuitelasuite"></div>
  <script type="text/javascript" src="javascript/scroll.js"></script>
</div>