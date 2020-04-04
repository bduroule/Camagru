<?php
  $tmp = 0;
  $query = $bdd->query("SELECT gallery.img_uid, gallery.img_name, likes.like_user
                        FROM gallery 
                        INNER JOIN likes 
                        ON users.user_uid = gallery.img_user");
echo "<em>", var_dump($query->fetch()),"<em>";
while ($ligne = $query->fetch(PDO::FETCH_ASSOC)) :
  if ($tmp > 3)
    $tmp = 0;
  if ($tmp == 0) 
    echo '<div class="columns">';
?>
      <div class="column is-3">
        <div class="card" style="border-radius: 5px">
          <div class="card-image">
            <div style="background-image:url('img/<?=$ligne['img_name'];?>.jpg'); border-radius: 5px 5px 0px 0px; background-size:cover; width:100%; height:320px;">
            </div>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-left">
                <div style="display: flex; align-items: center; width: auto; height: 48px; line-height: 48px; vertical-align: middle;">
                <a href="#">
                  <img src="img/<?=$_SESSION['user_img']?>" style="border-radius: 50%; height: 32px; float: left;" alt="Placeholder image">
                </a>
                  <button class="button" style="margin-left: 6px; border: none;">
                    <span class="icon">
                      <img src="icone/like.svg" />
                    </span>
                    <span>
                      <?= $tmp?>
                    </span>
                  </button>
                  <button class="button" style="margin-left: 6px; border: none;">
                    <span class="icon">
                      <img src="icone/comment.svg" />
                    </span>
                    <span>
                      <?= $tmp?>
                    </span>
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