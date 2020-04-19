<?php
	$token = 0;
			//gallery.nb_comms		AS `image_comments`, 
	$req = $bdd->prepare("SELECT 
			gallery.img_name		AS `image_url`, 
			gallery.nb_like			AS `image_likes`, 
			gallery.img_uid			AS `image_uid`, 
			gallery.nb_comm			AS `image_comms`, 
			users.user_name			AS `post_username`,
			users.user_uid			AS `post_userid`, 
			users.user_img			AS `post_userimage`, 
			comments.comment		AS `comment`,
			comments.uid			AS `comm_uid`,
			comments.user_uid		AS `comment_userid`, 
			comments.date			AS `comment_date`, 
			user_comment.user_name	AS `comment_username`,
			user_comment.user_img	AS `comment_userimage`
		FROM gallery 
		INNER JOIN users 
			ON gallery.img_user = users.user_uid
		LEFT JOIN comments 
			ON gallery.img_uid = comments.img_uid
		LEFT JOIN users AS `user_comment`
			ON comments.user_uid = user_comment.user_uid
		WHERE gallery.img_uid = ?
		ORDER BY comments.date ASC");
	$req->execute(array($_GET['img']));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	$nb_comment = $result[0]['image_comms'];
	if (isset($_SESSION['user_uid'])) {
		$token = md5(mt_rand().random_bytes(32));
		$_SESSION['token'] = $token;
	}
	if ($result) :

?>

<div class="container">
	<div class="tile is-ancestor">
		<div class="tile is-vertical is-12">
			<div class="tile is-parent">
				<div class="columns tile is-child box">
					<div class="column" style="height: 720px;">
						<div style="width:100%; height: 100%; background-image: url('img/<?= $result[0]['image_url']; ?>'); background-size: cover; background-position: center;"> </div>
					</div>
					<div class="column is-4" style="height:648px; overflow-x: auto;">
						<!-- COMMENTAIRE -->
						<?php
							if ($nb_comment > 0) :
								foreach ($result as $comment) :
						?>
						<article class="media">
							<figure class="media-left">
								<p class="image is-48x48">
									<img class="is-rounded" src="img/<?= $comment['comment_userimage']; ?>">
								</p>
							</figure>
							<div class="media-content">
								<div class="content">
									<p>
										<strong><?= $comment['comment_username']; ?></strong> <small><?= $comment['comment_date']; ?></small>
										<?php 
											if (isset($_SESSION['user_uid'])) :
												if ($comment['comment_userid'] == $_SESSION['user_uid']) :
										?>
										<small><a href="index.php?page=delete_comm&uid=<?= $comment['comm_uid']; ?>&dd=<?= $token ?>" class="is-pulled-right delete"></a></small>
										<?php 
												endif;
											endif;
										?>
										<br>
										<?= $comment['comment']; ?>
									</p>
								</div>
							</div>
						</article>
						<?php 
								endforeach;
							endif;
						?>
						<!-- END COMMENTAIRE -->
						<!-- POST COMM -->
						<?php 
							if (isset($_SESSION['user_uid'])) :
						?>
						<article class="media" style="position:absolute; bottom:28px;">
						<form action="?page=push_comment" method="post">
						<input type="hidden" name="token" value="<?= $token ?>">
						<div class="columns is-gapless">
							<div class="column is-2">
								<figure class="media-left">
									<p class="image is-48x48">
									<img class="is-rounded" src="img/<?= $_SESSION['user_img']?>">
									</p>
								</figure>
							</div>
							<div class="column">
								<div class="media-content">
									<div class="field has-addons">
									<p class="control is-expanded">
									<input class="input is-fullwidth" type="text" name="comment" placeholder="Commenter">
									<input type="hidden" name="img_id" value="<?= $result[0]['image_uid'] ?>" />
									</p>
									</div>
								</div>
							</div>
							<div class="column is-3">
								<div class="media-right">
									<input type="submit" class="button is-dark"/>
								</div>
							</div>
						</div>
						 </form>
						</article>
						<?php
							endif;
						?>
						<!-- END POST COMM -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	else:
		echo "nique ta race";
	endif;
?>