<?php

class Etudiant {

    public function __construct(
    private string $nom = "",
    private array $notes = array() ){}

  
    public function afficherNotes(){
        include_once "../fragments/header.php";
        $bColor = "#F1EFEC";
        ?>
        <div class = "etud">
            <div style = "background-color:<?= $bColor;?>">
            <?= $this->nom?>
            </div>
            <?php
            foreach ($this->notes as $note) {
                if ($note<10) {
                    $bColor = "danger";
                }
                elseif ($note == 10) {
                    $bColor = "warning";
                }
                else {
                    $bColor = "success";
                }

            ?> 
            <div style = "margin:0 "class="alert alert-<?=$bColor?>" role="alert">
                <?=$note?>
            </div>
    
            <?php } ?>
        
           
        <?php        
    }
    
    public function calculerMoyenne():float{
        $moy = 0;
        foreach ($this->notes as $note) {
            $moy += $note;
        }
        $moy /= count($this->notes);
        return $moy;

    }
    public function verifAdmis(){
        if ($this->calculerMoyenne()<10) {
            echo "non admis";
        }
        else {
            echo "admis";
        }
    }
}

?>