<?php
include 'functions/main.php';

if (!isset($_POST['username'], $_POST['password'])) {
	exit('Please fill both the username and password field!');
}

$stmt = $pdo->prepare('SELECT * FROM adminpanel_staff WHERE username = ?');
$stmt->execute([ $_POST['username'] ]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);
if ($account) {
	if (password_verify($_POST['password'], $account['password'])) {
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $account['username'];
			$_SESSION['id'] = $account['id'];
			$_SESSION['role'] = $account['role'];
			$_SESSION['discord'] = $account['discord'];
			$_SESSION['rockstar'] = $account['rockstar'];
			if (isset($_POST['rememberme'])) {
				$cookiehash = !empty($account['rememberme']) ? $account['rememberme'] : password_hash($account['id'] . $account['username'] . 'yoursecretkey', PASSWORD_DEFAULT);
				$days = 30;
				setcookie('rememberme', $cookiehash, (int)(time()+60*60*24*$days));
				$stmt = $pdo->prepare('UPDATE adminpanel_staff SET rememberme = ? WHERE id = ?');
				$stmt->execute([ $cookiehash, $account['id'] ]);
			}
			echo 'Success'; 
	} else {
		echo 'Incorrect username and/or password!';
	}
} else {
	echo 'Incorrect username and/or password!';
}
?>
