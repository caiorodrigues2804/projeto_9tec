<?php 
	
/*
		localhost
		dbname
		user
		password 
*/		
		// error_reporting(0);

		if(!isset($_SESSION))
		{
			session_start();
		}

		try
		{	
			$username = "root";
			$password = "";
			$pdo = new PDO('mysql:host=localhost;dbname=miniloja2017', $username, $password);

		} catch(PDOException $e)
		{
			print 'Ops! aconteceu um erro na conexão com banco de dados...: ' . $e->getMessage();
		}
		catch(Exception $e)
		{
			print 'Ops! aconteceu um erro na conexão com banco de dados...: ' . $e->getMessage();	
		}
