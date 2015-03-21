<ul class="nav nav-tabs">
    <?php
        $login = new Account;
        if ($login->isLogin()) {
            echo "<p class=\"navbar-text navbar-right\">Angemeldet als <a href=\"index.php?p=profile\">".$_SESSION['username']."</a></p>";
        }
    ?>
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation" class="active"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
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
  <div class="panel-heading">Spieler Löschen</div>
        <div class="panel-body">
                <?php
                    if ($login->isLogin()) {
                        if (isset($_POST['password'])) {
                           if ($login->comparePassword($_POST['password'])) {
                               if ($login->deletePlayer()) {
                                   echo "<div class=\"alert alert-success\" role=\"alert\">Du hast erfolgreich deinen Spieler gelöscht !. Du wirst in 3 Sekunden zur Startseite weitergeleitet.</div></br>";
                                   echo "<meta http-equiv=\"refresh\" content=\"3; URL=index.php?p=home\">";
                               }
                           }
                        }
                    }
                    else {
                        die("<div class=\"alert alert-danger\" role=\"alert\">Du musst dich für diesen Bereich zuerst Anmelden.</div></br>");
                    }
                ?>
                <div class="row">
                    <div class="alert alert-warning" role="alert">Wenn du deinen Account löscht ist er für IMMER Weg !!</div>
                    <form action="index.php?p=delete_player" method="post">
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon" id="einfaches-addon1">Passwort:</span>
                                <input id="password" type="password" name="password" class="form-control" placeholder="Passwort" aria-describedby="einfaches-addon1">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="btn-group">
                                <button id="login_button" type="submit" class="btn btn-danger">Spieler Löschen !</button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Menü ein-/ausblenden</span>
                                </button>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?p=home">Zurück</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
        </div>
</div>


