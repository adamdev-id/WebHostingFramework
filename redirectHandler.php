<?php
    $selection = $_GET['selection'];
	switch( $selection  )
	{
		case 'SERVERS':
		{
			// kalau berhasil alihkan ke halaman serverlist.php
			header("Location: index_serverlist.php");
		}
		break;
		case 'EMPLOYEES':
		{
			// kalau berhasil alihkan ke halaman index_employees.php
			header("Location: index_employees.php");
		}
		break;
		case 'CUSTOMERS':
		{
			// kalau berhasil alihkan ke halaman index_customers.php
			header("Location: index_customers.php");
		}
		break;
		case 'TRANSACTION':
		{
			// kalau berhasil alihkan ke halaman index_transactions.html
			header('Location: index_transactions.php');
		}
		break;
		case 'PURCHASE':
		{
			// kalau berhasil alihkan ke halaman userPurchase.html
			header('Location: userPurchase.php');
		}
		break;
		case 'UPGRADE':
		{
			// kalau berhasil alihkan ke halaman userUpgrade.php
			header('Location: userUpgrade.php');
		}
		break;
		case 'UPGRADECHECK':
		{
			// kalau berhasil alihkan ke halaman index_upgradelist.php
			header('Location: index_upgradelist.php');
		}
		break;
		case 'CHECKSERVERS':
		{
		// kalau berhasil alihkan ke halaman index_customerserverlist.html
			header('Location: index_customerserverlist.php');
		}
		break;
	}
?>