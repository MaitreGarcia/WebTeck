<?php
	$bdd = new PDO('mysql:host=localhost;dbname=webteck','root','');
	/* 
		Fonction qui va crée un utilisateur dans la base de données
	*/ 
	function createUser($PDO,$login,$unNom,$unPrenom,$unMdp,$unMail,$unStatut)
	{
		$ash = password_hash($unMdp,PASSWORD_DEFAULT);
		$req = $PDO->prepare('INSERT INTO personne(login,Nom,Prenom,Password,Email,Statut,DtCreate) VALUES(:a,:b,:c,:d,:e,:f,NOW())');
		$req->execute(array(
			'a' => $login,
			'b' => $unNom,
			'c' => $unPrenom,
			'd' => $ash,
			'e' => $unMail,
			'f' => $unStatut
		));
	}
	/*
		Fonction qui va renvoyer l'utilisateur, si l'utilisateur est présent dans la base de donnée
		Sinon, renvoie null
	*/
	function login($PDO,$login,$mdp)
	{	
		$req = $PDO->prepare("SELECT login,Nom,Prenom,Password,Statut FROM personne WHERE login = :pseudo");
		$req->execute(array(
			'pseudo' => $login
		));
		$req = $req ->fetchAll();
		if($req == null)
		{
			return false;
		}
		else
		{
			if(password_verify($mdp,$req[0][3]) == 1)
			{
				return $req[0];
			}
			else
			{
				return null;
			}
		}	
		
	}

	/* fonction qui renvoie true, si jamais l'utisateur n'est pas déja dans la base */
	function verfUsername($PDO, $login)
	{
		$req = $PDO->prepare("SELECT login FROM personne WHERE login = :pseudo");
		$req->execute(array(
			'pseudo' => $login
		));
		$req = $req ->fetchAll();
		if($req == null)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/* Fonction qui va insérer l'annonce dans la base de donnée */
	function insertAnnonce($PDO,$login,$annonce,$titre,$categorie,$prix)
	{
		$req = $PDO->prepare('INSERT INTO demande(login,Titre,Annonce,Categorie,DtCreate,Statut,Prix) VALUES(:a,:b,:c,:d,NOW(),"Open",:e)');
		$res = $req->execute(array(
			'a' => $login,
			'b' => $titre,
			'c' => $annonce,
			'd' => $categorie,
			'e' => intval($prix)
 			));
        return $res;
	}

?>