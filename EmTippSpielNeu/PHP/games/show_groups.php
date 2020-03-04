<?php
require '../inc/nutzer.php';

$db->query("UPDATE teams SET Punkte=0") or die($db->error);
$erg = $db->query("SELECT * FROM teams ORDER BY Gruppe ASC") or die($db->error);

while($zeile = $erg->fetch_object()){
    $sql = $db->query("SELECT * FROM spiele WHERE Team1 = '{$zeile->Name}' OR Team2 = '{$zeile->Name}'")
            or die($db->error);
    while($punkte = $sql->fetch_object()){
        if($punkte->Team1tore != '--' && $punkte->Team2tore != '--'){
            $pTemp = $zeile->Punkte;
            if($punkte->Team1 == $zeile->Name){
                if($punkte->Team1tore > $punkte->Team2tore){
                    $pTemp += 3;
                }elseif($punkte->Team1tore == $punkte->Team2tore){
                    $pTemp += 1;
                }
            }else{
                if($punkte->Team2tore > $punkte->Team1tore){
                    $pTemp += 3; 
                }elseif($punkte->Team2tore == $punkte->Team1tore){
                    $pTemp += 1;
                }
            }
            $db->query("UPDATE teams SET Punkte={$pTemp} WHERE ID={$zeile->ID}");
        }
    }
}

$erg2 = $db->query("SELECT * FROM teams ORDER BY Gruppe ASC, Punkte DESC") or die($db->error);
$i = 0;

while($zeile = $erg2->fetch_object()){
    if($i == 0){
        echo 'Gruppe A<br>';
    }elseif($i == 4){
        echo 'Gruppe B<br>';
    }
    elseif($i == 8){
        echo 'Gruppe C<br>';
    }
    elseif($i == 12){
        echo 'Gruppe D<br>';
    }
    elseif($i == 16){
        echo 'Gruppe E<br>';
    }
    elseif($i == 20){
        echo 'Gruppe F<br>';
    }
    $i++;
    echo $zeile->Name . ' ' . $zeile->Punkte . '<br>';
}
?>
