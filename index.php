<?php

try
{
	session_start();

	// Tableau de configuration de PDO
	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	];

	try 
	{
		//$pdo = new PDO('mysql:dbname=restaurant;host=localhost', 'root', 'root', $options);
		$pdo = new PDO('mysql:dbname=restaurant;host=192.168.1.83', 'restaurant', 'restaurant', $options);
	}
	catch (PDOException $exception)
	{
		// Si une PDO exception est attrapée
		exit('Erreur serveur : ' . $exception->getMessage());
	}
	$pdo->query("SET NAMES UTF8");
	$error = '';
	$page = 'home';
	$page_admin = 'orders';

	$access =['home', 'article', 'articles', 'comments', 'menu', 'resumeorder', 'order', 'informations', 'error', 'login', 'testorder', 'createadmin'];
	$access_admin =['createarticle', 'listearticle', 'orders', 'editmenu', 'error', 'articleadmin', 'orderdetail', 'resadetail', 'createadmin', 'logout', 'editarticle'];
	if (isset($_GET['page']))
	{
		// Si jamais la page se trouve dans la liste des pages
		// on peut y accéder
		if (in_array($_GET['page'], $access))
		{
			$page = $_GET['page'];
		}
		else if (isset($_SESSION['id']))
		{
			if (in_array($_GET['page'], $access_admin))
			{
				$page_admin = $_GET['page'];
			}
		}
		else // La page ne se trouve pas dans la liste des pages du site
		{
			throw new Exception('La page n\'existe pas');
		}
	}
	// http://php.net/manual/fr/function.autoload.php
	/*
	function __autoload($classname)// Cette fonctionalité est devenue OBSOLETE depuis PHP 7.2.0. Nous vous encourageons vivement à ne plus l'utiliser.
	{
		require('models/'.$classname.'.class.php');
	}
	*/
	// http://php.net/manual/fr/function.spl-autoload-register.php
	spl_autoload_register(function($classname)// BONNE VERSION
	{
		require('Models/'.$classname.'.class.php');
	});
	require('Apps/traitement/article.php');
	require('Apps/traitement/comment.php');
	require('Apps/traitement/order.php');
	require('Apps/traitement/user.php');
	require('Apps/traitement/menu.php');
	require('Apps/traitement/admin.php');

	require('Apps/base.php');
}
catch (Exception $exception)
{
	$error = 'Erreur : ' . $exception->getMessage();
	require('Apps/error.php');
}
