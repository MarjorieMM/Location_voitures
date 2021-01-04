<?php
$title = 'Modifier le conducteur n° '.$driver->getId();
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';
?>

<div class="container">
    <form method="POST" action="<?= URL; ?>conducteurs/editvalid">
        <div class="mb-3">
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom"
                value="<?= $driver->getPrenom(); ?>">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom"
                value="<?= $driver->getNom(); ?>">
        </div>


        <input type="hidden" name="id_conducteur" value="<?= $driver->getId(); ?>">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>

</div>