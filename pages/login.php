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
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon" id="einfaches-addon1">E-Mail:</span>
                     <input type="text" class="form-control" placeholder="Benutzername" aria-describedby="einfaches-addon1">
                    </div>
                </div>
    
                <div class="col-xs-3">
                    <div class="input-group">
                        <span class="input-group-addon" id="einfaches-addon1">Passwort:</span>
                        <input type="password" class="form-control" placeholder="Passwort" aria-describedby="einfaches-addon1">
                    </div>
                 </div>
    
                <div class="btn-group">
                    <button type="button" class="btn btn-danger">Einloggen</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Menü ein-/ausblenden</span>
                    </button>
        
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#loggin">Einloggen</a></li>
                        <li><a href="#register">Register</a></li>
                    </ul>
                </div>
            </div>
   </div>
</div>

<script type="text/javascript">
</script>


