<?php
    include_once './sys_conf/function.inc.php';
?>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <li role="presentation" class="active"><a href="index.php?p=login">Einloggen</a></li>
    <li role="presentation"><a href="index.php?p=register">Registrieren</a></li>
    <li role="presentation"><a href="index.php?p=inventar">Inventar</a></li>
    <li role="presentation"><a href="index.php?p=store">Laden</a></li>
</ul>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Login-Panel</div>
            <div class="panel-body">
                <?php
                    if (!empty($_POST["username"])) {
                        $login = new Account;
                        if ($login->login($_POST['username'], $_POST['password'])) {
                            echo "<div class=\"alert alert-success\" role=\"alert\">Du hast dich erfolgreich eingeloggt.</div></br>";
                            echo "<div class=\"alert alert-success\" role=\"alert\">Du wirst in 7 Sekunden automatisch weitergeleitet.</div></br>";
                            echo "<meta http-equiv=\"refresh\" content=\"7; URL=index.php?p=home\">";
                            $login->loadDatafromDB($_SESSION['user_id']);
                        }
                        else {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Benutzername oder Passwort Falsch !</div></br>";
                        }
                    }
                ?>
                <form action="index.php?p=login" method="post">
                    <div class="col-xs-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="einfaches-addon1">E-Mail:</span>
                         <input type="text" name="username" class="form-control" placeholder="Benutzername" aria-describedby="einfaches-addon1">
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="input-group">
                            <span class="input-group-addon" id="einfaches-addon1">Passwort:</span>
                            <input type="password" name="password" class="form-control" placeholder="Passwort" aria-describedby="einfaches-addon1">
                        </div>
                     </div>
                    <div class="col-xs-2">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger">Einloggen</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Menü ein-/ausblenden</span>
                            </button>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.php?p=login?login_state=1">Einloggen</a></li>
                                <li><a href="index.php?p=register">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
   </div>
</div>

<script type="text/javascript">
</script>


