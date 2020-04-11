<?php
    $err = 0;
  if (!isset($_GET['uid'])) {
      header('location: '.$_SERVER['HTTP_REFERER'].'');
      die ();
  }
    if (isset($_GET['uid'], $_POST['passwd']) AND !empty($_GET['uid'])) {
        $query = "SELECT * FROM token INNER JOIN users ON token.user_uid = users.user_uid
        WHERE token.token_creat = ?";
        $req = $bdd->prepare($query);
        $req->execute([$_GET['uid']]);
		$result = $req->fetch(PDO::FETCH_ASSOC);
		
        if ($_GET['uid'] == $result['token_creat']) {
            if ($_POST['passwd'] == $_POST['checkpasswd']) {
            	$passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
            	$query = "UPDATE users SET user_passwd = ? WHERE user_uid = ?";
            	$req = $bdd->prepare($query);
            	$req->execute(array($passwd, $result['user_uid']));

              	$req = $bdd->prepare('DELETE FROM token WHERE user_uid = ?');
              	$req->execute(array($result['user_uid']));
            }
            else
                $err = 1;
        }
        else
            echo "error\n";
    }
?>
<div style="margin-top:-38px"></div>
<div class="columns is-vcentered">
  <div class="login column is-4 ">
    <section class="section">
      <div class="has-text-centered">
          <div class="login-logo title_connexion">Bedumagru</div>
	  </div>
	  <form method="post">

      <div class="field">
          <div class="control has-icons-right">
            <input onkeyup='javascript:passwdMetter()' id="passwd" class="input" type="password" name="passwd" placeholder="taper votre mots de passe" require>
            <span class="icon is-small is-right">
              <i class="fa fa-key"></i>
            </span>
          </div>
        </div>
        <progress style="display: none;" id="meter" class="progress is-primary is-small" value="0" max="100"></progress>
        <div class="field">
          <div class="control has-icons-right">
            <input id="verif_passwd" onkeyup='javascript:isCharSet()' class="input" type="password" name="checkpasswd" placeholder="retaper votre mot de passe" require>
            <span class="icon is-small is-right">
              <i class="fa fa-key"></i>
            </span>
          </div>
	        <p class="help red"><?php if ($err == 1){echo 'Les mots de passe ne coreponde pas';} ?></p>
        </div>

      <div class="has-text-centered">
        <button id="valid" class="button is-dark is-fullwidth is-vcentered" type="submit" value="OK">Login</button>
      </div>
	</form>
    </section>
  </div>
  <div  class="interactive-bg column background-for is-8">
 	 <!-- <img src="backgroud/connect.jpg"> -->
  </div>
</div>
<script type="text/javascript" src="javascript/metter.js"></script>