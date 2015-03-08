<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
