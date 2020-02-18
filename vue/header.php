<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="../css/style.css" rel="stylesheet">

<head>
    <title>Site pour voir les manga lus</title>
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
</head>
<body>
<?php include_once "$racine/modele/bd.utilisateur.php";?>
<?php include_once "$racine/modele/bd.utilisateur.php";?>
<nav>

    <ul id="menuGeneral">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" href="../?action=listeManga">Liste manga lu</a>
            </li>
            <li class="nav-item">
                <?php if(isLoggedOn()){?>
                    <a class="nav-link" href="../?action=ajouter">Ajouter Manga</a>
                <?php } ?>
            </li>
            <li class="nav-item">
                <?php if(isLoggedOn()){ $email = getMailULoggedOn(); $util = getUtilisateurByMailU($email);?>
                    <a class="nav-link" href="../?action=profil">Utilisateur :<?= " " .$util["nom"] ?> </a>
                <?php }
                else{ ?>
                    <a class="nav-link" href="../?action=connection">Connexion</a>
                <?php } ?>
            </li>
        </ul>
</nav>

<img src="../image/header.png" class="image_header" alt="image_header">
</body>
