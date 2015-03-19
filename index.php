<!DOCTYPE html>
<!--
/* 
 * Copyright (C) 2015 Jonas Golisch
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
-->
<?php
    ERROR_REPORTING(E_ALL);
    include_once ('./sys_conf/function.inc.php');
    include_once ('./sys_conf/config.inc.php');
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $site_settings['site_title']; ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <div class="page-header">
            <center>
                <h1>Army of Kings</h1>
            </center>
        </div>
    </head>
    <body>
        <div class="container">
            <?php
                if (isset($_GET['activated'])) {
                    $hash = $_GET['activated'];
                    $activated = new Account();
                    if ($activated->activateAccount($_GET['activated'])) {
                        echo "<div class=\"panel panel-default\">";
                        echo "<div class=\"panel-heading\">Account Aktivierung</div>";
                        echo "<div class=\"alert alert-success\" role=\"alert\">Dein Account wurde erfolgreich Aktiviert du kannst dich nun einloggen.</div></br>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                if (!empty($_GET['p'])) {
                    if (file_exists("./pages/".$_GET['p'].".php")) {
                        include ('./pages/'.$_GET['p'].".php");
                    }
                    else {
                        include ('./pages/home.php');
                    }
                }
                else {
                    include ('./pages/home.php');
                }
            ?>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
