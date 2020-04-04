<?php
	$err = 0;
	$error = "";
	if (isset($_POST['email']) && isset($_POST['passwd']))
	{
		$email = $_POST['email'];
		$req = $bdd->prepare('SELECT * FROM users WHERE user_email = ? LIMIT 1');
		$req->execute(array($email));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if ($result)
		{
			if ($result['confirm'] == 1) {
				$checkpassword = password_verify($_POST['passwd'], $result['user_passwd']);
				if ($checkpassword == FALSE)
					$err = 1;
				else 
				{
					$_SESSION['email'] = $email;
					$_SESSION['user_uid'] = $result['user_uid'];
					$_SESSION['user_name'] = $result['user_name'];
					$_SESSION['user_img'] = $result['user_img'];
					header('location: index.php');
				}
			}
			else {
				$err = 2;
			}
		}
		else
			$err = 2;
		if ($err == 1)	
			$error = "Mot de passe ou addresse mail incorrect";
		else if ($err == 2)
			$error = "veuiller veriffier votre compte";
	}
?>
<div class="columns is-vcentered">
  <div class="login column is-4 ">
    <section class="section">
      <div class="has-text-centered">
          <div class="login-logo title_connexion">Bedumagru</div>
	  </div>
	  <form action="index.php?page=connect" method="post">
      <div class="field">
        <div class="control has-icons-right">
          <input class="input" name="email" type="email" placeholder="tapez votre email">
          <span class="icon is-small is-right">
            <i class="fa fa-user"></i>
          </span>
        </div>
      </div>
      <div class="field">
        <div class="control has-icons-right">
          <input class="input" name="passwd" type="password" placeholder="taper votre mot de passe">
          <span class="icon is-small is-right">
            <i class="fa fa-key"></i>
          </span>
        </div>
      </div>
      <div class="has-text-centered">
        <button class="button is-dark is-fullwidth is-vcentered" type="submit" value="OK">Login</button>
      </div>
      <div class="has-text-centered">
        <a href="index.php?page=forget">mot de pass oublier ?</a>
	  </div>
	</form>
    </section>
  </div>
  <div  class="interactive-bg column background-connect is-8">
 	 <!-- <img src="backgroud/connect.jpg"> -->
  </div>
</div>