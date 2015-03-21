<ul class="nav nav-tabs">
    <?php
        $login = new Account;
        if ($login->isLogin()) {
            echo "<p class=\"navbar-text navbar-right\">Angemeldet als <a href=\"index.php?p=profile\">".$_SESSION['username']."</a></p>";
        }
    ?>
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
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
    <div class="panel-heading">Passwort Vergessen:</div>
        <div class="panel-body">
            <div class="row">
                <?php
                    ERROR_REPORTING(E_ALL);
                    if (isset($_POST['reset_username']) && isset($_POST['reset_email'])) {
                        $newPassword = new Account;
                        if ($newPassword->checkEmail($_POST['reset_username'], $_POST['reset_email'])) {
                            $newPassword->setRandomPasswordLength("8");
                            $newPassword->generateRandomPassword();
                            if ($newPassword->saveRandomPasswortToUser()) {
                                if ($newPassword->sendNewPasswordtoEMail()) {
                                    echo("<div class=\"alert alert-success\" role=\"alert\">Du hast dein neues Passwort per E-Mail zugsendet bekommen. Bitte gucke in dein Postfach</div></br>");
                                }
                                else {
                                    echo("<div class=\"alert alert-danger\" role=\"alert\">Fehler beim Senden der email probier es nachher nochmal.</div></br>");
                                }
                            }
                            else {
                                echo("<div class=\"alert alert-danger\" role=\"alert\">Fehler beim erstellen des Random Passworts.</div></br>");
                            }
                        }
                        else {
                            echo("<div class=\"alert alert-danger\" role=\"alert\">Diese Kombination aus Benutzer und E-Mail existiert nicht !</div></br>");
                        }
                    }
                ?>
                <form action="index.php?p=pw_reset" method="post">
                    <div class="col-xs-5">
                        <div class="input-group">
                            <span class="input-group-addon" id="einfaches-addon1">Benutzername:</span>
                            <input name="reset_username" type="text" class="form-control" placeholder="Benutzername" aria-describedby="einfaches-addon1" required>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="input-group">
                            <span class="input-group-addon" id="einfaches-addon1">E-Mail:</span>
                            <input name="reset_email" type="email" class="form-control" placeholder="E-Mail Adresse" aria-describedby="einfaches-addon1" required>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button class="btn btn-default" type="submit">Passwort anfordern</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
</div>

