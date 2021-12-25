<?php
include_once 'config.php';
session_start();

try {
	$pdo = new PDO('mysql:host=' . db_host . ';dbname=' . db_name . ';charset=' . db_charset, db_user, db_pass);
} catch (PDOException $exception) {
	exit('Failed to connect to database!');
}

function CheckUserLoggedIn($pdo, $redirect_file = 'index.php') {
    if (isset($_COOKIE['rememberme']) && !empty($_COOKIE['rememberme']) && !isset($_SESSION['loggedin'])) {
    	$stmt = $pdo->prepare('SELECT * FROM adminpanel_staff WHERE rememberme = ?');
    	$stmt->execute([ $_COOKIE['rememberme'] ]);
    	$account = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($account) {
    		session_regenerate_id();
    		$_SESSION['loggedin'] = TRUE;
    		$_SESSION['name'] = $account['username'];
    		$_SESSION['id'] = $account['id'];
			$_SESSION['role'] = $account['role'];
			$_SESSION['discord'] = $account['discord'];
			$_SESSION['rockstar'] = $account['rockstar'];

    	} else {
    		header('Location: ' . $redirect_file);
    		exit;
    	}
    } else if (!isset($_SESSION['loggedin'])) {
    	header('Location: ' . $redirect_file);
    	exit;
    }
}
?>
