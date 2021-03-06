<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <li role="presentation"><a href="index.php?p=mailbox">Postfach</a></li>
    <?php 
        $login = new Account;
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
    <div class="panel-heading">Logout</div>
        <div class="panel-body">
            <?php
                if ($login->isLogin()) {
                    $save = new Account;
                    if ($save->saveToDB()) {
                        $_SESSION = array();
                        echo "<div class=\"alert alert-success\" role=\"alert\">Du wurdest erfolgreich ausgeloggt. Du wirst in 3 Sekunden automatisch weitergeleitet.</div></br>";
                        echo "<meta http-equiv=\"refresh\" content=\"3; URL=index.php?p=home\">";
                    }
                }
            ?>
        </div>
</div>

