<?php
$title = 'Modifier le véhicule n° '.$car->getId();
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';

?>


<div class="container">
    <form method="POST" action="<?= URL; ?>vehicules/editvalid">
        <div class="mb-3">
            <input type="text" class="form-control" id="marque" name="marque" placeholder="marque"
                value="<?= $car->getMarque(); ?>">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="modele" name="modele" placeholder="modele"
                value="<?= $car->getModele(); ?>">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="couleur"
                value="<?= $car->getCouleur(); ?>">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="immatriculation" name="immatriculation"
                placeholder="immatriculation" value="<?= $car->getImmatriculation(); ?>">
        </div>

        <input type="hidden" name="id_vehicule" value="<?= $car->getId(); ?>">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

</div>