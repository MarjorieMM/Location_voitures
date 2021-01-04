<?php
$title = 'Ajouter une nouvelle association';
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';

var_dump($_POST);
?>


<div class="container">
    <form method="POST" action="<?= URL; ?>associations/gvalid">
        <div class="mb-3">
            <label>conducteur</label>
            <select class="form-control" name="id_conducteur" id="id_conducteur">
                <?php  foreach ($assocs as $assoc) : ?>
                <option value=<?=$assoc->getId_conducteur(); ?>><?=$assoc->getConducteur(); ?></option>
                <?php  endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicule">Véhicule</label>
            <select class="form-control" name="id_vehicule" id="id_vehicule">
                <?php  foreach ($assocs as $assoc) : ?>
                <option value=<?=$assoc->getId_vehicule(); ?>><?=$assoc->getVehicule(); ?></option>
                <?php  endforeach; ?>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Enregister</button>
    </form>

</div>