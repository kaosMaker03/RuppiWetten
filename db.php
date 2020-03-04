<?php
//Ausschalten des error reports als Sicherheitsmaßnahme
//error_reporting(0);
//Während Entwicklung:
error_reporting(E_ALL);

//neue Datenbank
$db = new mysqli('localhost', 'root', 'mypass', 'nutzer');

//Fehler vorhanden ?
if($db->connect_errno){
    die('Sorry - gerade gibt es ein Problem');
}

//Umlaute
$db->set_charset('utf8');
?>