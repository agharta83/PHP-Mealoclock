<?php $this->layout('layout'); ?>

<!-- Partie intermédiaire -->
<div class="jumbotron jumbotron-fluid py-2">
    <div class="container">
        <h1 class="display-4">Liste des évènements</h1>
        <hr class="my-4">
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<!-- Liste des évènements -->
<div class="container-fluid">

    <?php foreach ($events as $event): ?>
        <?php $this->insert( 'partials/event', [ 'event' => $event ] ) ?>
    <?php endforeach; ?>

</div>
</p>
    </div> 
</div>

