<?php $this->layout('layout') ?>

<div class="container">
    <div class="row mb-5">
        <div class="col-12 col-md-8 m-auto area">
            <h2 class="text-center">Inscription</h2>

            <?php foreach($errors as $error): ?>
                <div class="alert alert-danger">
                    <?=$error?>
                </div>
            <?php endforeach; ?>

            <form action="<?=$router->generate('signup')?>" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?=($fields['email'] ?? '')?>" placeholder="jon@snow.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" value="<?=($fields['password'] ?? '')?>" placeholder="azerty" required>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirmez votre mot de passe</label>
                    <input type="password" class="form-control" name="password_confirm" value="<?=($fields['password_confirm'] ?? '')?>" placeholder="azerty" required>
                </div>
                <div class="form-group">
                    <label for="firstname">Nom</label>
                    <input type="text" class="form-control" name="firstname" value="<?=($fields['firstname'] ?? '')?>" placeholder="Jon" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Prénom</label>
                    <input type="text" class="form-control" name="lastname" value="<?=($fields['lastname'] ?? '')?>" placeholder="Snow" required>
                </div>
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" name="address" value="<?=($fields['address'] ?? '')?>" placeholder="3 avenue des morts, Winterfell" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" value="<?=($fields['description'] ?? '')?>" placeholder="Grand, brun, ne sait rien..." required>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">Créer le compte</button>
                </div>
            </form>
        </div>
    </div>
</div>