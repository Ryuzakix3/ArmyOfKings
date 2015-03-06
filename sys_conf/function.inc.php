<?php
include './sys_conf/config.inc.php';

class Messenger {
    public $mysql_addr = "localhost";
    public $mysql_user = "root";
    public $mysql_password = "";
    public $mysql_database = "homepage";
    
    function getAllMessages() {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
            die("MySQL-Fehler: ".$conn->error);
        }
        $sql = "SELECT id,empf,no_read,message,absender,betreff FROM Message WHERE empf = '".$conn->real_escape_string($_SESSION['username'])."' and no_read = '1';";
        $result = $conn->query($sql);
        if (!$result) {
            die("MySQL-Fehler: ".$conn->error);
        }
        if ($result->num_rows() > 0) {
            $row = $result->fetch_array(MYSQLI_BOTH);
            echo "";
            echo "";
        }
        else {
            return false;
        }
    }
    
    function print_msg($id, $betreff, $message) {
        echo "<a href=\"index.php?p=message?id=".$id."\" class=\"list-group-item active\">";
        echo "<h4 class=\"list-group-item-heading\>".$betreff."</h4>";
        echo "<p class=\"list-group-item-text\"></p>";
        echo "</a>";
    }
    
    function getMessage( $index ) {
        
    }
    
    function sendMessage ( $msg, $empf ) {
        
    }
}

class player {
    public $mysql_addr = "localhost";
    public $mysql_user = "root";
    public $mysql_password = "";
    public $mysql_database = "homepage";
    public $playername = "";
    public $Level = "";
    public $playerep = "0";
    public $ep_to_next_level = "500";
    public $raum = "1";
    public $ATK = "0";
    public $DEF = "0";
    public $TP = "0";
    public $Waffe = "";
    public $Ruestung = "";
    public $Inventar = array();
    
    // PLAYER FUNCTIONS //
    function setTP( $new_tp ) {
        $this->TP = $new_tp;
    }
    
    function getTP() {
        return $this->TP;
    }
    
    function setLevel( $new_level ) {
        $this->Level = $new_level;
        return $this->Level;
    }
    
    function getLevel() {
        return $this->Level;
    }
    
    function getPlayerName() {
        return $this->playername;
    }
    
    function setPlayerName( $new_name ) {
        $this->playername = $new_name;
    }
    
    function LevelUp() {
        if ($this->ep_to_next_level >= $this->playerep) {
            $this->Level = $this->Level + 1;
            $this->ep_to_next_level = rand((50 * rand(1,3)) * $this->Level);
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    function setNewWeapon( $name, $atk ) {
        $this->Waffe = $name;
        $this->ATK = $atk;
    }
    
    function setNewRuestung( $name, $def ) {
        $this->Ruestung = $name;
        $this->DEF = $def;
    }
    // END //
    
    // WAFFEN FUNCTIONS //
    
    function getAtk() {
        return $this->ATK;
    }
    
    function setAtk( $new_atk ) {
        $this->ATK = $new_atk;
    }
    
    function getWeapon() {
        return $this->Waffe;
    }
    
    function setWeapon( $new_weapon ) {
        $this->Waffe = $new_weapon;
    }
    
    // END //
    
    // RÜSSTUNG FUNCTIONS //
    function getDef() {
        return $this->DEF;
    }
    
    function setDef( $new_def ) {
        $this->DEF = $new_def;
        $_SESSION['player_def'] = $new_def;
    }
    
    function getRuestung() {
        return $this->Ruestung;
    }
    
    function setuesstung( $new_ruestung ) {
        $this->Ruestung = $new_ruestung;
        $_SESSION['player_armor'] = $new_ruestung;
    }
    // 
    function hasAlreadyPlayer() {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
            die("MySQL-Fehler: ".$conn->connect_error);
        }
        $sql = "SELECT * FROM player WHERE account_id = '".$conn->real_escape_string($_SESSION['user_id'])."';";
        $result = $conn->query($sql);
        if ($result->num_rows >= 1) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function existsPlayerName( $name ) { 
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
            die("MySQL-Fehler: ".$conn->connect_error);
        }
        $new_name = $conn->real_escape_string($name);
        $sql = "SELECT * FROM player WHERE player_name = '".$new_name."';";
        $result = $conn->query($sql);
        if (!$result) {
            die("MySQL-Fehler: ".$conn->error);
        }
        if (($result->num_rows) > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function createNewPlayer( $player_name ) {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
            die("MySQL-Fehler: ".$conn->connect_error);
        }
        $new_name = $conn->real_escape_string($player_name);
        $sql = "INSERT INTO player (account_id, player_name, player_level, player_waffe, player_ruestung, player_atk, player_def) VALUES ('".$conn->real_escape_string($_SESSION['user_id'])."', '".$new_name."', '1', 'Holzschwert', 'Holz-Hemd', '15', '10');";
        $result = $conn->query($sql);
        if (!$result) {
            die("MySQL-Fehler: ".$conn->error);
        }
        else {
            return true;
        }
    }
    
}

class Account extends Player {
    public $mysql_addr = "localhost";
    public $mysql_user = "root";
    public $mysql_password = "";
    public $mysql_database = "homepage";
    
    function login( $benutzer_name, $pw ) {
        if (!isset($_SESSION["login"])) {
            $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
            if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
            $username = $conn->real_escape_string($benutzer_name);
            $sql = "SELECT password, account_id FROM account WHERE username = '".$username."';";
            $result = $conn->query($sql);
            if (!$result) { die("MySQL-Fehler: ".$conn->error); }
            $row = $result->fetch_array(MYSQL_NUM);
            if (hash("sha256",$pw) == $row[0]) {
                $_SESSION['login'] = "True";
                $_SESSION['user_id'] = $row[1];
                $_SESSION['username'] = $username;
                return true;
            }
            else { return false; }
        }
        else { return false; }
    }
    
    function comparePassword( $password_2 ) {
        $secure_password_2 = hash("sha256", $password_2);
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
            die("MySQL-Fehler: ".$conn->connect_error);
        }
        $sql = "SELECT password FROM account WHERE account_id = '".$conn->real_escape_string($_SESSION['user_id'])."' LIMIT 1;";
        $result = $conn->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($result->num_rows == 1) {
            if ($secure_password_2 == $row['password']) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
        
    }
      
    function logout() {
        if (!empty($_SESSION['login'])) {
            if ($_SESSION['login'] == "True") {
                $_SESSION = array();
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    
    function isLogin() {
        if (!empty($_SESSION['login'])) {
            if ($_SESSION['login'] == "True") { 
                return true; 
            }
            else { 
                return false; 
            }
        }
        else {
            return false;
        }
    }
    
    function deletePlayer() {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) { 
            die("MySQL-Fehler: ".$conn->connect_error); 
        }
        $sql = "DELETE FROM player WHERE account_id = '".$conn->real_escape_string($_SESSION['user_id'])."';";
        $result = $conn->query($sql);
        if (!$result) {
            die("MySQL-Fehler: ".$conn->error);
        }
        else {
            return true;
        }
    }
    
    function loadDatafromDB( $id ) {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) { die("MySQL-Fehler: ".$conn->connect_error); }
        $id_new = $conn->real_escape_string($id);
        $result = $conn->query("SELECT * FROM player WHERE account_id = '".$id_new."';");
        if ($result->num_rows == 1) {
            $result = $conn->query("SELECT player_name, player_level, player_waffe, player_ruestung, player_atk, player_def FROM player WHERE account_id = '".$id."';");
            if (!$result) { die("MySQL-Fehler: ".$conn->error); }
            $row = $result->fetch_array(MYSQLI_BOTH);
            $_SESSION['player_name'] = $row[0];
            $_SESSION['player_level'] = $row[1];
            $_SESSION['player_weapon'] = $row[2];
            $_SESSION['player_armor'] = $row[3];
            $_SESSION['player_atk'] = $row[4];
            $_SESSION['player_def'] = $row[5];
            $_SESSION['player_inventar'] = array($row[2], $row[3]);
            $_SESSION['player_created'] = "True";
            return true;
        }
        else { return false; }
    }
    
    function saveToDB() {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) { die("MySQL-Fehler: ".$conn->connect_error); }
        if (isset($_SESSION['login'])) {
            if (isset($_SESSION['player_name']) && isset($_SESSION['player_level'])) {
                $sql = "UPDATE player SET player_name = '".$_SESSION['player_name']."', player_level = '".$_SESSION['player_level']."', player_waffe = '".$_SESSION['player_weapon']."', player_ruestung = '".$_SESSION['player_armor']."', player_atk = '".$_SESSION['player_atk']."', player_def = '".$_SESSION['player_def']."' WHERE account_id = '".$_SESSION['user_id']."';";
                $result = $conn->query($sql);
                if (!$result) {
                    die("MySQL-Fehler: ".$conn->error);
                }
                else if ($result) {
                    return true;
                }
            }
            else {
                return true;
            }
        }
    }
}

class Erfahrung extends player {
    function setEP( $new_ep ) {
        $this->playerep = $new_ep;
    }
    
    function getEP() {
        return $this->playerep;
    }
    
    function getEPtoNextLevel() {
        return ($this->ep_to_next_level - $this->playerep);
    }
}

class Inventar extends player {
    public $is_loaded = "false";
    
    function loadFromDB() {
        
    }  
    
    function isLoaded() {
        
    }
    function getInventar() {
        
    }
}

class Monster extends player {
    public $MonsterName = "Hunriger Bär";
    public $MonsterATK = "10";
    public $MonsterDEF = "8";
    
    function setMonsterATK( $new_atk ) {
        $this->MonsterATK = $new_atk;
    }
    
    function getMonsterATK() {
        return $this->MonsterATK;     
    }
    
     function setMonsterDEF( $new_def ) {
        $this->MonsterDEF = $new_def;
    }
    
    function getMonsterDEF() {
        return $this->MonsterDEF;     
    }   
}

class Raum extends player {
    public $Raum = "1";
    public $Wetter_Array = array("Die Sonne scheint.", "Es regnet gleich", "Es schneit");
    public $Wetter = "Regen";
    
    function next_room() {
        $this->Raum = $this->Raum + 1;
        $this->setWetter();
    }
    
    function getRandWetter() {
        return ($this->Wetter_Array[rand(0, count($this->Wetter_Array))]);
    }
    
    function getWetter() {
        return $this->Wetter;  
    }
    
    function setWetter( $neues_wetter ) {
        $this->Wetter = $neues_wetter;
    }
    
    function getRoomNumber() {
        return $this->Raum;
    }
}

class Battle extends Inventar{
     function init_battle( $gegner_id, $eigene_id) {   
     }
     
     function battle_start() {
     }
     
     function battle_winner() {
     }
}

class Laden {
    function open_shop() {  
    }
    
    function buy_item( $index ) {
    }
    
    function sell_item( $index ) {
    } 
    
    function tax() {
    }
    
}