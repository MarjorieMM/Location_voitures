<?php
$title = 'Liste des Véhicules';
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';

ob_start(); ?>

<div class="container">
    <table class="table mt-5 text-center">
        <thead>
            <tr>
                <th scope="col">id_vehicule</th>
                <th scope="col">marque</th>
                <th scope="col">modele</th>
                <th scope="col">couleur</th>
                <th scope="col">immatriculation</th>
                <th scope="col">modification</th>
                <th scope="col">supression</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($cars as $car) : ?>
            <tr>
                <td><?= $car->getId(); ?></td>
                <td><?= $car->getMarque(); ?></td>
                <td><?= $car->getModele(); ?></td>
                <td><?= $car->getCouleur(); ?></td>
                <td><?= $car->getImmatriculation(); ?></td>

                <td><a href="<?= URL; ?>vehicules/edit/<?= $car->getId(); ?>"><i class="fas fa-edit"></i></a></td>
                <td><a href="<?= URL; ?>vehicules/delete/<?= $car->getId(); ?>"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php  endforeach; ?>


        </tbody>
    </table>
    <a href=" <?= URL; ?>vehicules/add" class="btn btn-success w-25 d-block m-auto">Ajouter un Véhicule</a>

</div>