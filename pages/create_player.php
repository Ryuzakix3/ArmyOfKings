<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php?p=home">Startseite</a></li>
    <li role="presentation" class="active"><a href="index.php?p=create_player">Spieler Erstellen</a></li>
    <li role="presentation"><a href="index.php?p=delete_player">Spieler Löschen</a></li>
    <li role="presentation"><a href="index.php?p=login">Einloggen</a></li>
    <li role="presentation"><a href="index.php?p=register">Registrieren</a></li>
    <li role="presentation"><a href="index.php?p=inventar">Inventar</a></li>
    <li role="presentation"><a href="index.php?p=store">Laden</a></li>
</ul>

<div class="panel panel-default">
  <div class="panel-heading">Spieler Erstellen</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <input id="spieler_name" type="text" class="form-control" placeholder="Spieler Name">
                        <span class="input-group-btn">
                            <button class="btn btn-default" onclick="onCreatePlayer()" type="button">Erstellen</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    function onCreatePlayer() {
        var name = $('#spieler_name').val();
        window.location.href = window.location.href.replace( /[\?#].*|$/, "?created=1?name=" + name );
    }
</script>