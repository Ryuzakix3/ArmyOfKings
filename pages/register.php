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
    <li role="presentation" class="active"><a href="index.php?p=register">Registrieren</a></li>
    <li role="presentation"><a href="index.php?p=inventar">Inventar</a></li>
    <li role="presentation"><a href="index.php?p=store">Laden</a></li>
</ul>
<div class="panel panel-default">
  <div class="panel-heading">Registrieren</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4">
                </div>
                <div class="col-xs-4">
                    <div class="input-group">
                        <span class="glyphicon glyphicon-user" aria-hidden="true">Benutzername:</span>
                        <input type="text" class="form-control" placeholder="" aria-describedby="einfaches-addon1">
                    </div>
                    <div class="input-group">
                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true">Passwort:</span>
                        <input type="text" class="form-control" placeholder="" aria-describedby="einfaches-addon1">
                    </div>
                    <div class="input-group">
                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true">Passwort:</span>
                        <input type="text" class="form-control" placeholder="" aria-describedby="einfaches-addon1">
                    </div>
                    <div class="input-group">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true">E-Mail:</span>
                        <input type="text" class="form-control" placeholder="" aria-describedby="einfaches-addon1">
                    </div>

                </div>
            </div>
        </div>
</div>
