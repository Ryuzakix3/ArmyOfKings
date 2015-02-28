<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation" class="active"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
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
  <div class="panel-heading">Spieler Löschen</div>
        <div class="panel-body">
            <div class="alert alert-warning" role="alert">Wenn du deinen Account löscht ist er für IMMER Weg !!</div>
            <?php
                if (isset($_SESSION['login'])) {
                    if (!empty($_GET["delete"])) {
                        if ($_GET["delete"] == "1") {
                            if (!empty($_SESSION['player_created'])) {
                                $_SESSION = array();
                                echo "<div class=\"alert alert-success\" role=\"alert\">Dein Spieler wurde erfolgreich gelöscht !</div></br>";
                            }
                            else {
                                echo "<div class=\"alert alert-danger\" role=\"alert\"> Du hast noch keinen Spieler erstellt.</div></br>";
                            }
                        }   
                    }
                }
                else {
                    die("<div class=\"alert alert-danger\" role=\"alert\">Du musst dich für diesen Bereich zuerst Anmelden.</div></br>");
                }
            ?>
            <div class="col-xs-3">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger">Bist du dir Sicher ?</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Menü ein-/ausblenden</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?p=delete_player?delete=1">Spieler Löschen</a></li>
                    </ul>
                </div>
            </div>
        </div>
</div>


