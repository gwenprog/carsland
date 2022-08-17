<?php session_start();
include_once 'function/function.php';
include_once 'function/addSujet.class.php';
$bdd = bdd();

if(isset($_POST['name']) AND isset($_POST['sujet'])){
    
    $addSujet = new addSujet($_POST['name'],$_POST['sujet'],$_POST['categorie']);
    $verif = $addSujet->verif();
    if($verif == "ok"){
        if($addSujet->insert()){
            header('Location: index.php?sujet='.$_POST['name']);
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
    <title>Forum Carsland</title>
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
 <h3>Ajouter un sujet dans la catégorie <?php echo $_GET['categorie'] ?></h3>
    
            <div id="Cforum" class="ml-4">
                <?php  echo 'Bienvenue '.$_SESSION['pseudo'].' - <a href="deconnexion.php">Deconnexion</a> '; ?>
                
                <form method="post" action="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">
                    <div class="form-group">
                        <br><input type="text" name="name" placeholder="Nom du sujet..." required/><br>
                    </div>
                    <div>
                        <textarea name="sujet" placeholder="Contenu du sujet..."></textarea><br>
                    </div>
                    <div>
                        
                    </div>
                        
                        <input type="hidden" value="<?php echo $_GET['categorie']; ?>" name="categorie" />
                        <input class="btn btn-primary" type="submit" value="Ajouter le sujet" />
                        <?php 
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        ?>
                    </div>
                </form>
            </div>
</body>
</html>
