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
    //pour eviter les erreurs si le form n'est pas encore rempli
    $utilisateur1 = NULL;

    //recuperer les données du form
    if(isset($_POST['charger'])){
        $nom1 = $_POST['nom'];
        $prenom1 = $_POST['prenom'];
        $email1 = $_POST['email'];
        $message1 = $_POST['message'];


        //intancier la classe
        $utilisateur1 = new Utilisateur($nom1,$prenom1,$email1,$message1);

        if(!$utilisateur1 ->estValide()){
            echo "Veuillez saisir tous les champs";
        }elseif(!$utilisateur1 ->estEmailValide()){
            echo "Veuillez saisir un email valide";
        }else{
            echo "<h2> Informations de l'Utilisateur </h2>";
            echo "Nom: " .$utilisateur1->getNom(). "<br>";
            echo "Prenom: " .$utilisateur1->getPrenom(). "<br>";
            echo "Email: " .$utilisateur1->getEmail(). "<br>";
            echo "Message: " .$utilisateur1->getMessage(). "<br>";
        }


    }
?>




















<form action="index.php" method="post">
    <input type="text" name="nom" placeholder="Votre Nom"> <br> <br>
    <input type="text" name="prenom" placeholder="Votre Prenom"> <br> <br>
    <input type="text" name="email" placeholder="Votre Email"> <br> <br>
    <input type="text" name="message" placeholder="Votre Message"> <br> <br>
    <input type="submit" name="charger" > <br> <br>
</form>

