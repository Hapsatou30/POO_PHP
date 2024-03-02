<?php
//la classe
class Utilisateur{

    //les proprietés
    private $nom;
    private $prenom;
    private $email;
    private $message;


    //le constructeur
    public function __construct($nom, $prenom, $email, $message)
    {
        $this-> nom = $nom;
        $this-> prenom= $prenom;
        $this-> email = $email;
        $this-> message = $message;
    }

    //les getters 
    public function getNom(){
        return $this-> nom;
    }

    public function getPrenom(){
        return $this-> prenom;
    }

    public function getEmail(){
        return $this-> email;
    }

    public function getMessage(){
        return $this-> message;
    }

    //les setters
    public function setNom($nom){
        return $this-> nom = $nom;
    }

    public function setPrenom($prenom){
        return $this-> prenom = $prenom;
    }

    public function setEmail($email){
        return $this-> email = $email;
    }
    public function setMessage($message){
        return $this-> message = $message;
    }


    //Methodes pour verifier si les champs ne sont pas vides
    public function estValide(){
        return !empty($this->nom) && !empty($this->prenom) && !empty($this->email) && !empty($this->message);
    }

    //methode pour verifier si le champ email est correct
    public function estEmailValide(){
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

}