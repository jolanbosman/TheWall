<?php

require ('private/db.php');

//Hoort de bezoeker hier wel te zijn?
if (!isset($_POST['submit_registration'])) {
    header( 'Location: register.php');
}
//Zijn alle velden ingevuld?
 if (empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password1']) OR empty($_POST['password2'])) {
    echo 'Je bent vergeten iets in te voeren.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// zijn bijde wachtwoorden gelijk

if($_POST['password1'] != $_POST['password2']) {
    echo 'je hebt twee verschillende wachtwoorden getypt.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// Heeft de gebruiker wel een ma-adres?

$position = strpos($_POST['email'], '@ma-web.nl');
if (!$position) {
    echo 'Sorry, je kunt alleen registreren met een e-mail adres van het Media College.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}


//Bestaat de username al?
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $username);
$username = $_POST['username'];
$result = $stmt->execute() or die ('Error querying username');
$row = $stmt->fetch();
if ($row){
    echo 'Sorry maar deze gebruikersnaam is al bezet. ';
    echo 'Klik <a href="register.php">hier</a> om terug te keren';
    exit();
}





// Bestaat dit mailadres al?
$query = "SELECT userid FROM users WHERE mailadres = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $mailadres);
$mailadres = $_POST['email'];
$result = $stmt->execute() or die ('Error querying mailadres.');
$row = $stmt->fetch();
if ($row) {
    echo 'Sorry, maar het lijkt erop dat je al een account hebt<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();

}

// Gebruiker toevoegen aan de database
$query = "INSERT INTO users VALUES (0,?,?,?,?,0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param( 'ssss', $username, $mailadres,$hash,$password);
$username = $_POST['username'];
$mailadres = $_POST['email'];
$random_number = rand(0,1000000);
$hash = hash('sha512',$random_number);
$password = hash( 'sha512',$_POST['password1']);
$result = $stmt->execute() or die ('Error inserting user.');

// Gebruiker mailen
$to = $_POST['email'];
$subject = 'verifieer je account bij THE WALL';
$message = 'Klik op de volgende link om je account te activeren: ';
$message .= 'http://24572.hosts.ma-cloud.nl/bewijzenmap/periode1.3/proj/verify.php?mailadres=' . $mailadres . '&hash=' . $hash;
$headers = 'From: 24572@ma-web.nl';
mail($to,$subject,$message,$headers) or die ('Error mailing');

echo 'Check je e-mail om jou account te verifieren.';