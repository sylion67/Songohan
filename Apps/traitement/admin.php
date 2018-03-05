<?php

if (isset($_GET['page']) && $_GET['page'] == 'logout')
{
	session_destroy();
	header('Location: index.php');
	exit;
}

if (isset($_POST['action']))
{
	$manager = new UserManager($pdo);
	$action = $_POST['action'];
	if ($action == 'register')
	{
		// Etape 1 : Vérifier la présence de tous les champs nécessaires
		// title, content, image, author
		if (isset($_POST['login'], $_POST['password']))// isset : http://php.net/manual/fr/function.isset.php : is set : est définie
		{
			// Etape 2 : Vérifier la validité des champs
			$login = $_POST['login'];
			$password = $_POST['password'];
			try
			{
				$user = $manager->create($login, $password);
			}
			catch (Exception $exception)
			{
				$error = $exception->getMessage();
			}
			// Etape 4 : PRG
			if (!$error)
			{
				header('Location: index.php?page=login');
				exit;
			}
		}
	}
	else if($action == 'login')
	{
		if (isset($_POST['login'], $_POST['password']))// isset : http://php.net/manual/fr/function.isset.php : is set : est définie
		{
			// Etape 2 : Vérifier la validité des champs
			$login = $_POST['login'];
			$password = $_POST['password'];
			// if (...)
			// Etape 3 : Traitement
			//$sql = "SELECT * FROM users WHERE login='".$login."' AND password='".$password."'";

			//$res = mysqli_query($db, $sql);
			//$user = mysqli_fetch_assoc($res);

			// Version avec les requêtes préparées (cf : http://php.net/manual/fr/mysqli.prepare.php)
			$manager = new UserManager($pdo);
			$user = $manager->findByLogin($login);


			// Préciser les paramètres de la requête (donner une valeur à login et à password)
			// 1er paramètre c'est la variable récupérée avec la requête préparée
			// 2ème paramètre correspond au type de variable (cf http://php.net/manual/fr/mysqli-stmt.bind-param.php)
			// 3ème et suivants paramètres correspondent aux valeurs

			if ($user) 
			{
				if ($user->verifPassword($password))
				{
					$_SESSION['id'] = $user->getId();// J'enregistre dans la session le numéro de l'utilisateur connecté
					$_SESSION['login'] = $user->getLogin();// J'enregistre aussi son login
					header('Location: index.php');
					exit;
				}
				else
				{
					echo 'Mauvais mot de passe';
				}
			}
			else
			{
				echo 'Mauvais login';
			}
			var_dump($user);			
			// Etape 4 : PRG
			//var_dump($user);
			// http://php.net/manual/fr/function.header.php
			exit;
		}
	}
}
?>