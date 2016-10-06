<?php
	$bdd = new PDO('mysql:host=localhost;dbname=webteck','root','root');
	
	/*  Fonction qui va crée un utilisateur dans la base de données*/ 
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
	/*  Fonction qui va renvoyer l'utilisateur, si l'utilisateur est présent dans la base de donné. Sinon, renvoie null */
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

	function recupPersonne($PDO,$login)
	{
		$req = $PDO->prepare("SELECT login,Nom,Prenom,Password,Statut FROM personne WHERE login= :a");
		$req->bindParam(':a', $login);
		$req->execute();
		$donnees = $req->fetch();
		return $donnees;
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
		$req = $PDO->prepare('INSERT INTO demande(login,Titre,Annonce,Categorie,DtCreate,Statut,Prix,login_bienfaiteur) VALUES(:a,:b,:c,:d,NOW(),"Ouvert",:e,null)');
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
		$req = $PDO->prepare("SELECT Titre,Annonce,Categorie,login,idDemande,Statut from demande WHERE login = :a ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}

	//Fonction qui va recupere toutes les annonces
	function allAnnonce($PDO)
	{
		$req = $PDO->prepare("SELECT Titre,Annonce,Categorie,login,idDemande from demande WHERE login_bienfaiteur IS NULL ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}

	function allAnnonceInformatique($PDO)
	{
		$req = $PDO->prepare("SELECT Titre,Annonce,Categorie,login,idDemande from demande WHERE login_bienfaiteur IS NULL AND Categorie = 'Informatique' ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}

	function allAnnonceJardin($PDO)
	{
		$req = $PDO->prepare("SELECT Titre,Annonce,Categorie,login,idDemande from demande WHERE login_bienfaiteur IS NULL AND Categorie = 'Jardinage' ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}

	function allAnnonceMenage($PDO)
	{
		$req = $PDO->prepare("SELECT Titre,Annonce,Categorie,login,idDemande from demande WHERE login_bienfaiteur IS NULL AND Categorie = 'Tache menagères' ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();
	}

	//Fonction qui va recupere toutes les annonces
	function chooseAnnonce($PDO,$login,$id)
	{
		$req = $PDO->prepare("UPDATE demande SET login_bienfaiteur = :a WHERE idDemande = :b ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->bindParam(':b', $id);
		$req->execute();

		$req2 = $PDO->prepare("UPDATE demande SET Statut ='Traité' WHERE idDemande = :a ORDER by DtCreate");
		$req2->bindParam(':a', $id);
		$req2->execute();
	}

	//Fonction bienfaiteurs
	function allBienfaiteurs($PDO,$login)
	{
		$req = $PDO->prepare("SELECT Titre,Annonce,Categorie,login,idDemande from demande WHERE login_bienfaiteur=:a ORDER by DtCreate");
		$req->bindParam(':a', $login);
		$req->execute();
		return $donnees = $req->fetchAll();	
	}

	//Fonction annulation
	function annulationAnnonce($PDO,$id)
	{
		$req = $PDO->prepare("UPDATE demande SET login_bienfaiteur = null WHERE idDemande = :a");
		$req->bindParam(':a', $id);
		$req->execute();
		$req2 = $PDO->prepare("UPDATE demande SET Statut ='Ouvert' WHERE idDemande = :a");
		$req2->bindParam(':a', $id);
		$req2->execute();
	}

	//Fonction delete
	function deleteAnnonce($PDO,$id)
	{
		$req = $PDO->prepare("DELETE FROM demande  WHERE idDemande = :a");
		$req->bindParam(':a', $id);
		$req->execute();
	}
?>