<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation" class="active"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <li role="presentation"><a href="index.php?p=login">Einloggen</a></li>
    <li role="presentation"><a href="index.php?p=register">Registrieren</a></li>
    <li role="presentation"><a href="index.php?p=inventar">Inventar</a></li>
    <li role="presentation"><a href="index.php?p=store">Laden</a></li>
</ul>

<div class="panel panel-default">
  <div class="panel-heading">Spieler Löschen</div>
        <div class="panel-body">
            <?php
                if (!empty($_SESSION['player_created'])) {
                    $_SESSION = array();
                    echo "<div class=\"alert alert-success\" role=\"alert\">Dein Spieler wurde erfolgreich gelöscht !</div></br>";
                }
                else {
                    echo "<div class=\"alert alert-danger\" role=\"alert\"> Du hast noch keinen Spieler erstellt.</div></br>";
                }
            ?>
        </div>
</div>


