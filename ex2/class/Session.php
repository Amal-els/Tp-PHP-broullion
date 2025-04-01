<?php
class Session {
    private string $SID;
    private string $sname;
    private  $user_data = [];
    private int $maxlifetime;

    public function __construct($nom = "PHPSESSID",$maxlifetime = 1440){
        session_start();
        $this->SID = session_id();
        $this->user_data = &$_SESSION;
        $this->sname = $nom;
        $this->maxlifetime = $maxlifetime;
        if (!isset($this->user_data['nb_visites'])) {
            $this->user_data["nb_visites"] = 1;
            $this->messageBienvenue();
        }
        else {
            $this->user_data["nb_visites"] ++ ;
            echo "Merci pour votre fidélité, c'est votre  {$this->user_data['nb_visites']} éme visite." ;       
        }
    }
    private function messageBienvenue(){
        echo "Bienvenu à notre plateforme.";

    }
    public function setData($key,$value){
        $this->user_data[$key] = $value;
    }
    public function sessionReset(){
        session_unset();
        session_destroy();
        $this->__construct();
    }
    public function getData($key){
        return ( isset($this->user_data[$key])?  $this->user_data[$key] : null );
    }
}