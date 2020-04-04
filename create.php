<?php
	$querry = $bdd->query('SELECT * FROM users');
	$err = 0;
	while ($row = $querry->fetch()) {
		if (isset($_POST['login']))
			if ($row['user_name'] == $_POST['login']) {
				$err = 2;
			}
		if (isset($_POST['email']))
			if ($_POST['email'] == $row['user_email']) {
				$err = 3;
			}
   }
	if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['checkpasswd']) && !$err) {
		if ($_POST['passwd'] == $_POST['checkpasswd']) {
			if (strlen($_POST['passwd']) > 8) {
				$passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
				$login = htmlspecialchars($_POST['login']);
				$email = htmlspecialchars($_POST['email']);
				$uid = base_convert(hash('sha256', time() . mt_rand()) . $login, 16, 36);
    			$req = $bdd->prepare('INSERT INTO users(user_name, user_email, user_uid, user_passwd) VALUES (?, ? ,? ,?)');
				$req->execute(array($login, $email, $uid, $passwd));
				//push token
				$token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
   				$req = $bdd->prepare('INSERT INTO token(user_uid, token_creat) VALUES (?, ?)');
   				$req->execute(array($uid, $token));
				//envoi mail
				if (!$req)
					var_dump($bdd->errorInfo());
				$header="MIME-Version: 1.0\r\n";
				$header.='From:"Bedumagru"<bduroule101@gamil.com>'."\n";
				$header.='Content-Type:text/html; charset="uft-8"'."\n";
				$header.='Content-Transfer-Encoding: 8bit';
				$message='
				<html>
					<body>
						<div align="center">
							<br />
							<a href="http://127.0.0.1/bedu/Camagru/?page=email_valid&uid='.$token.'">cliquer sur ce lien pour valider votre compte</a>
							<br />
							<img src="http://www.primfx.com/mailing/separation.png"/>
						</div>
					</body>
				</html>
				';
				mail($email, "validation compt", $message, $header);
				header("Location: index.php?page=connect");
			}
			else
				$err = 1;
		}
		else
			$err = 4;
	}
?>
<div class="columns is-vcentered">
      <div class="login column is-4 ">
        <section class="section">
          <div class="has-text-centered">
              <div class="login-logo title_connexion">Bedumagru</div>
          </div>

		  <form action="index.php?page=create" method="post">
	          <div class="field">
	            <div class="control has-icons-right">
	              <input class="input" type="login" name="login" placeholder="Identifian" require>
	              <span class="icon is-small is-right">
	                <i class="fa fa-user"></i>
	              </span>
	            </div>
				<p class="help red"><?php if ($err == 2){echo 'L\'identifiant est déjà bité';} ?></p>
	          </div>

	          <div class="field">
	            <div class="control has-icons-right">
	              <input class="input" type="email" name="email" placeholder="Entrer votre addresse mail" require>
	              <span class="icon is-small is-right">
	                <i class="fa fa-envelope"></i>
	              </span>
	            </div>
				<p class="help red"><?php if ($err == 3){echo 'L\'email est déjà utilisé';} ?></p>
	          </div>

	          <div class="field">
	            <div class="control has-icons-right">
	              <input class="input" type="password" name="passwd" placeholder="taper votre mots de passe" require>
	              <span class="icon is-small is-right">
	                <i class="fa fa-key"></i>
	              </span>
	            </div>
	          </div>

			  <div class="field">
	            <div class="control has-icons-right">
	              <input class="input" type="password" name="checkpasswd" placeholder="retaper votre mot de passe" require>
	              <span class="icon is-small is-right">
	                <i class="fa fa-key"></i>
	              </span>
	            </div>
				<p class="help red"><?php if ($err == 1){echo 'Le mots de passe doit avoir minimum 8 carhactere dont 1 chiffre et une majuscule';} ?></p>
	          </div>

	          <div class="has-text-centered">
	            <button class="is-fullwidth is-dark button is-vcentered" type="submit" value="OK">Sign Up!</button>
	          </div>
		</form>

        </section>
      </div>
      <div class="interactive-bg column background-creat is-8">

      </div>
    </div>

