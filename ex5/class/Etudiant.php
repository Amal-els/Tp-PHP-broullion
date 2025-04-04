<?php
class Etudiant extends User
{
    public function __construct($id,$name,$birthday,$image_url,$section)
    {
        $email=$name."@insat.ucar.tn";
        parent::__construct($id,$name,$email,"etudiant");
        $this->birthday = $birthday;
        $this->imageUrl = $image_url;
        $this->section = $section;
    }
}