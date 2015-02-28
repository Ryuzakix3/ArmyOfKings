<ul class="nav nav-tabs">
    <?php
        if (isset($_SESSION['login'])) {
            echo "<p class=\"navbar-text navbar-right\">Angemeldet als ".$_SESSION['username']."</p>";
        }
    ?>
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation" class="active"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
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

<div class="panel panel-default">
  <div class="panel-heading">Spieler Erstellen</div>
        <div class="panel-body">
             <?php 
                if (!isset($_SESSION['login'])) {
                    die("<div class=\"alert alert-danger\" role=\"alert\">Du musst dich für diesen Bereich zuerst Anmelden.</div></br>");
                }
                if (!empty($_POST['spieler_name'])) {
                    $player_create = new player();
                    if ($player_create->existsPlayerName($_POST['spieler_name'])) {
                        echo("<div class=\"alert alert-danger\" role=\"alert\">Dieser Name ist bereits vergeben.</div></br>");
                    }
                    else {
                        if ($player_create->createNewPlayer($_POST['spieler_name'])) {
                            echo "<div class=\"alert alert-success\" role=\"alert\">Du hast erfolgreich einen Spieler erstellt. Du wirst in 3 Sekunden automatisch weitergeleitet.</div></br>";
                            echo "<meta http-equiv=\"refresh\" content=\"3; URL=index.php?p=home\">";
                            $loadFromDB = new Account;
                            $loadFromDB->loadDatafromDB($_SESSION['user_id']);
                        }
                        else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Fehler beim Erstellen von deinem Spieler ! Bitte probier es noch einmal.</div></br>";
                        }
                    }
                }
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <form action="index.php?p=create_player" method="post">
                        <div class="input-group">
                            <input id="spieler_name" name="spieler_name" type="text" class="form-control" placeholder="Spieler Name">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Erstellen</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>