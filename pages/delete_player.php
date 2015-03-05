<ul class="nav nav-tabs">
    <?php
        $account_handler = new Account;
        if ($account_handler->isLogin()) {
            echo "<p class=\"navbar-text navbar-right\">Angemeldet als ".$_SESSION['username']."</p>";
        }
    ?>
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation" class="active"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <li role="presentation"><a href="index.php?p=mailbox">Postfach</a></li>
    <?php 
        if ($account_handler->isLogin()) { 
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
                    if ($account_handler->isLogin()) {
                        if (!empty($_POST['user_pwd'])) {
                           if ($account_handler->comparePassword($_POST['user_pwd'])) {
                               if ($account_handler->deletePlayer()) {
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
                    <div class="col-lg-6">
                    <form action="index.php?p=delete_player" method="post">
                        <div class="input-group">
                            <input id="user_pwd" name="password" type="password" class="form-control" placeholder="Passwort">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Löschen !</button>
                            </span>
                        </div>
                    </form>
                </div>
                </div>
        </div>
</div>


