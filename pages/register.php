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
    <li role="presentation"><a href="index.php?p=mailbox">Postfach</a></li>
     <?php 
        if ($login->isLogin()) { 
            echo "<li role=\"presentation\"><a href=\"index.php?p=logout\">Ausloggen</a></li>"; 
        }
        else {
            echo "<li role=\"presentation\"><a href=\"index.php?p=login\">Einloggen</a></li>";
        }
    ?>
    <li role="presentation" class="active"><a href="index.php?p=register">Registrieren</a></li>
    <li role="presentation"><a href="index.php?p=inventar">Inventar</a></li>
    <li role="presentation"><a href="index.php?p=store">Laden</a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">Registrieren</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                     <?php
                        if ($login->isLogin()) {
                            echo "<div class=\"alert alert-warning\" role=\"alert\">Um einen Account zu erstellen musst du ausgeloggt sein.</div>";
                        }
                        if (!empty($_POST['username'])) {
                            $create = new Account();
                            $create->setUsername($_POST['username']);
                            if ($create->isUsernameFree()) {
                                if (isset($_POST['password'])) {
                                    $create->setPassword($_POST['password']);
                                    if ($create->isPasswordSafty()) {
                                        if ($create->hashPassword()) {
                                            if (isset($_POST['email'])) {
                                                $create->setEmail($_POST['email']);
                                                if (!$create->isEmailAlreadyUse()) {
                                                    if ($site_settings['email_activation']) {
                                                        $create->setActivateHash();
                                                        if ($create->sendEMail()) {
                                                            if ($create->createNewAccount()) {
                                                                echo "<div class=\"alert alert-success\" role=\"alert\">Bitte schaue in deinen Postfach um deinen Account zu bestätigen.</div></br>";
                                                            }
                                                        }
                                                        else {
                                                            echo "<div class=\"alert alert-success\" role=\"alert\">Fehler beim senden der e-Mail !</div></br>";
                                                        }
                                                    }
                                                    else {
                                                        if ($create->createNewAccount()) {
                                                            echo("<div class=\"alert alert-success\" role=\"alert\">Du hast erfolgreich deinen Account erstellt. Du wirst in 3 Sekunden zur Login seite weitergeleitet.</div></br>");
                                                            echo("<meta http-equiv=\"refresh\" content=\"3; URL=index.php?p=login\">");
                                                        }
                                                    }
                                                }
                                                else {
                                                     echo("<div class=\"alert alert-danger\" role=\"alert\">".$create->getEmailError()."</div>");
                                                }
                                            }
                                        }
                                        else {
                                            echo("<div class=\"alert alert-danger\" role=\"alert\">Fehler beim Hashen des Passworts !</div>");
                                        }
                                    }
                                    else {
                                        echo("<div class=\"alert alert-danger\" role=\"alert\">".$create->getPasswordError()."</div>");
                                    }
                                } 
                            }
                            else {
                                echo("<div class=\"alert alert-danger\" role=\"alert\">".$create->getUsernameError()."</div></br>");
                            }
                        }
                    ?>
                </div>
                <div class="col-xs-12">
                    <?php
                        if (!$site_settings['registration_online']) {
                            die("<div class=\"alert alert-danger\" role=\"alert\">Die Registrierung ist zurzeit Deaktiviert !</div></br>");
                        }
                    ?>
                    <form action="index.php?p=register" method="post">
                        <div class="input-group">
                            <span class="glyphicon glyphicon-user" aria-hidden="true">Benutzername:</span>
                            <input name="username" type="text" class="form-control" placeholder="" aria-describedby="einfaches-addon1" required>
                            <span class="help-block">Minimum 3 characters</span>
                        </div>
                        <div class="input-group">
                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true">Passwort:</span>
                            <input name="password" type="password" data-minlength="6" class="form-control" placeholder="" aria-describedby="einfaches-addon1" required>
                            <span class="help-block">Minimum 6 characters</span>
                        </div>
                        <div class="input-group">
                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true">Passwort:</span>
                            <input type="password" data-minlength="6" class="form-control" placeholder="" aria-describedby="einfaches-addon1" required>
                            <span class="help-block">Minimum 6 characters</span>
                        </div>
                        <div class="input-group">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true">E-Mail:</span>
                            <input name="email" type="email" class="form-control" placeholder="" aria-describedby="einfaches-addon1" required>
                            <span class="help-block">Use a valid Email</span>
                        </div>
                        <button class="btn btn-default" type="submit">Registrieren</button>
                    </form>
                </div>
            </div>
        </div>
</div>
