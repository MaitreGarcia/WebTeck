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

		if($mdp == " ")
		{
			return null;
		}
		else
		{
			$req = $PDO->prepare("SELECT login,Nom,Prenom,Password,Statut FROM personne WHERE login = :pseudo");
			$req->execute(array(
				'pseudo' => $login
			));
			$perso = $req ->fetchAll();		
			if(password_verify($mdp,$perso[0][3]) == 1)
			{
				return $perso[0];
			}
			else
			{
				return null;
			}
		}
	}
	
?>