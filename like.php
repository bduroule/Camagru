<?php
  if (!isset($_SESSION['user_uid'])) {
    header('location: '.$_SERVER['HTTP_REFERER'].'');
        die ();
  }

  $n_carrd_p = 12;
	$total = $bdd->prepare('SELECT gallery.img_id, likes.like_id
                        FROM likes
                        INNER JOIN gallery 
                          ON likes.like_post = gallery.img_uid
                        INNER JOIN users
                          ON  users.user_uid = gallery.img_user
                        WHERE likes.like_user = ?');
  $total->execute(array($_SESSION['user_uid']));
  $cardTotale = $total->rowCount();
  //echo $cardTotale;
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
  $query = $bdd->prepare("SELECT gallery.img_uid, gallery.img_name, likes.like_user, gallery.nb_like, gallery.nb_comm, users.user_uid, users.user_img
                          FROM likes
                          INNER JOIN gallery 
                            ON likes.like_post = gallery.img_uid
                          INNER JOIN users
                            ON  users.user_uid = gallery.img_user
                          WHERE likes.like_user = :uid
                          ORDER BY likes.like_date DESC
                          LIMIT :start, :end
                          ");
  $query->bindParam(":start", $start, PDO::PARAM_INT);
  $query->bindParam(":end", $n_carrd_p, PDO::PARAM_INT);
  $query->bindParam(":uid", $_SESSION['user_uid']);
  $query->execute();
  if ($query->rowCount() <= 0)
  {
    die ("empty");
  }
  if (isset($_SESSION['user_uid'])) {
    $token = md5(mt_rand().random_bytes(32));
    $_SESSION['token'] = $token;
  }
  echo '<div class="container">';
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
                  <button onclick="window.location='./?page=like_post&img_id=<?= $ligne['img_uid']; ?>&dd=<?= $token ?>';" class="button" style="margin-left: 6px; border: none;">
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
      if ($tmp != 4)
        echo "</div>";
      if ($pageTotal > 1) :
    ?>

    <nav class="pagination" role="navigation" aria-label="pagination">
    <a class="pagination-previous" title="This is the first page" href="index.php?page=like&npage=<?= $this_page - 1 ?>">Previous</a>
    <a class="pagination-next" href="index.php?page=like&npage=<?= $this_page < $pageTotal ? $this_page += 1 : $this_page ?>">Next page</a>
      <ul class="pagination-list">
        <?php
          if ($pageTotal <= 4) :
            for ($i = 1; $i <= $pageTotal; $i++) :  
        ?>
        <li>
          <a class="pagination-link" aria-label="Page 1" aria-current="page" href="index.php?page=like&npage=<?= $i ?>"><?= $i ?></a>
        </li>
        <?php
           endfor;
          else :
        ?>
        <?php
          if ($this_page >= 4) :
        ?>
        <li>
          <a class="pagination-link" aria-label="Goto page 1" href="index.php?page=like&npage=1">1</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <?php
          endif;
          for ($i = $this_page - 2; $i <= $this_page; $i++) :
            if ($i == 0)
              $i++;
        ?>
        <li>
          <a class="pagination-link" aria-label="Goto page 45" href="index.php?page=like&npage=<?= $i ?>" ><?= $i ?></a>
        </li>
        <?php
          endfor;
          if ($this_page < $pageTotal) :
        ?>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link" aria-label="Goto page 86" href="index.php?page=like&npage=<?= $pageTotal ?>"><?= $pageTotal ?></a>
        </li>
        <?php
            endif;
          endif;
        ?>

      </ul>
    </nav>
    <?php 
      endif;
    ?>

  	<!-- <script type="text/javascript" src="javascript/like_scroll.js"></script> -->