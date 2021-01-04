<?php
function active($link)
{
    echo  basename($_SERVER['REQUEST_URI']) == $link ? 'active' : '';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <a class="navbar-brand" href="<?= URL; ?>accueil">VTC</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?= active('conducteurs'); ?>" href="<?= URL; ?>conducteurs">Conducteurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= active('vehicules'); ?>" href="<?= URL; ?>vehicules">Véhicules</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= active('associations'); ?>" href="<?= URL; ?>associations">Associations</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h1 class="my-4 text-center bg-secondary shadow p-2">
        <?= $title; ?>
    </h1>

</div>