<?php
$title = 'Ajouter un véhicule';
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';

?>


<div class="container">
    <form method="POST" action="<?= URL; ?>vehicules/gvalid">
        <div class="mb-3">
            <input type="text" class="form-control" id="marque" name="marque" placeholder="marque">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="modele" name="modele" placeholder="modele">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="couleur">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="immatriculation" name="immatriculation"
                placeholder="immatriculation">
        </div>


        <button type="submit" class="btn btn-primary">Enregister</button>
    </form>

</div>