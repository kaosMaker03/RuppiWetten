<?php
require '../inc/nutzer.php';

error_reporting(E_ALL);

//reset Auto Increment
$erg = $db->query("SELECT ID FROM benutzer");

$daten = $erg->fetch_all(MYSQLI_ASSOC);
if(count($daten)>0){
    $maxID = $daten[count($daten)-1]['ID'] + 1;
    $db->query("ALTER TABLE benutzer AUTO_INCREMENT = $maxID;") or die($db->error);
}else{
    $db->query("ALTER TABLE benutzer AUTO_INCREMENT = 1;") or die($db->error);
}

//Register
$pwd = $_GET['pwd'];
$name = $_GET['name'];

$encrypted = password_hash($pwd, PASSWORD_DEFAULT);

if($db->query("INSERT INTO benutzer (Nutzername, Passwort) VALUES ('{$name}','{$encrypted}')") === TRUE){
    echo "Succesfully Registered !";
}else{
    echo $db->error;
}
?>
