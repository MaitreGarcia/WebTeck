<?php
	$bdd = new PDO('mysql:host=localhost;dbname=webteck','root','root');
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
		$req = $PDO->prepare('INSERT INTO demande(login,Titre,Annonce,Categorie,DtCreate,Statut,Prix,login_bienfaiteur) VALUES(:a,:b,:c,:d,NOW(),"Open",:e,null)');
		$req->bindParam(':a', $login);
		$req->bindParam(':b', $titre);
		$req->bindParam(':c', $annonce);
		$req->bindParam(':d', $categorie);
		$req->bindParam(':e', intval($prix));
		return $req->execute();
	}


	/* Renvoie un tableau en deux dimentions de toutes les annonces posté par l'utilitateur */
	function annoncesSelonUtilistateur($PDO,$login)
	{
		$req = $PDO->prepare("SELECT Titre,Annonce,Categorie,login from demande WHERE login = :a ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}


?>