<div class="container">
    <h1>Liste des manga déjà lu</h1>
    <div class="row">
        <?php for ($i = 0; $i < count($listeMangaLu); $i++) { ?>
            <div class="col-sm" style="padding-top: 20px">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="max-height: 400px" src="../image/<?php echo $listeMangaLu[$i]['image'], '.png'?>" alt="image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo substr($listeMangaLu[$i]['titre'], 0, 40)."..."  ?></h5>
                        <p class="card-text">Chapitre : <?php echo $listeMangaLu[$i]['chapitre'] ?></p>
                        <p class="card-text">Date de lecture : <?php echo $listeMangaLu[$i]['dateLu'] ?></p>
                        <?php echo "<a href='./?action=detail&id=" . $listeMangaLu[$i]['id'] . "' class='btn btn-primary btn-block'>". "Voir détail" ."</a>"; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <br>
    <br>
</div>