<?php
$title = 'Liste des Conducteurs';
include_once 'head.view.php';
include_once 'navig.view.php';
include_once 'script.view.php';

ob_start(); ?>

<div class="container">
    <table class="table mt-5 text-center">
        <thead>
            <tr>
                <th scope="col">id_conducteur</th>
                <th scope="col">prenom</th>
                <th scope="col">nom</th>
                <th scope="col">modification</th>
                <th scope="col">supression</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($drivers as $driver) : ?>
            <tr>
                <td><?= $driver->getId(); ?></td>
                <td><?= $driver->getPrenom(); ?></td>
                <td><?= $driver->getNom(); ?></td>

                <td><a href="<?= URL; ?>conducteurs/edit/<?= $driver->getId(); ?>"><i class="fas fa-edit"></i></a></td>
                <td><a href="<?= URL; ?>conducteurs/delete/<?= $driver->getId(); ?>"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php  endforeach; ?>


        </tbody>
    </table>
    <a href=" <?= URL; ?>conducteurs/add" class="btn btn-success w-25 d-block m-auto">Ajouter un conducteur</a>

</div>