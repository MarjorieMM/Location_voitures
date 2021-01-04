<?php
$title = 'Liste des Associations Conducteurs - Véhicules';
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';

ob_start(); ?>

<div class="container">
    <table class="table mt-5 text-center">
        <thead>
            <tr>
                <th scope="col">id_association</th>
                <th scope="col">conducteur</th>
                <th scope="col">vehicule</th>
                <th scope="col">modification</th>
                <th scope="col">supression</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($assocs as $assoc) : ?>
            <tr>
                <td><?= $assoc->getId_association(); ?></td>
                <td><?= $assoc->getConducteur(); ?><br>
                    <?= $assoc->getId_conducteur(); ?></td>
                <td> <?= $assoc->getVehicule(); ?><br>
                    <?= $assoc->getId_vehicule(); ?></td>
                <td><a href="<?= URL; ?>associations/edit/<?= $assoc->getId_association(); ?>"><i
                            class="fas fa-edit"></i></a></td>
                <td><a href="<?= URL; ?>associations/delete/<?= $assoc->getId_association(); ?>"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php  endforeach; ?>


        </tbody>
    </table>
    <a href=" <?= URL; ?>associations/add" class="btn btn-success w-25 d-block m-auto">Créer une nouvelle
        association</a>

</div>