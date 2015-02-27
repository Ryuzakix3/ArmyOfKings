<?php
include './sys_conf/config.inc.php';

class player {
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
    }
    
    function getRuestung() {
        return $this->Ruestung;
    }
    
    function setuesstung( $new_ruesstung ) {
        $this->Ruestung = $new_ruesstung;
    }
    //
    
}

class Account extends Player {
    function login( $id, $pw ) {   
    }
    function isLogin( $id ) {   
    }
    
    function loadDatafromDB( $id ) { 
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
    function getInventar( $index, $array ) {
        if ($index == "NULL") {
            $i = 0;
            echo "<ul></br>";
            while ($i <= (count($array) -1)) {
                echo "<li>".$array[$i]."</li>";
                $i++;
            }
            echo "</ul></br>";
        }
    }
    
    function setItemToInventar( $itemname, $index ) {
        if (!empty($index)) {
            $this->Inventar[$index] = $itemname;
        }
        else {
            $this->Inventar[(count($this->Inventar) + 1)] = $itemname; 
        }
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