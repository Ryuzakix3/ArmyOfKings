<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="index.php#home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <?php 
        if (isset($_SESSION['login'])) { 
            echo "<li role=\"presentation\"><a href=\"index.php?p=logout\">Ausloggen</a></li>"; 
        }
        else {
            echo "<li role=\"presentation\"><a href=\"index.php?p=login\">Einloggen</a></li>";
        }
    ?>
    <li role="presentation"><a href="index.php?p=register">Registrieren</a></li>
    <li role="presentation"><a href="index.php?p=inventar">Inventar</a></li>
    <li role="presentation"><a href="index.php?p=store">Laden</a></li>
</ul>
<?php
    if (!empty($_GET['player_name'])) {
        if (!isset($_SESSION['player_created'])) {
            $player = new player();
            $player->setPlayerName($_GET['player_name']);
            $player->setLevel("1");
            $player->setNewWeapon("Holzschwert", "15");
            $player->setNewRuestung("Holz-Hemd", "7");
                    
            $_SESSION['player_name'] = $player->getPlayerName();
            $_SESSION['player_level'] = $player->getLevel();
            $_SESSION['player_weapon'] = $player->getWeapon();
            $_SESSION['player_atk'] = $player->getAtk();
            $_SESSION['player_armor'] = $player->getRuestung();
            $_SESSION['player_def'] = $player->getDef();
            $_SESSION['player_created'] = "True";
            $_SESSION['player_inventar'] = array('Holzschwert', "Holz-Hemd");
            
            echo "<div class=\"alert alert-success\" role=\"alert\">Dein Spieler wurde erfolgreich ersellt.</div></br>";
        }
        else {
            echo "<div class=\"alert alert-danger\" role=\"alert\"> Du hast bereits einen Spieler.</div></br>";
        }
                    
        
    }
?>

<div class="panel panel-default">
    <div class="panel-heading">Startseite</div>
        <div class="panel-body">
            <?php
                if (isset($_SESSION['login'])) {
                    if (!empty($_SESSION['player_created'])) {
                        echo "Name: ".$_SESSION['player_name']."</br>";
                        echo "Level: ".$_SESSION['player_level']."</br>";
                        echo "Waffe: ".$_SESSION['player_weapon']."</br>";
                        echo "Rüstung: ".$_SESSION['player_armor']."</br>";
                        echo "ATK/DEF: ".$_SESSION['player_atk']."/".$_SESSION['player_def']."</br>";
                    }
                    else {
                        echo "<div class=\"alert alert-danger\" role=\"alert\"> Du hast noch keinen Spieler.</div></br>";
                    }
                }
                else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Du musst dich für diesen Bereich zuerst Anmelden.</div></br>";
                }
            ?>
        </div>
</div>

