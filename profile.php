<div class="columns">
	<div class="container profile">
		<div class="modal" id="myModal">
			<br /><br /><br /><br /><br /><br /><br /><br />
	  <div class="modal-background"></div>
	  <div class="modal-card">
		<header class="modal-card-head">
		  <p class="modal-card-title">Edit Preferences</p>
		  <span id="close" class="delete close">>&times;</span>
		</header>
		<section class="modal-card-body">


			<div class="columns is-vcentered">
				<div class="column is-5">
				<div class="file">
				  <label class="file-label">
					<input onchange="readURL(this);" class="file-input" type="file" name="resume">
					<span class="file-cta">
					  <span class="file-icon">
					  <span style="display:inline-block; width:14px; height: 14px; background-color: grey; mask-image: url('icone/upload.svg'); mask-size: contain;"></span>
					  </span>
					  <span class="file-label">
						Choose a file…
					  </span>
					</span>
				  </label>
				</div>
				</div>
				<div class="column is-6">
				<figure class="image is-128x128">
					<img id="c-img" alt="your image" class="is-rounded" src="img/<?= $_SESSION['user_img']?>">
				</figure>
				</div>
			</div>

		  <label class="label">changer login</label>
		  <p class="control">
			<input class="input" placeholder="Text input" type="text"></input>
		  </p>
		  <label class="label">changer email</label>
		  <p class="control has-icon has-icon-right">
			<input class="input" placeholder="Text input" type="email"></input>
		  </p>
		  <label class="label">Description</label>
		  <p class="control">
			  <textarea class="textarea" placeholder="Describe Yourself!"></textarea>
			</p>
			<label class="label">changer mot de passe</label>
			<p class="control">
				<button class="button is-danger is-light is-fullwidth">envoyer un mail de reinitialisation</button>
			</p>
			<div class="field">
  				<input id="switchExample" type="checkbox" name="switchExample" class="switch" checked="checked">
 				 <label for="switchExample">Commentaire mail</label>
			</div>


		</section>
		<footer class="modal-card-foot">
          <a class="button is-dark modal-save">Save changes</a>
          <a class="button modal-cancel">Cancel</a>
        </footer>
		
		
		
		<!-- DEBUT PROFILE -->
		
		
		
	</div>
  </div>
	<div class="section profile-heading prof">
	  <div class="columns is-mobile is-multiline">
		<div class="column is-2">
		  <span class="header-icon user-profile-image">
			<img src="img/<?=$_SESSION['user_img']?>" style="border-radius: 50%;"/>
		  </span>
		</div>
		<div class="column is-4-tablet is-10-mobile name">
		  <p>
			<span class="title is-bold"><?=$_SESSION['user_name']?></span>
			<br/>
			<button class="button is-dark is-outlined" id="myBtn" style="margin: 5px 0">
			  Edit Preferences
			</button>
			<br/>
		  </p>
		  <p class="tagline">
			The users profile bio would go here, of course. It could be two lines or more or whatever. We should probably limit the amount of characters to ~500 at most though.
		  </p>
		</div>
		<div class="column is-2-tablet is-4-mobile has-text-centered">
		  <p class="stat-val">30</p>
		  <p class="stat-key">post</p>
		</div>
		<div class="column is-2-tablet is-4-mobile has-text-centered">
		  <p class="stat-val">10</p>
		  <p class="stat-key">likes</p>
		</div>
		<div class="column is-2-tablet is-4-mobile has-text-centered">
		  <p class="stat-val">3</p>
		  <p class="stat-key">comm</p>
		</div>
	  </div>
	</div>



	<div class="profile-options is-fullwidth">
	  <div class="tabs is-fullwidth is-medium">
		<ul>
		  <li class="link">
			<a>
			  <span class="icon">
				<i class="fa fa-list"></i>
			  </span>
			  <span>My Lists</span>
			</a>
		  </li>
		  <li class="link is-active">
			<a>
			  <span class="icon">
				<i class="fa fa-thumbs-up"></i>
			  </span>
			  <span>My Likes</span>
			</a>
		  </li>
		  <li class="link">
			<a>
			  <span class="icon">
				<i class="fa fa-search"></i>
			  </span>
			  <span>My Searches</span>
			</a>
		  </li>
		  <li class="link">
			<a>
			  <span class="icon">
				<i class="fa fa-balance-scale"></i>
			  </span>
			  <span>Compare</span>
			</a>
		  </li>
		</ul>
	  </div>
	</div>




<!--  CARD  -->




<?php
  $tmp = 0;
    $query = $bdd->prepare("SELECT * FROM gallery WHERE img_user = ?");
	$query->execute(array($_SESSION['user_uid']));
	
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
  </div>
  	<script src="profile.js"></script>
</div>
