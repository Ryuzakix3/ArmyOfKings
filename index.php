<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    ERROR_REPORTING(E_ALL);
    include ('./sys_conf/function.inc.php');
    include ('./sys_conf/config.inc.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $site_settings['site_title']; ?></title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
            <ul>
                <li><a id="home_click" href="#home">Home</a></li>
                <li><a id="inventar_click" href="#inventar">Inventar</a></li>
                <li><a id="create_player_click" href="#create_player">Create Player</a></li>
            </ul>
           <div id="home" style="visibility: hidden">
               <?php
                    if (isset($player)) {
                        echo "Name: ".$player->getPlayerName()."</br>";
                        echo "Level: ".$player->getLevel()."</br>";
                        echo "Waffe: ".$player->getWeapon()."</br>";
                        echo "Rüstung: ".$player->getRuestung()."</br>";
                        echo "ATK/DEF: ".$player->ATK()."/".$player->DEF()."</br>";
                    }
                    else {
                        echo "Du hast noch keinen Spieler erstellt !";
                    }
               ?>
           </div>
        
           <div id="inventar" style="visibility: hidden">
                <?php
                    $inventar = new Inventar();
                    $inventar->getInventar("NULL");
                ?>
           </div>
        
            <div id="create_player" style="visibility: visible">
                <?php
                    if (!isset($player)) {
                        $player = new player();
                        $player->setPlayerName("Klaus");
                        $player->setLevel("1");
                        $player->setNewWeapon("Holzschwert", "15");
                        $player->setNewRuestung("Holz-Hemd", "7");
                        echo "Spieler erfolgreich ersellt. </br>";
                    }
                    else {
                        echo "Du hast bereits einen Spieler !";
                    }
                ?>
                
            </div>
    </body>
    
    <script type="text/javascript">
        $('#home_click').click(function() {
            if ($("#inventar").is(":visible")) {
                $("#inventar").slideUp(1000);
                $("#inventar").hide();
                $("#home").slideDown(1000);
                $("#home").show();
            }
            else if ($("#create_player").is(":visible")) {
                $("#create_player").slideUp(1000);
                $("#create_player").hide();
                $("#home").slideDown(1000);
                $("#home").show();
            }
        });
        $('#inventar_click').click(function() {
            if ($("#home").is(":visible")) {
                $("#home").slideUp(1000);
                $("#home").hide();
                $("#inventar").slideDown(1000);
                $("#inventar").show();
            }
            else if ($("#create_player").is(":visible")) {
                $("#create_player").slideUp(1000);
                $("#create_player").hide();
                $("#inventar").slideDown(1000);
                $("#inventar").show();
            }   
        });
        $('#create_player_click').click(function() {
            if ($("#home").is(":visible")) {
                $("#home").slideUp(1000);
                $("#home").hide();
                $("#create_player_click").slideDown(1000);
                $("#create_player_click").show();
            }
            else if ($("#inventar").is(":visible")) {
                $("#inventar").slideUp(1000);
                $("#inventar").hide();
                $("#create_player_click").slideDown(1000);
                $("#create_player_click").show();
            }   
        });
    </script>
</html>
