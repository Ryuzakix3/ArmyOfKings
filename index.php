<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include ('./sys_conf/function.inc.php');
    include ('./sys_conf/config.inc.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $neuer_spieler = new player();
            echo "Spielername: ".$neuer_spieler->getPlayerName()."\n </br>";
            echo "Altes Level:".$neuer_spieler->getLevel()."\n </br>";
            echo "Neues Level:".$neuer_spieler->setLevel("50")."\n </br>";
        ?>
    </body>
</html>
