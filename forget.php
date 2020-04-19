<?php
	if (isset($_POST['email']) AND !empty($_POST['email'])) {
		$_POST['email'] = htmlspecialchars($_POST['email']);
		$email = str_replace(array("\n","\r",PHP_EOL),'',$_POST['email']);
		$req = $bdd->prepare('SELECT * FROM users WHERE user_email = ? LIMIT 1');
		$req->execute(array($email));
		$result = $req->fetch(PDO::FETCH_ASSOC);

		if ($result) {
			$token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
			$req = $bdd->prepare('INSERT INTO token(user_uid, token_creat) VALUES (?, ?)');
			$req->execute(array($result['user_uid'], $token));
			$header="MIME-Version: 1.0\r\n";
			$header.='From:"Bedumagru"<bduroule101@gamil.com>'."\n";
			$header.='Content-Type:text/html; charset="uft-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';
			$message='
			<html>
				<body>
					<div align="center">
						<br />
						<a href="http://127.0.0.1/bedu/Camagru/?page=change_passwd&uid='.$token.'">cliquer sur ce lien pour reinitialisez votre mot de pass</a>
					</div>
				</body>
			</html>
			';
			mail($email, "reinitialiser mot de passe", $message, $header);
			header("Location: index.php?page=connect");
		}
		else
			var_dump($bdd->errorInfo());
	}
?>

<div class="columns is-vcentered">
  <div class="login column is-4 ">
    <section class="section">
      <div class="has-text-centered">
          <div class="login-logo title_connexion">Bedumagru</div>
	  </div>
	  <form action="index.php?page=forget" method="post">
      <div class="field">
        <div class="control has-icons-right">
          <input class="input" name="email" type="email" placeholder="tapez votre email">
          <span class="icon is-small is-right">
            <i class="fa fa-user"></i>
          </span>
        </div>
      </div>
      <div class="has-text-centered">
        <button class="button is-dark is-fullwidth is-vcentered" type="submit" value="OK">Login</button>
      </div>
	</form>
    </section>
  </div>
  <div  class="interactive-bg column background-for is-8">
 	 <!-- <img src="backgroud/connect.jpg"> -->
  </div>
</div>