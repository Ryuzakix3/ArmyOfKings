<ul class="nav nav-tabs">
    <?php
        $login = new Account;
        if ($login->isLogin()) {
            echo "<p class=\"navbar-text navbar-right\">Angemeldet als ".$_SESSION['username']."</p>";
        }
    ?>
    <li role="presentation" class="active"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <li role="presentation"><a href="index.php?p=mailbox">Postfach <span class="badge"><?php if ($login->isLogin()) { echo $_SESSION['unread_msg']; } ?></span></a></li>
    <?php 
        if ($login->isLogin()) { 
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
<div class="panel panel-default">
    <div class="panel-heading">Startseite</div>
        <div class="panel-body">
            <?php
                if ($login->isLogin()) {
                    if (!empty($_SESSION['player_created'])) {
                        echo "Name: ".$_SESSION['player_name']."</br>";
                        echo "Level: ".$_SESSION['player_level']."</br>";
                        echo "Waffe: ".$_SESSION['player_weapon']."</br>";
                        echo "Rüstung: ".$_SESSION['player_armor']."</br>";
                        echo "ATK/DEF: ".$_SESSION['player_atk']."/".$_SESSION['player_def']."</br>";
                        echo "";
                        echo "Gold: ".$_SESSION['player_gold'];
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

