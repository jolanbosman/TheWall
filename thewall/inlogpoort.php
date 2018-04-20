<?php
session_start();
if (!isset($_POST['submit_login'])) {
    header( "Location: indexinlog.php");
}


// CHECKEN OF DE GEBRUIKER ALLES HEEFT INGEVULD
if (empty($_POST['username']) OR empty($_POST['password'])) {
    echo 'Je bent iets vergeten in te vullen';
    echo 'Klik <a href="indexinlog.php">hier</a> om het nog eens te proberen.';
    exit();
}

// CHECKEN OF DE GEBRUIKER BESTAAT (EN OF ZIJN WACHTWOORD KLOPT
require ('private/db.php');
$query = "SELECT userid, hash, active FROM users WHERE username = ? AND password = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing.');
$stmt->bind_param('ss', $username, $password) or die ('Error binding params.');
$stmt->bind_result( $userid, $hash, $active) or die ('Error binding results.');
$username = $_POST['username'];
$password = $_POST['password'];
$password = hash('sha512',$password) or die ('Error hashing');
$stmt->execute() or die ('Error executing');
$fetch_succes = $stmt->fetch();

if (!$fetch_succes) {
    echo 'Sorry, er is iets misgegaan.<br>';
    echo 'Klik <a href="indexinlog.php">hier</a> om het nog eens te proberen.';
    exit();
} else if ($active = 0) {
    echo 'Sorry, je account is nog niet geactiveerd. Check je mailbox.<br>';
    echo 'Klik <a href="indexinlog.php">hier</a> om het nog eens te proberen.';
    exit();
}

// ALLES IN ORDE? DAN...

setcookie('userid',$userid, time() + 3600 * 24 *7);
$_SESSION['userid'] = $userid;
$_SESSION['username'] = $username;
setcookie('hash',$hash, time() + 3600 * 24 *7);
$_SESSION['hash'] = $hash;
header('Location: homepage.php');

