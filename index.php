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
        <title><?php echo $site_settings['site_title']; ?></title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
            <ul>
                <li><a id="home_click" href="#home">Home</a></li>
                <li><a id="inventar_click" href="#inventar">Inventar</a></li>
                <li><a id="create_player_click" href="#create_player">Create Player</a></li>
            </ul>
           <div id="home" style="visibility: visible">
               <?php
               ?>
           </div>
        
           <div id="inventar" style="visibility: hidden">
                <?php
                ?>
           </div>
        
            <div id="create_player" style="visibility: hidden">
                <?php
                ?>
            </div>
    </body>
    
    <script type="text/javascript">
        $('#home_click').click(function() {
            if ($("#inventar").is(":visible")) {
                $("#inventar").slideUp("slow");
                $("#inventar").hide()
                $("#home").slideDown("slow");
            }
            else if ($("#create_player").is(":visible")) {
                $("#create_player").slideUp("slow");
                $("#create_player").hide()
                $("#home").slideDown("slow");
            }
        });
        $('#inventar_click').click(function() {
            if ($("#home").is(":visible")) {
                $("#home").slideUp("slow");
                $("#inventar").slideDown("slow");
            }
            else if ($("#create_player").is(":visible")) {
                $("#create_player").slideUp("slow");
                $("#create_player").hide()
                $("#inventar").slideDown("slow");
            }   
        });
        $('#create_player_click').click(function() {
            if ($("#home").is(":visible")) {
                $("#home").slideUp("slow");
                $("#home").hide()
                $("#create_player_click").slideDown("slow");
            }
            else if ($("#inventar").is(":visible")) {
                $("#inventar").slideUp("slow");
                $("#inventar").hide()
                $("#create_player_click").slideDown("slow");
            }   
        });
    </script>
</html>
