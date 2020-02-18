<!doctype html>
<html lang="en">
<body>
<div class="container">
    <form method="post" action="../controleur/ajouterManga.php" enctype="multipart/form-data">
        <div class="form-group">
            <label>Titre :</label>
            <input type="text" class="form-control" placeholder="le titre du manga" name="titre">

            <label>Chapitre :</label>
            <input type="text" class="form-control" placeholder="Dernier chapitre lu" name="chapitre">

            <label>Image :</label>
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary" name="ajouter">Enregistrer</button>
    </form>
</div>
</body>
</html>

<?php
// Create database connection

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['ajouter'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    $titre = $_POST['titre'];
    $chapitre =$_POST['chapitre'];

    // image file directory
    $target = "../image/".basename(str_replace(" ", "", $image));

    $ajout = ajouterManga($titre, $chapitre, str_replace(" ", "", $image));

    // execute query

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}
?>