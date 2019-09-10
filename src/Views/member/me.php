<?php $this->layout('layout') ?>

<div class="container">
    <div class="row mb-5">
        <div class="col-3">
            <img src="<?=$basePath?>/public/images/<?=$member->getPhoto()?>" alt="Photo de profil" class="img-fluid">
        </div>
        <div class="col-9">
            <h2><?=$member->getName()?></h2>
            <p><?=$member->getDescription()?></p>
        </div>
    </div>
</div>