<?php $this->layout('layout') ?>

<div class="container">
    <h2>Liste des membres</h2>

    <div class="row">
        <?php foreach ($members as $member): ?>
            <div class="card col-6 col-md-3">
                <img src="<?=$basePath?>/public/images/<?=$member->getPhoto()?>" alt="Image de profil" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$member->getName()?></h5>
                    <p class="card-text"><?=$member->getDescription()?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

>