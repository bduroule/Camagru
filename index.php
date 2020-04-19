<?php
	session_start();
	include 'database.php';
	header("content-type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>Bedumagru</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="stylesheet" href="./css/index.css">
	<link rel="stylesheet" href="./css/connexion.css">
	<link rel="stylesheet" href="./css/profile.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
		<nav class="navbar is-fixed-top bandau" role="navigation" aria-label="main navigation">
			<div class="container">
				<div class="navbar-brand">
					<a href="./" class="navbar-item logo black" style="color: black">Bedumagru</a>
				    <a id="button" onclick="clickButton()" value="0" role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" style="margin-top: 1.8%;">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>
				<div id="menu" style="display: none;" id="navbar-menu-id" class="navbar-menu is-mobile is-active">
					<div class="navbar-start">
						<?php
							if (!isset($_SESSION['user_uid'])) :
						?>
						<a class="navbar-item" href="?page=connect">se connecter</a>
						<a class="navbar-item" href="?page=create">cree une compote</a>
						<?php
							else :
						?>
						<a class="navbar-item" href="?page=profile">Profile</a>
						<a class="navbar-item" href="?page=like">Like</a>
						<a class="navbar-item" href="?page=photo">Photo</a>
						<a class="navbar-item" href="?page=deconection">Deconection</a>
						<?php 
							endif;
						?>
					</div>
				</div>
				<div class="navbar-menu">
					<div class="navbar-end">
						<?php
							if (@$_GET['page'] != "create" && @$_GET['page'] != "connect") :
						?>
						<div class="navbar-item" style="magin-right: 50%;">
							<p class="control has-icons-left">
      							<input class="input is-small" type="text" placeholder="Search">
     							<span class="icon is-left">
       								<span style="display:inline-block; width:14px; height: 14px; background-color: grey; mask-image: url('icone/search.svg'); mask-size: contain;"></span>
     							</span>
   							 </p>
						</div>
						<?php
							endif;
							if (isset($_SESSION['user_name'])) :
						?>
						<div class="navbar-item">
							<a href="?page=profile" class="image">
								<img src="img/<?=$_SESSION['user_img']?>" class="is-rounded" />
							</a>
						</div>
						<div class="navbar-item icone"> 
							<a href="./" class="home <?= !@$_GET['page'] || @$_GET['page'] == "gallery" ? "home_active" : 0;?>"></a>
						</div>
						<div class="navbar-item icone">
							<a href="?page=like" class="likes <?= @$_GET['page'] == "like" ? "like_active" : 0;?>"></a>
						</div>
						<div class="navbar-item icone">
							<a href="?page=photo" class="photo <?= @$_GET['page'] == "photo" ? "photo_active" : 0;?>"></a>
						</div>
						<div class="navbar-item icone">
							<a href="?page=deconection" class="logout"></a>
						</div>
						<?php
							else :
						?>
						<div class="navbar-item">
							<a href="?page=create" class="black button is-light is-small">
								Créer une compote
							</a>
						</div>
						<div class="navbar-item">
							<a href="?page=connect" class="white button is-dark is-small" >
								Connexion
							</a>
						</div>
						<?php
							endif;
						?>
					</div>
				</div>
			</div>
		</nav>
		<br />
		<div style="margin-top:62px"></div>
		<?php
			$droit = 0;
			if (isset($_GET['page']) AND !empty($_GET['page'])) {
				$_GET['page'] = str_replace("../","protect",$_GET['page']);
				$_GET['page'] = str_replace(";","protect",$_GET['page']);
				$_GET['page'] = str_replace("%","protect",$_GET['page']);
			}
			if (isset($_SESSION['user_uid']) AND !empty($_SESSION['user_uid'])) {
				$droit = 1;
			}
			if (@$_GET['page'] == "create")
				include "create.php";
			else if (@$_GET['page'] == "connect")
				include "connect.php";
			else if (@$_GET['page'] == "deconection" && $droit == 1)
				include "deconection.php";
			else if (@$_GET['page'] == "photo" && $droit == 1)
				include "photo.php";
			else if (@$_GET['page'] == "profile" && $droit == 1)
				include "profile.php";
			else if (@$_GET['page'] == "like_post" && $droit == 1)
				include "fun_like.php";
			else if (@$_GET['page'] == "like" && $droit == 1)
				include "like.php";
			else if (@$_GET['page'] == "push_comment" && $droit == 1)
				include "push_comment.php";
			else if (@$_GET['page'] == "upload_post" && $droit == 1)
				include "upload_post.php";
			else if (@$_GET['page'] == "change_info" && $droit == 1)
				include "change_info.php";
			else if (@$_GET['page'] == "delete_post" && $droit == 1)
				include "delete_post.php";
			else if (@$_GET['page'] == "delete_comm" && $droit == 1)
				include "delete_comm.php";
			else if (@$_GET['page'] == "commentaire")
				include "commentaire.php";
			else if (@$_GET['page'] == "change_passwd")
				include "change_passwd.php";
			else if (@$_GET['page'] == "forget")
				include "forget.php";
			else if (@$_GET['page'] == "email_valid")
				include "email_valid.php";
			else
				include 'galery.php';
		?>
	</body>
	<script type="text/javascript" src="javascript/burger_menu.js"></script>
</html>
