<?php session_start();
include_once 'function/function.php';
include_once 'function/addPost.class.php';
$bdd = bdd();

if(!isset($_SESSION['id'])){

    header('Location: connexion.php');
}
else {
    
    if(isset($_POST['name']) AND isset($_POST['sujet'])){
    
    $addPost = new addPost($_POST['name'],$_POST['sujet']);
    $verif = $addPost->verif();
    if($verif == "ok"){
        if($addPost->insert()){
            
        }
    }
    else {/*Si on a une erreur*/
        $erreur = $verif;
    }
    
}
    
    
    ?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8' />
    <title>Carsland</title>
    <script src="./Dashboard/Components/jquery-3.4.1.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta name="author" content="Thibault Neveu"> 
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand" onclick="window.location='ConnectPage/'">Carsland</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown"  aria-expanded="false">
                            Menu
                        </a>

                    <li class="nav-item active">
                        <a class="nav-link" href="#">Forum <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="text-secondary nav-link" href="#">Poster dans le forum <span class="sr-only">(current)</span></a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item " href="#">Messages</a>
                        <a class="dropdown-item " href="#">Paramètres de compte</a>
                        <a class="dropdown-item " href="#">Amis</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Support</a>
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="ml-4">
        <div id="Cforum">
            <h3>
                <?php 
                    echo 'Bienvenue '.$_SESSION['pseudo'].' - <a href="deconnexion.php">Deconnexion</a> '; 
                ?>
            </h3>
                <?php
                    if(isset($_GET['categorie'])){ /*SI on est dans une categorie*/
                        $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
                        ?>
                        <div class="categories">
                        <h1><?php echo $_GET['categorie']; ?></h1>
                        </div>
                    <a href="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">Ajouter un sujet</a>
                    <?php 
                    $requete = $bdd->prepare('SELECT * FROM sujet WHERE categorie = :categorie ');
                    $requete->execute(array('categorie'=>$_GET['categorie']));
                    while($reponse = $requete->fetch()){
                        ?>
                        <div class="categories">
                            <a href="index.php?sujet=<?php echo $reponse['name'] ?>"><h1><?php echo $reponse['name'] ?></h1></a>
                        </div>
                        <?php
                    }
                    ?>
                    
                        
                        <?php
                    }
                    
                    else if(isset($_GET['sujet'])){ /*SI on est dans une categorie*/
                        $_GET['sujet'] = htmlspecialchars($_GET['sujet']);
                        ?>
                        <div class="categories">
                        <h1><?php echo $_GET['sujet']; ?></h1>
                        </div>
                    
                    <?php 
                    $requete = $bdd->prepare('SELECT * FROM postSujet WHERE sujet = :sujet ');
                    $requete->execute(array('sujet'=>$_GET['sujet']));
                    while($reponse = $requete->fetch()){
                        ?>
                    <div class="post">
                        <?php 
                        $requete2 = $bdd->prepare('SELECT * FROM membres WHERE id = :id');
                        $requete2->execute(array('id'=>$reponse['propri']));
                        $membres = $requete2->fetch();
                        echo $membres['pseudo']; echo ': <br>';
                        
                        echo $reponse['contenue'];
                        ?>
                    </div> 
                    <?php
                    
                    }
                ?>
                
                 <form method="post" action="index.php?sujet=<?php echo $_GET['sujet']; ?>">
                        <textarea name="sujet" placeholder="Votre message..." ></textarea>
                        <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
                        <input type="submit" value="Ajouter à la conversation" />
                        <?php 
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        ?>
                    </form>
                <?php
                }
                else { /*Si on est sur la page normal*/
                    
                       ?> <p>Choisissez une catégorie:</p> <?php
                
                        $requete = $bdd->query('SELECT * FROM categorie');
                        while($reponse = $requete->fetch()){
                        ?>
                            <li class="categories">
                                <a href="index.php?categorie=<?php echo $reponse['name']; ?>"><?php echo $reponse['name']; ?></a>
                              </li>
                
                    <?php 
                    }
                    
                }
                 ?>
                
                
                
                
                
        </div>
    </div>
</body>
</html>
    <?php
}
?>

    
