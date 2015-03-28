<?php
include './sys_conf/config.inc.php';

class Database {
    // DB SETTINGS //
    public $mysql_addr = "localhost";
    public $mysql_user = "";
    public $mysql_password = "";
    public $mysql_database = "homepage";
    // DB SETTINGS //
}

class Messenger extends Account {
    public $absender = "";
    public $empfaenger = "";
    public $betreff = "";
    public $message = "";
    
    function getMessageCount() {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
            die("MySQL-Fehler: ".$conn->connect_error);
        }
        $query = "SELECT COUNT(*) FROM message WHERE empf = '".$conn->real_escape_string($_SESSION['username'])."';";
        $result = $conn->query($query);
        if (!$result) {
            die("MySQL-Fehler: ".$conn->connect_error);
        }
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row[0];
        
    }
    
    function getNewMessage() {
        
    }
    
    function readNewMessage( $id ) {
        
    }
    
    function setAbsender( $absender ) {
        
    }
    
    function setEmpfaenger( $empf ) {
        
    }
    
    function setMessage( $msg ) {
        
    }
    
    function sendNewMessage() {
        
    }
    
}

class player extends Database{
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
    public $gold = "0";
    public $Inventar = array();
    
    // PLAYER FUNCTIONS //
    function setGold( $new_gold ) {
        $this->gold = $new_gold;
    }
    
    function getGold() {
        return $this->gold;
    }
    
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
        $sql = "INSERT INTO player (account_id, player_name, player_level, player_waffe, player_ruestung, player_atk, player_def, gold) VALUES ('".$conn->real_escape_string($_SESSION['user_id'])."', '".$new_name."', '1', 'Holzschwert', 'Holz-Hemd', '15', '10', 0);";
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
    public $username = "";
    public $password = "";
    public $password_sha256 = "";
    public $activate_hash = "";
    public $email = "";
    public $actived = "1";
    
    public $random_password_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    public $random_password_length = "";
    public $random_password = "";
    
    public $password_error = "";
    public $username_error = "";
    public $email_error = "";
    
    function isUsernameFree() {
        if (!empty($this->username)) {
            $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
            if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
            $sql = "SELECT * FROM account WHERE username = '".$conn->real_escape_string($this->username)."';";
            $result = $conn->query($sql);
            if (!$result) {
                die("MySQL-Fehler: ".$conn->error);
            }
            if ($result->num_rows == 1) {
                $this->username_error = "Dieser Benutzername ist bereits vergeben.";
                return false;
            }
            else {
                return true;
            }
        }
    }
    
    function sendNewPasswordtoEMail() {
        if (isset($this->email) && isset($this->random_password)) {
            $to      = $this->email;
            $subject = 'Neue Passwort';
            $message = 'Dein neues Passwort ist: '.$this->getRandomPassword();
            $headers = 'From: noreply@armyofkings.com' . "\r\n" .
                       'Reply-To: noreply@armyofkings.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
            return true;
        }      
    }
    
    function saveRandomPasswortToUser() {
        if (isset($this->random_password)) {
            $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
            if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
            $password_hash = hash("sha256", $this->random_password);
            $sql = "UPDATE account SET password = '".$password_hash."' WHERE username = '".$conn->real_escape_string($this->username)."';";
            $result = $conn->query($sql);
            if (!$result) {
                die("MySQL-Fehler: ".$conn->error);
            }
            else {
                return true;
            }
        }
    }
    
    function getRandomPassword() {
        return $this->random_password;
    }
    
    function setRandomPasswordLength( $length ) {
        $this->random_password_length = $length;
    }
    
    function generateRandomPassword() {
        $this->random_password = substr(str_shuffle($this->random_password_chars),0,$this->random_password_length);
    }
    
    function checkEmail( $username, $email_to_compare ) {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
        $sql = "SELECT email FROM account WHERE username = '".$conn->real_escape_string($username)."';";
        $result = $conn->query($sql);
        if (!$result) {
            die("MySQL-Fehler: ".$conn->error);
        }
        $row = $result->fetch_array(MYSQLI_NUM);
        if ($row[0] == $email_to_compare) {
            $this->email = $row[0];
            $this->username = $username;
            return true;
        }
        else {
            return false;
        }
        
    }
    
    function isEmailAlreadyUse() {
        if (isset($this->email)) {
            $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
            if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
            $query = "SELECT * FROM account WHERE email = '".$conn->real_escape_string($this->email)."';";
            $result = $conn->query($query);
            if (!$result) {
                die("MySQL-Fehler: ".$conn->error);
            }
            else if ($result->num_rows == 1) {
                $this->email_error = "Es existiert bereits ein Account mit dieser Email !";
                return true;
            }
            else {
                return false;
            }
        }
    }
    
    function setActivateHash() {
        if (isset($this->username)) {
            $this->activate_hash = md5($this->username);
            $this->actived = "0";
        }
    }
    
    function sendEMail() {
        if (isset($this->activate_hash) && isset($this->email)) {
            $to      = $this->email;
            $subject = 'Account Aktivierung';
            $message = 'Hier Klicken -> https://37.228.134.62:8880/index.php?activated='.$this->activate_hash;
            $headers = 'From: noreply@armyofkings.com' . "\r\n" .
                       'Reply-To: noreply@armyofkings.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
            return true;
        }
        else {
            return false;
        }
    }
    
    function activateAccount( $hash ) {
        if (isset($hash)) {
            $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
            if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
            $sql = "SELECT activatehash, activated FROM account WHERE activatehash = '".$conn->real_escape_string($hash)."';";
            $result = $conn->query($sql);
            if (!$result) {
                die('MySQL-Fehler1: '.$conn->error);
            }
            $row = $result->fetch_array(MYSQLI_NUM);
            if ($row[1] == '0' && $row[0] == $hash) {
                $sql = "UPDATE account SET activated = '1' WHERE activatehash = '".$conn->real_escape_string($hash)."';";
                $result = $conn->query($sql);
                if (!$result) {
                    die("MySQL-Fehler2: ".$conn->error);
                }
                else {
                    return true;
                }
            }
        }
    }
    
    function getUsernameError() {
        if (!empty($this->username_error)) {
            return $this->username_error;
        }
    }
    
    function getPasswordError() {
        if (!empty($this->password_error)) {
            return $this->password_error;
        }
    }
    
    function getEmailError() {
        if (!empty($this->email_error)) {
            return $this->email_error;
        }
    }
    
    function isPasswordSafty() {
        if (!empty($this->password)) {
            if( strlen($this->password) < 6 ) { // Password to Short .
                $this->password_error = "Dein Passwort ist zu Kurz.";
                return false;
            }
            else if( strlen($this->password) > 25 ) { // Password to Long.
                $this->password_error = "Dein Password ist zu lang.";
                return false;
            }
            else if( !preg_match("#[0-9]+#", $this->password) ) { // Password must include one number.
                $this->password_error = "Dein Password muss mindestens eine Zahl beinhalten.";
                return false;
            }
            else if( !preg_match("#[a-z]+#", $this->password) ) { // Password must include one Letter.
                $this->password_error = "Dein Password muss mindestens einen Buchstaben beinhalten.";
                return false;
            }
            else if( !preg_match("#[A-Z]+#", $this->password) ) { // Password must include one CAPS.
                $this->password_error = "Dein Password muss einen Groß Buchstaben beinhalten.";
                return false;
            }
            else { return true;}
        }
        else {
            $this->password_error = "Du hast kein Passwort eingeben !";
            return false;
        }
    }
    
    function setUsername( $username ) {
        if (!empty($username)) {
            $this->username = $username;
        }
    }
    
    function setPassword( $password ) {
        if (!empty($password)) {
            $this->password = $password;
        }
        
    }

    function checkPasswordIsSame( $password_to_compare ) {
        if (!empty($this->password)) {
            if (strlen($password_to_compare) > 0) {
                if ($password_to_compare == $this->password) {
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

    }
    
    function setEmail( $mail ) {
        if (!empty($mail)) {
            $this->email = $mail;
        }
        
    }
    
    function hashPassword() {
        if (!empty($this->password)) {
            $this->password_sha256 = hash("sha256", $this->password);
            return true;
        }
        else {
            return false;
        }
        
    }
    
    function createNewAccount() {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
        $sql = "INSERT INTO account (account_id, username, password, email, activatehash, activated) VALUES ('', '".$conn->real_escape_string($this->username)."', '".$this->password_sha256."', '".$conn->real_escape_string($this->email)."', '".$this->activate_hash."', '".$this->actived."');";
        $result = $conn->query($sql);
        if (!$result) {
            die("MySQL-Fehler: ".$conn->error);
        }
        else {
            return true;
        }
    }
    
    function login( $benutzer_name, $pw ) {
        if (!isset($_SESSION["login"])) {
            $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
            if ($conn->connect_errno) {
                die("MySQL-Fehler: ".$conn->connect_error);
            }
            $username = $conn->real_escape_string($benutzer_name);
            $sql = "SELECT password, account_id, activated FROM account WHERE username = '".$username."';";
            $result = $conn->query($sql);
            if (!$result) { die("MySQL-Fehler: ".$conn->error); }
            $row = $result->fetch_array(MYSQL_NUM);
            $pw_secure = hash("sha256", $pw);
            if ($pw_secure == $row[0]) {
                if ($row[2] == "1") {
                    $_SESSION['login'] = "True";
                    $_SESSION['user_id'] = $row[1];
                    $_SESSION['username'] = $username;
                    $postfach_in = new Messenger();
                    $_SESSION['unread_msg'] = $postfach_in->getMessageCount();
                    return true;
                }
                else {
                    return false;
                }
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
            $_SESSION['player_name'] = "";
            $_SESSION['player_level'] = "";
            $_SESSION['player_weapon'] = "";
            $_SESSION['player_armor'] = "";
            $_SESSION['player_atk'] = "";
            $_SESSION['player_def'] = "";
            $_SESSION['player_gold'] = "";
            $_SESSION['player_inventar'] = array();
            $_SESSION['player_created'] = "";
            return true;
        }
    }
    
    function loadDatafromDB( $id ) {
        $conn = new mysqli($this->mysql_addr, $this->mysql_user, $this->mysql_password, $this->mysql_database);
        if ($conn->connect_errno) { die("MySQL-Fehler: ".$conn->connect_error); }
        $id_new = $conn->real_escape_string($id);
        $result = $conn->query("SELECT * FROM player WHERE account_id = '".$id_new."';");
        if ($result->num_rows == 1) {
            $result = $conn->query("SELECT player_name, player_level, player_waffe, player_ruestung, player_atk, player_def, gold FROM player WHERE account_id = '".$id."';");
            if (!$result) { die("MySQL-Fehler: ".$conn->error); }
            $row = $result->fetch_array(MYSQLI_BOTH);
            $_SESSION['player_name'] = $row[0];
            $_SESSION['player_level'] = $row[1];
            $_SESSION['player_weapon'] = $row[2];
            $_SESSION['player_armor'] = $row[3];
            $_SESSION['player_atk'] = $row[4];
            $_SESSION['player_def'] = $row[5];
            $_SESSION['player_gold'] = $row[6];
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
                $sql = "UPDATE player SET player_name = '".$conn->real_escape_string($_SESSION['player_name'])."', player_level = '".$conn->real_escape_string($_SESSION['player_level'])."', player_waffe = '".$conn->real_escape_string($_SESSION['player_weapon'])."', player_ruestung = '".$conn->real_escape_string($_SESSION['player_armor'])."', player_atk = '".$conn->real_escape_string($_SESSION['player_atk'])."', player_def = '".$conn->real_escape_string($_SESSION['player_def'])."', gold = '".$conn->real_escape_string($_SESSION['player_gold'])."' WHERE account_id = '".$_SESSION['user_id']."';";
                $result = $conn->query($sql);
                if (!$result) {
                    die("MySQL-Fehler: ".$conn->error);
                }
                else {
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
    static $tax = 19;
    
    function open_shop() {  
    }
    
    function getTax( $preis ) {
        return ($preis * $this->tax);
    }
    
}