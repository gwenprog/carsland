<?php
require_once('bdd.php');

class connect {
    private $pseudo; 
    private $mdp;
    private $bdd;
    
    public function __construct($pseudo,$mdp) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->bdd = bdd();
    }
    
    public function verif(){
        $requete = $this->bdd->prepare('SELECT * FROM membres WHERE username = :pseudo');
        $requete->execute(array('pseudo'=> $this->pseudo));
        $reponse = $requete->fetch();
        if($reponse){
            if($this->password == $reponse['mdp']){
                return 'ok';
            }
            else {
                $erreur = 'Le mot de passe est incorrect';
                return $erreur;
            }
        }
        else {
            $erreur = 'Le pseudo est inexistant';
            return $erreur;
         }
    }
    
    public function session(){
        $requete = $this->bdd->prepare('SELECT id FROM membres WHERE username = :pseudo ');
        $requete->execute(array('pseudo' => $this->pseudo));
        $requete = $requete->fetch();
        $_SESSION['id'] = $requete['id'];
        $_SESSION['pseudo'] = $this->pseudo;
        
        return 1;
    }
}
?>