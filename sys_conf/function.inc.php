<?php
class player {
    public $playername = "Torben";
    public $Level = "10";
    public $playerep = "0";
    public $ep_to_next_level = "500";
    public $raum = "1";
    public $ATK = "15";
    public $DEF = "10";
    public $TP = "1000";
    public $Waffe = "Holzschwert";
    public $Ruesstung = "Leder-Kleid";
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
    // END //
    
    // WAFFEN FUNCTIONS //
    
    function getAtk() {
        return $this->ATK;
    }
    
    function setAtk( $new_atk ) {
        $this->ATK = $new_atk;
    }
    
    function getWeapon() {
        return $this->Waffe();
    }
    
    function setWeapon( $new_weapon ) {
        $this->Waffe($new_weapon);
    }
    
    // END //
    
    // RÜSSTUNG FUNCTIONS //
    function getDef() {
        return $this->DEF;
    }
    
    function setDef( $new_def ) {
        $this->DEF = $new_def;
    }
    
    function getRuesstung() {
        return $this->Ruesstung();
    }
    
    function setuesstung( $new_ruesstung ) {
        $this->Ruesstung($new_ruesstung);
    }
    //
    
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
    function getInventar( $index ) {
        if (!empty($index)) {
            for ($i = 0; count($this->Inventar); $i++) {
                return "Item: ".$this->Inventar[$i];
            }
        }
        else {
            return $this->Inventar[$index];
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
    
}

class Battle extends Monster {
    
}

?>