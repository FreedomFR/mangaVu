<?php
include "header.php";
?>
<!doctype html>
<html lang="en">
<body>
<div class="container">
    <form>
        <div class="form-group">
            <label>Titre :</label>
            <input type="text" class="form-control" placeholder="le titre du manga">

            <label>Chapitre :</label>
            <input type="text" class="form-control" placeholder="Dernier chapitre lu">

            <label>Image :</label>
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary" onclick="ajouterManga()">Enregistrer</button>
    </form>
</div>
</body>
</html>
