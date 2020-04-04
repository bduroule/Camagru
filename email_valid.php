<pre>
<?php
    if (isset($_GET['uid']) AND !empty($_GET['uid'])) {

		print_r($_GET);

		//// <> check si token existe
		$query = "SELECT * FROM token INNER JOIN users ON token.user_uid = users.user_uid
                    WHERE token.token_creat = ?";
		$req = $bdd->prepare($query);
		$req->execute([$_GET['uid']]);

		$result = $req->fetch(PDO::FETCH_ASSOC); 
		
		print_r($result);

        // si existe, update le user correspondant
        if ($_GET['uid'] == $result['token_creat']) {
		    $query = "UPDATE users SET confirm = 1 WHERE user_uid = ?";
		    $req = $bdd->prepare($query);
            $req->execute([$result['user_uid']]);
            $req = $bdd->prepare('DELETE FROM token WHERE user_uid = ?');
            $req->execute(array($result['user_uid']));
        }
        else
            echo "ERROR";

		// si pas d'erreur, delete le token de la bdd
		// </> 

		// si le token n'existe, afficher erreur <>
		// </>
    }
    
?>