<?php session_start();require_once('../rangement/bdd.php'); ?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="styleFooter.css">
    <link rel="stylesheet" href="styleDashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Tableau de bord</title>
</head>

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
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>

                    <li class="nav-item active">
                        <a class="nav-link" href="#">Forum <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="../rangement/PostInForum.php">Poster dans le forum <span class="sr-only">(current)</span></a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Messages</a>
                        <a class="dropdown-item" href="#">Paramètres de compte</a>
                        <a class="dropdown-item" href="#">Amis</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Support</a>
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <h1>Bienvenue <?php echo "Gwendal"; ?></h1>
        <div class="Widgets">
            
            <div class="forumpost"><h3>Post</h3></div>


            <div class="latestsales"><h3>Sales</h3></div>
        </div>
    </main>
