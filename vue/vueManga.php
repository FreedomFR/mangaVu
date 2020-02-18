<div class="container">
    <div class="row">
        <?php for ($i = 0; $i < count($detailManga); $i++) { ?>
                <h1 class="card-title"><?= $detailManga[0]["titre"] ?></h1>
                <div class="col">
                    <div align="center">
                        <img src="../image/<?php echo $detailManga[$i]['image']?>" alt="image" width="500px" >
                    </div>
                </div>
                <div class="col" style="padding-top: 200px">
                    <a>Chapitre : <?= $detailManga[$i]["chapitre"] ?></a>
                    <br>
                    <a>Date de lecture : <?= $detailManga[$i]["dateLu"] ?></a>
                    <br>
                    <a>Genre : <?php for ($e = 0; $e < count($listeGenre); $e++) { echo $listeGenre[$e]['libelle'] ?> <?php } ?></a>
                    <br>
                </div>
            </div>
        <?php } ?>
</div>