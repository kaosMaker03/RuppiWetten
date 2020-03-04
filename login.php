<?php
require '../inc/db.php';

error_reporting(E_ALL);

$pwd = $_GET['pwd'];
$name = $_GET['name'];

$erg = $db->query('SELECT * FROM benutzer')or die($db->error);

$encrypted = password_hash($pwd, PASSWORD_DEFAULT);

while($zeile = $erg->fetch_object()){
    if($zeile->Nutzername == $name && password_verify($pwd, $zeile->Passwort)){
        echo 'Login Valid !';
    }else{
        echo 'Invalid Username or Password';
    }
}
?>