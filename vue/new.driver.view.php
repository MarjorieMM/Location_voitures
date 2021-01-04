<?php
$title = 'Ajouter un conducteur';
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';

?>


<div class="container">
    <form method="POST" action="<?= URL; ?>conducteurs/gvalid">
        <div class="mb-3">
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
        </div>

        <button type="submit" class="btn btn-primary">Enregister</button>
    </form>

</div>