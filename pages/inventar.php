<ul class="nav nav-tabs">
    <?php
        $login = new Account;
        if ($login->isLogin()) {
            echo "<p class=\"navbar-text navbar-right\">Angemeldet als ".$_SESSION['username']."</p>";
        }
    ?>
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <li role="presentation"><a href="index.php?p=mailbox">Postfach</a></li>
     <?php 
        if ($login->isLogin()) { 
            echo "<li role=\"presentation\"><a href=\"index.php?p=logout\">Ausloggen</a></li>"; 
        }
        else {
            echo "<li role=\"presentation\"><a href=\"index.php?p=login\">Einloggen</a></li>";
        }
    ?>
    <li role="presentation"><a href="index.php?p=register">Registrieren</a></li>
    <li role="presentation" class="active"><a href="index.php?p=inventar">Inventar</a></li>
    <li role="presentation"><a href="index.php?p=store">Laden</a></li>
</ul>

<div class="panel panel-default">
  <div class="panel-heading">Inventar</div>
        <div class="panel-body">
                <div class="col-xs-12">
                    <?php
                        if ($login->isLogin()) {
                            if (!empty($_SESSION['player_created'])) {
                                $Inventar = new Inventar;
                                $Inventar->getInventar("NULL", $_SESSION['player_inventar']);
                            }
                            else {
                                echo "<div class=\"alert alert-danger\" role=\"alert\">Bitte erstelle zuerst einen Spieler.</div></br>";
                            }
                        }
                        else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Dieser Bereich ist nur sichtbar wenn du eingeloggt bist.</div></br>";
                        }
                    ?>
                </div>
        </div>
</div>


