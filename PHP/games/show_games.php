<?php
require '../inc/nutzer.php';

$erg = $db->query("SELECT * FROM spiele") or die($db->error);

echo "1. Spieltag <br>";
while($zeile = $erg->fetch_object()){
    if($zeile->SpielNr % 12 == 0){
        if($zeile->SpielNr / 12 == 1){
            echo "2. Spieltag";
        }elseif($zeile->SpielNr / 12 == 2){
            echo "3. Spieltag";
        }
        echo "<br>";
    }else{
        echo "Spiel " . $zeile->SpielNr . " " . $zeile->Team1 . " " . $zeile->Team1tore . ":"
        . $zeile->Team2tore . " ". $zeile->Team2 . "<br>";
    }
}
?>