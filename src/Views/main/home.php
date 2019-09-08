<?php $this->layout( 'layout', ['title' => $title] ) ?>

<!-- Partie intermédiaire -->
<div class="jumbotron jumbotron-fluid py-2">
    <div class="container">
        <h1 class="display-4">A table</h1>
        <hr class="my-4">
        <p class="lead">Que ce soit en raison d'une maladie ou d'une conviction personnelle, vous avez décidé de modifier vos habitudes alimentaires. Ce site consacré aux régimes alimentaires devrait vous apporter toutes les informations dont vous avez besoin. Comment manger équilibré ? Quelles protéines végétales faut-il privilégier ? Suivre une régime alimentaire peut aussi être une nécessité pour bien contrôler un diabète, un cholesterol.</p>
    </div> 
</div>

<!-- Liste des communautés -->
<div class="container-fluid">
    <?php for ($i=0; $i<5; $i++): ?>
        <?php $this->insert( 'partials/community', [ 'cpt' => $i ]); ?>
    <?php endfor; ?>
</div>